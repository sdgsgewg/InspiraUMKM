@extends('layouts.main')

@section('container')

    <link rel="stylesheet" href="{{ asset('css/designs/style.css') }}?v={{ time() }}">


    @if ($designsByProduct->isNotEmpty() && $designsByProduct->flatten()->isNotEmpty())
        <div class="row justify-content-center">
            <div class="col-11">
                @php
                    $numProduct = 0;
                @endphp
                @foreach ($products as $product)
                    @if (isset($designsByProduct[$product->id]))
                        @php
                            $numProduct++;
                        @endphp
                        {{-- Display Product Big Image --}}
                        <div class="row justify-content-center my-5">
                            <div class="col-12">
                                <div class="img-wrapper rounded-4 overflow-hidden" style="width: 100%; height:450px;">
                                    <img src="{{ asset('img/' . $product->name . '.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <!-- Display Product Name -->
                        <div class="col-md-12 mb-4 d-flex align-items-center product-header">
                            <h2 class="product-title">{{ $product->name }}</h2>
                        </div>

                        @php
                            $numCtg = $designsByProduct[$product->id]->count();
                        @endphp

                        {{-- 2 First Category --}}
                        @foreach ($designsByProduct[$product->id]->take(2) as $categoryId => $designsInCategory)
                            @if ($designsInCategory->isNotEmpty())
                                @php
                                    $category = $categories->firstWhere('id', $categoryId);
                                @endphp

                                @if ($category)
                                    <div class="col-md-12 mb-3">
                                        <h4>{{ $category->name }}</h4>
                                    </div>

                                    <div id="carouselExample{{ $product->id }}{{ $category->id }}" class="carousel mb-5"
                                        data-design-amount="{{ $designsInCategory->count() }}">

                                        <div class="carousel-inner">
                                            @foreach ($designsInCategory as $index => $design)
                                                <div class="carousel-item @if ($index === 0) active @endif">
                                                    @include('components.card', ['design' => $design])
                                                </div>
                                            @endforeach
                                        </div>

                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExample{{ $product->id }}{{ $category->id }}"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>

                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExample{{ $product->id }}{{ $category->id }}"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>

                                    </div>
                                @endif
                            @endif
                        @endforeach

                        {{-- Another Category --}}
                        <div class="moreContent" data-id={{ $numProduct }} style="display: none;">
                            @foreach ($designsByProduct[$product->id]->skip(2) as $categoryId => $designsInCategory)
                                @if ($designsInCategory->isNotEmpty())
                                    @php
                                        $category = $categories->firstWhere('id', $categoryId);
                                    @endphp

                                    @if ($category)
                                        <div class="col-md-12 mb-3">
                                            <h4>{{ $category->name }}</h4>
                                        </div>

                                        <div id="carouselExample{{ $product->id }}{{ $category->id }}"
                                            class="carousel mb-5" data-design-amount="{{ $designsInCategory->count() }}">

                                            <div class="carousel-inner">
                                                @foreach ($designsInCategory as $index => $design)
                                                    <div
                                                        class="carousel-item @if ($index === 0) active @endif">
                                                        @include('components.card', ['design' => $design])
                                                    </div>
                                                @endforeach
                                            </div>

                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExample{{ $product->id }}{{ $category->id }}"
                                                data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>

                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExample{{ $product->id }}{{ $category->id }}"
                                                data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>

                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>

                        @if ($numCtg > 2)
                            <div class="d-flex flex-row-reverse">
                                <button id="seeMore" class="toggleBtn btn btn-success px-3 py-2"
                                    onclick="toggleContent({{ $numProduct }})" data-id="{{ $numProduct }}">See More
                                    >>></button>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    @else
        <div class="row d-flex align-items-center justify-content-center vh-100">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="img-no-design">
                        <img src="{{ asset('img/noDesign.png') }}" alt="">
                    </div>
                    <h4 class="mt-1">No Design Found</h4>
                </div>
            </div>
        </div>
    @endif


    <script src="{{ asset('js/designs/card-slider.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('js/designs/seeMore.js') }}?v={{ time() }}"></script>

    <script>
        const routeGetCategoriesByProduct = '{{ route('designFilter.getCategoriesByProduct', ':slug') }}';
        let oldCategorySlugs = @json(old('category', $designCategories ?? []));
        const oldProductSlug = "{{ old('product') }}";
    </script>
    <script src="{{ asset('js/designs/filter.js') }}"></script>

@endsection
