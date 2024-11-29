<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Design;
use App\Models\Transaction;
use App\Models\TransactionDesign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('seller', 'designs')
            ->where('buyer_id', Auth::id())
            ->latest()
            ->get()
            ->map(function ($transaction) {
                $transaction->nextStatuses = $transaction->getNextStatuses();
                return $transaction;
            });
    
        $status = Transaction::select('transaction_status')->distinct()->pluck('transaction_status')->toArray();
    
        $allStatus = Transaction::STATUSES;
    
        // Calculate transaction count per status
        $numTransactionByStatus = [];
        foreach ($allStatus as $status) {
            $numTransactionByStatus[$status] = $transactions->where('transaction_status', $status)->count();
        }
    
        $selectedStatus = session('selectedStatus', 'Completed');
        session()->forget('selectedStatus');
    
        return view('transaction.index', [
            'title' => 'My Orders',
            'transactions' => $transactions,
            'allStatus' => $allStatus,
            'status' => $status,
            'selectedStatus' => $selectedStatus,
            'numTransactionByStatus' => $numTransactionByStatus
        ]);
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paymentMethod' => 'required|string',
        ]);

        $checkoutItems = json_decode($request->checkoutItems, true);

        $designIds = [];

        foreach ($checkoutItems as $sellerId => $sellerGroup) {
            
            $transaction = Transaction::create([
                'buyer_id' => Auth::id(),
                'seller_id' => $sellerId,
                'total_price' => $request->subTotalPrice,
                'shipping_fee' => $request->shippingFee,
                'service_fee' => $request->serviceFee,
                'grand_total_price' => $request->totalPrice,
                'payment_method' => $request->paymentMethod,
                'transaction_status' => 'Pending'
            ]);

            $transaction->payment_time = now();
            $transaction->order_number = 'TX-' . now()->format('Ymd') . '-' . str_pad($transaction->id, 6, '0', STR_PAD_LEFT);
            $transaction->save();

            foreach ($sellerGroup['items'] as $design) {
                if ($request->source === 'design') {
                    $quantity = $request->quantity;
                } else {
                    $quantity = $design['pivot']['quantity'];
                }

                $designModel = Design::find($design['id']);

                $designModel['stock'] -= $quantity;
                $designModel->save();

                TransactionDesign::create([
                    'transaction_id' => $transaction->id,
                    'design_id' => $design['id'],
                    'quantity' => $quantity,
                    'sub_total_price' => $design['price'] * $quantity,
                    'transaction_status' => 'Pending'
                ]);

                $designIds[] = $design['id'];
            }
        }

        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {
            $cart->designs()->detach($designIds);
        }

        session(['selectedStatus' => 'Pending']);

        return redirect()->route('transactions.index')->with('success', 'Order created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.detail', [
            'title' => 'Transaction Detail',
            'transaction' => $transaction,
        ]);
    }

    public function orderRequest()
    {
        $transactions = Transaction::with('buyer', 'designs')
            ->where('seller_id', Auth::id())
            ->latest()
            ->get()
            ->map(function ($transaction) {
                $transaction->nextStatuses = $transaction->getNextStatuses();
                return $transaction;
            });

        $allStatus = Transaction::STATUSES;

        // Calculate transaction count per status
        $numTransactionByStatus = [];
        foreach ($allStatus as $status) {
            $numTransactionByStatus[$status] = $transactions->where('transaction_status', $status)->count();
        }

        $selectedStatus = session('selectedStatus', 'Pending');
        session()->forget('selectedStatus');

        return view('transaction.orderRequest', [
            'title' => 'Order Request',
            'transactions' => $transactions,
            'allStatus' => $allStatus,
            'selectedStatus' => $selectedStatus,
            'numTransactionByStatus' => $numTransactionByStatus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    public function updateStatus(Request $request,Transaction $transaction)
    {
        $newStatus = $request->choice;

        if($newStatus === "Delivered") {
            $transaction->shipping_time = now();
            $transaction->save();
        } else if ( in_array( $newStatus, ['Returned', 'Cancelled'] ) ) {
            foreach( $transaction->designs as $design ){
                $designModel = Design::find($design->id);
                $designModel->stock += $design->pivot->quantity;
                $designModel->save();
            }
        } else if ($newStatus === "Completed") {
            if (!$transaction->isReceived) {
                $transaction->isReceived = true;
                $transaction->save();

                session(['selectedStatus' => 'Delivered']);

                return redirect()->back()->with('success', 'Order has been received');
            } else {
                $transaction->completion_time = now();
                $transaction->save();
            }
        }

        session(['selectedStatus' => $newStatus]);

        if ($transaction->transitionTo($newStatus)) {
            return redirect()->back()->with('success', 'Transaction status updated.');
        }

        return redirect()->back()->with('error', 'Invalid status transition.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
