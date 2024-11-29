<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::with('designs')->where('user_id', Auth::id())->first();
        
        $carts = Cart::with('designs')->where('user_id', Auth::id())->get();
        
        $cartItems = [];
        foreach ($carts as $cart) {
            foreach ($cart->designs as $design) {
                $sellerId = $design->seller->id;
                $sellerName = $design->seller->name;
                $sellerUsername = $design->seller->username;
    
                if (!isset($cartItems[$sellerId])) {
                    $cartItems[$sellerId] = [
                        'seller_name' => $sellerName,
                        'seller_username' => $sellerUsername,
                        'items' => []
                    ];
                }
    
                $cartItems[$sellerId]['items'][] = $design;
            }
        }

        return view('cart.cart', [
            'title' => 'My Cart',
            'cart' => $cart,
            'cartItems' => $cartItems
        ]);
    }

    public function checkout()
    {
        $cart = Cart::with('designs')->where('user_id', Auth::id())->first();
        
        $carts = Cart::with('designs')->where('user_id', Auth::id())->get();

        $checkoutItems = [];

        foreach ($carts as $cart) {
            foreach ($cart->designs as $design) {
                if ($design->pivot->isChecked) {
                    $sellerId = $design->seller->id;
                    $sellerName = $design->seller->name;
                    $sellerUsername = $design->seller->username;
        
                    if (!isset($checkoutItems[$sellerId])) {
                        $checkoutItems[$sellerId] = [
                            'seller_name' => $sellerName,
                            'seller_username' => $sellerUsername,
                            'items' => []
                        ];
                    }
        
                    $checkoutItems[$sellerId]['items'][] = $design;
                }
            }
        }

        $productAmount = [];
        foreach ($checkoutItems as $sellerId => $sellerGroup) {
            $amount = 0;
            foreach($sellerGroup['items'] as $item) {
                $amount += $item->pivot->quantity;
            }
            $productAmount[] = $amount;
        }

        $checkoutItemsPrice = [];
        $totalPrice = 0;
        foreach ($checkoutItems as $sellerId => $sellerGroup) {
            $subtotalPrice = 0;
            foreach($sellerGroup['items'] as $item) {
                $subtotalPrice += ($item->price * $item->pivot->quantity);
            }
            $checkoutItemsPrice[] = $subtotalPrice;
            $totalPrice += $subtotalPrice;
        }

        return view('cart.checkout', [
            'title' => 'Checkout',
            'buyer' => Auth::user(),
            // 'cart' => $cart,
            'checkoutItems' => $checkoutItems,
            'productAmount' => $productAmount,
            'checkoutItemsPrice' => $checkoutItemsPrice,
            'totalPrice' => $totalPrice
        ]);
    }

    public function checkoutFromDesign(Request $request) {

        $design = Design::findOrFail($request->input('design_id'));
        $quantity = 1;

        $checkoutItems = [];

        if ($design) {
            $sellerId = $design->seller->id;
            $sellerName = $design->seller->name;
            $sellerUsername = $design->seller->username;

            if (!isset($checkoutItems[$sellerId])) {
                $checkoutItems[$sellerId] = [
                    'seller_name' => $sellerName,
                    'seller_username' => $sellerUsername,
                    'items' => []
                ];
            }

            $checkoutItems[$sellerId]['items'][] = $design;
        }

        $productAmount = [];
        foreach ($checkoutItems as $sellerId => $sellerGroup) {
            $amount = 0;
            foreach($sellerGroup['items'] as $item) {
                $amount += $quantity;
            }
            $productAmount[] = $amount;
        }

        $checkoutItemsPrice = [];
        $totalPrice = 0;
        foreach ($checkoutItems as $sellerId => $sellerGroup) {
            $subtotalPrice = 0;
            foreach($sellerGroup['items'] as $item) {
                $subtotalPrice += ($item->price * $quantity);
            }
            $checkoutItemsPrice[] = $subtotalPrice;
            $totalPrice += $subtotalPrice;
        }

        return view('cart.checkout-from-design', [
            'title' => 'Checkout',
            'buyer' => Auth::user(),
            // 'cart' => $cart,
            'checkoutItems' => $checkoutItems,
            'quantity' => 1,
            'productAmount' => $productAmount,
            'checkoutItemsPrice' => $checkoutItemsPrice,
            'totalPrice' => $totalPrice
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
    // public function store(StoreCartRequest $request, $designSlug)
    // {
    //     // Validate that cart_id is present
    //     $request->validate([
    //         'cart_id' => 'required|exists:carts->id',
    //     ]);

    //     // Find the design by slug
    //     $design = Design::where('slug', $designSlug)->firstOrFail();

    //     // Find the cart
    //     $cart = Cart::findOrFail($request->input('cart_id'));

    //     // Check if the authenticated user owns the cart
    //     if ($cart->user_id !== Auth::user()->id()) {
    //         return redirect()->back()->with('error', 'You do not own this cart.');
    //     }

    //     // Attach the design to the cart
    //     $cart->designs()->attach($design->id, ['quantity' => 1]);

    //     return redirect('/carts')->with('success', 'Design added to cart!');
    // }

    public function store(Request $request, Design $design)
    {
        // Check if the design is retrieved correctly
        if (!$design) {
            return redirect()->back()->with('error', 'Design not found.');
        }

        $user = Auth::user();
        
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        
        $cartDesign = $cart->designs()->where('design_id', $design->id)->first();

        if ($cartDesign) {
            $cart->designs()->updateExistingPivot($design->id, [
                'quantity' => $cartDesign->pivot->quantity + 1,
                'isChecked' => true
            ]);
        } else {
            $cart->designs()->attach($design->id, [
                'quantity' => 1,
                'isChecked' => true
            ]);
        }

        return redirect()->back()->with('success', 'Design Added to Cart!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        $designId = $request->input('design_id');
        $design = Design::find($designId);

        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:0|max:' . $design["stock"]
        ]);

        $cart = Cart::find($cart->id);
    
        if ($cart) {
            $cart->designs()->updateExistingPivot($designId, ['quantity' => $validatedData['quantity']]);
            return redirect()->back();
        }
    }

    public function updateIsChecked(Request $request)
    {
        $request->validate([
            'design_id' => 'required|integer|exists:cart_designs,design_id',
            'is_checked' => 'required|boolean',
        ]);

        // Find the cart item by book ID and update its isChecked status
        $cartItem = Cart::where('user_id', Auth::id())
            ->whereHas('designs', function ($query) use ($request) {
                $query->where('design_id', $request->design_id);
            })
            ->first();

        if ($cartItem) {
            $cartItem->designs()->updateExistingPivot($request->design_id, ['isChecked' => $request->is_checked]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'design_id' => 'required|integer|exists:cart_designs,design_id',
            'quantity' => 'required|integer|min:0'
        ]);

        $cartItem = Cart::where('user_id', Auth::id())
            ->whereHas('designs', function ($query) use ($request) {
                $query->where('design_id', $request->design_id);
            })
            ->first();

        if ($cartItem) {
            $cartItem->designs()->updateExistingPivot($request->design_id, ['quantity' => $request->quantity]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Cart $cart)
    {
        $designId = $request->input('design_id');
        $cart->designs()->detach($designId);
        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}
