@extends('layouts.main')

@section('container')
    <style>
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Carousel */
        .carousel-control-prev,
        .carousel-control-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background-color: rgb(84, 61, 199);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: rgb(32, 19, 99);
        }

        .carousel-control-prev {
            left: -25px;
        }

        .carousel-control-next {
            right: -25px;
        }

        .carousel-inner {
            display: flex;
            flex-wrap: nowrap;
            align-items: stretch;
        }
    </style>

    <main>
        <div class="row justify-content-center my-5">
            <div class="col-11 position-relative">
                @php
                    $advertisements = 3;
                @endphp
                <div id="carouselExampleIndicators" class="carousel slide" data-ads-amount="{{ $advertisements }}">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
                    </div>
                    <div class="carousel-inner">
                        @for ($i = 0; $i < $advertisements; $i++)
                            <div class="carousel-item @if ($i === 0) active @endif">
                                <div class="img-wrapper rounded-4 overflow-hidden" style="width: auto; height:350px;">
                                    <img src="{{ asset('img/Accessories.jpg') }}" class="d-block w-100" alt="">
                                </div>
                            </div>
                        @endfor
                    </div>

                    @if ($advertisements > 1)
                        <button class="carousel-control-prev border border-black" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next border border-black" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif

                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-11 d-flex flex-row justify-content-evenly">
                @foreach ($products as $p)
                    <a href="{{ route('designs.index', ['product' => $p->slug]) }}" class="text-decoration-none"
                        style="color: inherit;">
                        <div class="d-flex flex-column">
                            <div class="rounded-4 p-4" style="background-color: rgb(214, 215, 181)">
                                <div class="img-wrapper overflow-hidden" style="width: 90px; height: 90px;">
                                    @if ($p->image)
                                        <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}">
                                    @else
                                        <img src="{{ '../../img/product/' . $p->slug . '.png' }}" alt="{{ $p->name }}">
                                    @endif
                                </div>
                            </div>
                            <div class="text-center fw-bold fs-4 mt-2">{{ $p->name }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-12 position-relative">
                <div class="offer position-absolute"
                    style="top:50%; left: 50%; transform:translate(-50%, -50%); z-index: 1; background-color: white; padding: 0 10px;">
                    <p class="fs-4 m-0">Special Offers</p>
                </div>
                <hr>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-11">
                <div class="card d-flex flex-row">
                    <div class="col-md-3 me-4" style="height: 300px;">
                        <img src="{{ asset('img/Drink.jpg') }}" alt="">
                    </div>
                    <div class="col-md-9 d-flex flex-column justify-content-evenly align-items-start ps-5">
                        <h3 class="text-uppercase fw-bold">Bundle : Packaging + Stickers</h3>
                        <h5 class="fst-italic fw-light">*Only for VIP Member</h5>
                        <div class="d-flex flex-row">
                            <h5>Rp15.000</h5>
                            <h5 class="text-decoration-line-through ms-4">Rp30.000</h5>
                        </div>
                        <button class="btn btn-success rounded-3 px-4 py-2 text-uppercase">
                            Order Now!
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- <script src="{{ asset('js/ads-slider.js') }}"></script> --}}
@endsection
