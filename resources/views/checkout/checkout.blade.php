@extends('layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/cart/style.css') }}?v={{ time() }}">

    <div class="row justify-content-center mt-5">
        <div class="col-11 d-flex flex-column">
            <div class="d-flex flex-row align-items-center">
                <a href="{{ route('carts.index') }}" class="btn btn-success me-3"><i class="bi bi-arrow-left"></i></a>
                <h1>{{ $title }}</h1>
            </div>
            <hr class="mb-4">

            <form method="POST" action="{{ route('payments.payment') }}" id="checkout-form">
                @csrf

                @if (count($checkoutItems) > 0)
                    {{-- Delivery Address --}}
                    <div class="d-flex flex-column">
                        <h6 class="fw-bold">Delivery Address</h6>
                        <div class="d-flex">
                            <div>
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="d-flex flex-column ms-3">
                                <div class="d-flex gap-3">
                                    <p class="m-0 mb-1">
                                        {{ $buyer->name }} | <span class="text-secondary">{{ $buyer->phoneNumber }}</span>
                                    </p>
                                </div>
                                <div>
                                    {{ $buyer->address }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">

                    <div class="row d-flex flex-wrap justify-content-between">
                        {{-- Checkout Items --}}
                        <div class="col-11 col-lg-6">
                            @include('components.checkout.checkout-items')
                        </div>
                        {{-- Checkout Confirmation --}}
                        <div class="col-11 col-lg-6 d-flex flex-column ps-lg-5 gap-3">
                            {{-- Option dari setiap design --}}
                            @include('components.checkout.design-option')

                            {{-- Notes for seller --}}
                            <div class="col-12 d-flex flex-column">
                                <label for="notes" class="form-label mb-0">Notes for Seller :</label>
                                <small class="fst-italic  text-secondary my-1">*optional</small>
                                <textarea class="w-100" name="notes" id="notes" rows="3" placeholder="Input your notes here..."></textarea>
                            </div>

                            {{-- Payment Method --}}
                            @include('components.checkout.payment-method')

                            {{-- Shipping Method --}}
                            @include('components.checkout.shipping-method')
                        </div>
                    </div>
                    <hr class="my-4">

                    {{-- Design Items --}}
                    <input type="hidden" name="checkoutItems" value="{{ json_encode($checkoutItems) }}">
                    <input type="hidden" name="productAmount" value="{{ json_encode($productAmount) }}">
                    <input type="hidden" name="checkoutItemsPrice" value="{{ json_encode($checkoutItemsPrice) }}">

                    {{-- Subtotal Price --}}
                    <input type="hidden" name="subTotalPrice" value="{{ $subTotalPrice }}">

                    {{-- Source Page --}}
                    <input type="hidden" name="source" value="{{ session('fromPage') }}">

                    @if (session('fromPage') === 'DesignDetail')
                        <input type="hidden" name="quantity" value="{{ $quantity }}">
                    @endif

                    @include('components.checkout.checkout-button', ['navigateTo' => 'Proceed To Payment'])
                @endif
            </form>
        </div>
    </div>
@endsection
