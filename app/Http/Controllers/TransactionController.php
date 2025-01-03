<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Design;
use App\Models\DesignOption;
use App\Models\Payment;
use App\Models\Promotion;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Models\TransactionDesign;
use App\Models\TransactionPromotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

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

    private function storeDesignOptions($optionValues)
    {
        // Masukkan data ke tabel 'design_options'
        $optionValues = json_decode($optionValues, true);

        foreach ($optionValues as $designId => $options) {
            foreach ($options as $optionId => $optionValueId) {
                $designOption = DesignOption::create([
                    'design_id' => $designId,
                    'option_value_id' => $optionValueId,
                ]);
                $designOption->save();
            }
        }
    }

    private function storeTransaction($sellerId, $subTotalPrice, $serviceFee, $totalPrice, $notes)
    {
        $transaction = Transaction::create([
            'buyer_id' => Auth::id(),
            'seller_id' => $sellerId,
            'total_price' => $subTotalPrice,
            'service_fee' => $serviceFee,
            'grand_total_price' => $totalPrice,
            'transaction_status' => 'Pending',
            'notes' => $notes
        ]);

        $transaction->order_number = 'TX-' . now()->format('Ymd') . '-' . str_pad($transaction->id, 6, '0', STR_PAD_LEFT);
        $transaction->save();

        return $transaction;
    }

    private function storeTransactionDesign($transactionId, $designId, $quantity, $subTotalPrice) 
    {
        TransactionDesign::create([
            'transaction_id' => $transactionId,
            'design_id' => $designId,
            'quantity' => $quantity,
            'sub_total_price' => $subTotalPrice,
        ]);
    }

    private function storeTransactionPromotion($transactionId, $promotionId, $quantity, $subTotalPrice)
    {
        TransactionPromotion::create([
            'transaction_id' => $transactionId,
            'promotion_id' => $promotionId,
            'quantity' => $quantity,
            'sub_total_price' => $subTotalPrice,
        ]);
    }

    private function storePayment($transactionId, $payment_method_id, $totalPrice)
    {
        $payment = Payment::create([
            'transaction_id' => $transactionId,
            'payment_method_id' => $payment_method_id,
            'amount' => $totalPrice
        ]);
        $payment->save();
    }

    private function storeShipping($transactionId, $shipping_method_id)
    {
        $shipping = Shipping::create([
            'transaction_id' => $transactionId,
            'shipping_method_id' => $shipping_method_id,
            'shipping_status' => 'Awaiting Pickup'
        ]);
        // Generate tracking number
        $shipping->tracking_number = $this->generateTrackingNumber($shipping->id, $shipping->shipping_method_id);
        $shipping->save();
    }
    
    private function generateTrackingNumber($shippingId, $shippingMethodId)
    {
        $prefix = strtoupper(substr(md5($shippingMethodId), 0, 4)); // Generate prefix dari shipping method
        $timestamp = now()->format('YmdHis'); // Format tanggal dan waktu
        $uniqueId = str_pad($shippingId, 6, '0', STR_PAD_LEFT); // ID shipping dengan leading zeros

        return "{$prefix}-{$timestamp}-{$uniqueId}";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Masukkan data ke tabel 'design_options'
        $this->storeDesignOptions($request->optionValues);

        $checkoutItems = json_decode($request->checkoutItems, true);

        $designIds = [];

        foreach ($checkoutItems as $sellerId => $sellerGroup) {

            // Masukkan data ke tabel 'transactions'
            $transaction = $this->storeTransaction($sellerId, $request->subTotalPrice, $request->serviceFee, $request->totalPrice, $request->notes);

            foreach ($sellerGroup['items'] as $design) {
                if ($request->source !== 'Cart') {
                    $quantity = $request->quantity;
                } else {
                    $quantity = $design['pivot']['quantity'];
                }

                $designModel = Design::find($design['id']);

                // Mengurangi jumlah stok design yang dibeli
                $designModel['stock'] -= $quantity;
                $designModel->save();

                // Masukkan data ke tabel 'transaction_designs'
                $this->storeTransactionDesign($transaction->id, $design['id'], $quantity, $design['price'] * $quantity);

                $designIds[] = $design['id'];
            }
        }

        // Masukkan data ke tabel 'transaction_promotions'
        if ($request->source === 'DesignSelection') {
            $this->storeTransactionPromotion($transaction->id, $request->promotion_id, $request->quantity, $request->subTotalPrice);
        }

        // Masukkan data ke tabel 'payments'
        $this->storePayment($transaction->id, $request->payment_method_id, $request->totalPrice);

        // Masukkan data ke tabel 'shippings'
        $this->storeShipping($transaction->id, $request->shipping_method_id);

        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {
            // Hapus semua item yang telah dibeli dari cart
            $cart->designs()->detach($designIds);
        }

        // Set selected status ad Pending
        session(['selectedStatus' => 'Pending']);

        $this->processPayment($transaction);

        return redirect()->route('payments.snap', ['transaction' => $transaction->order_number]);
    }

    public function cancelPayment(Transaction $transaction)
    {
        // Set Failed Message
        session()->flash('failed', __('order.payment_cancelled'));

        // Update transaction status
        $transaction->transaction_status = 'Not Paid';
        $transaction->save();

        // Set session of selected status
        session(['selectedStatus' => $transaction->transaction_status]);

        return redirect()->route('transactions.index');
    }

    private function processPayment(Transaction $transaction)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $transaction['grand_total_price'],
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $transaction->snap_token = $snapToken;

        $transaction->save();
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
            // Update shipping time dari transaksi
            $shippingModel = Shipping::where('transaction_id', $transaction->id)->first();

            if ($shippingModel) {
                $shippingModel->shipping_time = now();
                $shippingModel->save();
            }

        } else if ( in_array( $newStatus, ['Returned', 'Cancelled'] ) ) {
            // Get Payment Model
            $paymentModel = $transaction->payment;

            if ($paymentModel) {
                // Update payment status as Failed
                $paymentModel->update([
                    'payment_status' => 'Failed'
                ]);
            } else {
                return redirect()->back()->withErrors(['error' => 'Payment record not found.']);
            }

            // Reset design stock
            foreach( $transaction->designs as $design ){
                $designModel = Design::find($design->id);
                $designModel->stock += $design->pivot->quantity;
                $designModel->save();
            }
        } else if ($newStatus === "Completed") {
            if (!$transaction->isReceived) {
                $transaction->isReceived = true;
                $transaction->save();

                $shippingModel = Shipping::where('transaction_id', $transaction->id)->first();

                if ($shippingModel) {
                    $shippingModel->shipping_status = "Delivered";
                    $shippingModel->delivery_time = now();
                    $shippingModel->save();
                }                

                session(['selectedStatus' => 'Delivered']);

                return redirect()->back()->with('success', __('order.order_received'));
            } else {
                $transaction->completion_time = now();
                $transaction->save();
            }
        }

        session(['selectedStatus' => $newStatus]);

        if ($transaction->transitionTo($newStatus)) {
            return redirect()->back()->with('success', __('order.transaction_updated'));
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
