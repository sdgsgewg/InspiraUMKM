@extends('layouts.main')

@section('container')

    <style>
        .carousel-control-prev,
        .carousel-control-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background-color: rgb(75, 75, 84);
            border-radius: 50%;
        }

        .carousel-control-prev {
            left: -15px;
        }

        .carousel-control-next {
            right: -15px;
        }
    </style>

    <h1 class="mb-4 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/designs">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                @if (request('product'))
                    <input type="hidden" name="product" value="{{ request('product') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}" autocomplete="off">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($designs->count())
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    @if ($product->designs->count())
                        <div class="col-md-12 mb-3">
                            <h2>{{ $product->name }}</h2>
                        </div>

                        <div id="carouselExample{{ $product->id }}" class="carousel slide mb-5">

                            <div class="carousel-inner">
                                @foreach ($product->designs as $index => $design)
                                    <div class="carousel-item @if ($index === 0) active @endif">

                                        <div class="card d-flex flex-column h-100">
                                            <div class="position-absolute px-3 py-2"
                                                style="background-color: rgba(0, 0, 0, 0.6); border-radius: 5px 0 0 0">
                                                <a href="/designs?category={{ $design->category->slug }}"
                                                    class="text-white text-decoration-none">
                                                    {{ $design->category->name }}
                                                </a>
                                            </div>

                                            <div style="width: 100%; height: 250px;">
                                                @if ($design->image)
                                                    <img src="{{ asset('storage/' . $design->image) }}"
                                                        alt="{{ $design->category->name }}"
                                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px 5px 0 0;">
                                                @else
                                                    <img src="{{ '../../img/' . $design->category->name . '.jpg' }}"
                                                        alt="{{ $design->category->name }}"
                                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px 5px 0 0;">
                                                @endif
                                            </div>

                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title">{{ $design->title }}</h5>
                                                <p>
                                                    <small class="text-body-secondary">
                                                        By. <a href="/designs?author={{ $design->author->username }}"
                                                            class="text-decoration-none">
                                                            {{ $design->author->name }}</a>
                                                    </small>
                                                </p>
                                                <div class="mt-auto">
                                                    <a href="/designs/{{ $design->slug }}" class="btn btn-primary">View
                                                        details</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>

                            @if ($product->designs->count() > 1)
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExample{{ $product->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExample{{ $product->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No design found.</p>
    @endif

@endsection
