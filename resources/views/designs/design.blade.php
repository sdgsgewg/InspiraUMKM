@extends('layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/designs/style.css') }}?v={{ time() }}">

    @include('components.modals.addToCartModal')

    <div class="row justify-content-center mt-4 mb-5">
        <div class="col-11 col-md-8">
            <h1 class="mt-2 mb-3">{{ $design['title'] }}</h1>
            <div class="mb-3">
                <p>
                    By.
                    <a href="{{ route('designs.seller', ['seller' => $design->seller->username]) }}"
                        class="text-decoration-none">
                        {{ $design->seller->name }}
                    </a>
                </p>
            </div>

            <div class="d-flex flex-row" style="max-height: 350px;">
                <div class="col-4 overflow-hidden">
                    @if ($design->image)
                        <div style="max-height: 350px; overflow:hidden">
                            <img src="{{ asset('storage/' . $design->image) }}" alt="{{ $design->name }}" class="img-fluid">
                        </div>
                    @else
                        <img src="{{ asset('img/' . $design->product->name . '.jpg') }}" alt="{{ $design->name }}"
                            width="1200" height="400" class="img-fluid">
                    @endif
                </div>
                <div class="col-7 d-flex flex-column ms-5">
                    <p>Product:
                        <a href="{{ route('designs.product', ['product' => $design->product->slug]) }}"
                            class="text-decoration-none">{{ $design->product->name }}</a>
                    </p>
                    <p>Category:
                        <a href="{{ route('designs.category', ['category' => $design->category->slug]) }}"
                            class="text-decoration-none">{{ $design->category->name }}</a>
                    </p>

                    @if ($avgDesignRating > 0.00)
                        <p>Rating: <span class="badge bg-warning text-dark shadow-sm"
                                style="font-size: 0.9rem; font-weight: bold;">
                                {{ number_format($avgDesignRating, 2) }}
                            </span></p>
                    @endif

                    <div class="d-flex flex-row gap-3 mt-auto">
                        @if (auth()->check() && auth()->user()->id !== $design->seller->id)
                            <form action="{{ route('carts.store', ['design' => $design->slug]) }}" method="POST"
                                class="d-inline">
                                @csrf
                                <button type={{ $design->stock > 0 ? 'submit' : 'button' }}
                                    class="btn {{ $design->stock > 0 ? 'btn-primary' : 'btn-secondary' }} d-inline-flex">
                                    <i class="bi bi-cart-plus me-2"></i>Add to Cart
                                </button>
                            </form>

                            <form action="{{ route('carts.checkoutFromDesign') }}" class="d-inline">
                                @csrf

                                <input type="hidden" name="design_id" value="{{ $design->id }}">

                                <button type={{ $design->stock > 0 ? 'submit' : 'button' }}
                                    class="btn {{ $design->stock > 0 ? 'btn-success' : 'btn-secondary' }} d-inline-flex">
                                    <i class="bi bi-bag-check me-2"></i>Checkout
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            <article class="mt-4 fs-6">
                <hr>
                <h2 class="mb-3">Detail Information</h2>
                <p>Price: Rp{{ number_format($design->price, 2, ',', '.') }}</p>
                <p>Stock: {{ $design->stock }}</p>
                <p>Sold: {{ $soldQuantity }}</p>
            </article>

            <article class="mt-3 fs-6">
                <hr>
                <h2>Description</h2>
                {!! $design->description !!}
            </article>

            @include('components.designs.design-review-section')

            @include('components.designs.comments.design-comment-section')
        </div>
    </div>

    @include('components.designs.design-script')
@endsection
