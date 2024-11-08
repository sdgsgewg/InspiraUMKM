@extends('layouts.main')

@section('container')

    <link rel="stylesheet" href="{{ asset('css/designs/style.css') }}?v={{ time() }}">

    <div class="row justify-content-center my-5">
        <div class="col-11 col-md-6 d-flex flex-column ">
            <h1 class="text-center mb-5">{{ $title }}</h1>
            <div class="d-flex flex-row gap-3">
                <div class="col-11">
                    @include('components.search')
                </div>
                <div class="col-1">
                    @include('components.filter')
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-11">
            @if ($designsByProduct->count())
                @foreach ($products as $product)
                    @php
                        $designAmount = 0;
                    @endphp
                    @if ($product->designs->count())
                        <div class="mb-3 d-flex justify-content-between align-items-center product-header">
                            <h2 class="product-title">{{ $product->name }}</h2>
                            <a href="{{ route('designs.index', ['product' => $product->slug]) }}"
                                class="d-flex align-items-center view-all-link btn btn-primary">
                                View All <i class="bi bi-arrow-right-circle ms-2"></i>
                            </a>
                        </div>

                        @php
                            $designAmount += $product->designs->count();
                        @endphp

                        <div id="carouselExample{{ $product->id }}" class="carousel mb-5"
                            data-design-amount="{{ $designAmount }}">

                            <div class="carousel-inner">
                                @foreach ($product->designs->take(6) as $index => $design)
                                    <div class="carousel-item @if ($index === 0) active @endif">

                                        @include('components.card')

                                    </div>
                                @endforeach
                            </div>

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

                        </div>
                    @endif
                @endforeach
            @else
                <p class="text-center fs-4">No design found.</p>
            @endif
        </div>
    </div>

    <script src="{{ asset('js/designs/card-slider.js') }}?v={{ time() }}"></script>

    <script>
        var routeGetCategoriesByProduct = '{{ route('designFilter.getCategoriesByProduct', ':slug') }}';
        var oldCategorySlugs = @json(old('category', $designCategories ?? []));
        var oldProductSlug = "{{ old('product') }}";
    </script>
    <script src="{{ asset('js/designs/filter.js') }}"></script>

@endsection
