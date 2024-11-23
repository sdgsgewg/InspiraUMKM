@extends('layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/designs/style.css') }}?v={{ time() }}">

    {{-- Display Product Big Image --}}
    <div class="row justify-content-center my-5">
        <div class="col-11">
            <div class="img-wrapper rounded-4 overflow-hidden" style="width: auto; height:450px;">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('img/' . $product->name . '.jpg') }}" alt="{{ $product->name }}">
                @endif
            </div>
        </div>
    </div>

    {{-- Display Product Name --}}
    <div class="row justify-content-center">
        <div class="col-11 content-header">
            <h2 class="fw-bold">{{ $product->name }}</h2>
        </div>
    </div>

    @if ($product->designs->count() > 0)
        @php
            $numCtg = $product->categories->count();
        @endphp

        <div class="row justify-content-center">
            <div class="col-11">
                @foreach ($product->categories->take(2) as $category)
                    @include('components.designs.category-designs')
                @endforeach
            </div>
        </div>

        {{-- Another Category --}}
        <div class="row justify-content-center">
            <div class="col-11 moreContent" style="display: none;">
                @foreach ($product->categories->skip(2) as $category)
                    @include('components.designs.category-designs')
                @endforeach
            </div>
        </div>

        @if ($numCtg > 2)
            <div class="row justify-content-center">
                <div class="col-11 d-flex flex-row-reverse">
                    <button id="seeMore" class="toggleBtn btn btn-success px-3 py-2" onclick="toggleContent()">See More
                        >>></button>
                </div>
            </div>
        @endif
    @else
        <div class="row justify-content-center">
            <div class="col-11">
                @include('components.designs.noDesign')
            </div>
        </div>
    @endif

    @include('components.designs.design-script')
@endsection
