<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Design;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::with('designs')->where('user_id', Auth::id())->get();

        return view('cart', [
            'title' => 'My Cart',
            'carts' => $carts
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

    public function store(StoreCartRequest $request, Design $design)
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
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
