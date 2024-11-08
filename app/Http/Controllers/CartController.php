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
        $carts = Cart::with('designs')->where('user_id', Auth::id())->get();

        return view('carts.cart', [
            'title' => 'My Cart',
            'carts' => $carts
        ]);
    }

    public function checkout()
    {
        return view('carts.checkout', [
            'title' => 'Checkout'
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
            // Design already in cart, update the quantity
            $cart->designs()->updateExistingPivot($design->id, [
                'quantity' => $cartDesign->pivot->quantity + 1
            ]);
        } else {
            // Design not in cart, attach it with default quantity of 1
            $cart->designs()->attach($design->id, ['quantity' => 1]);
        }

        // Redirect to the cart page with success message
        return redirect('/carts')->with('success', 'Design added to cart!');
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

        if ($validatedData['quantity'] == 0) {
            return $this->destroy($cart, $designId);
        }

        $cart = Cart::find($cart->id);
    
        if ($cart) {
            $cart->designs()->updateExistingPivot($designId, ['quantity' => $validatedData['quantity']]);
    
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart, $designId)
    {
        $cart->designs()->detach($designId);
        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}
