@extends('layouts.main')

@section('container')

    @include('components.designs.designHeader')

    @php
        $numProduct = $products->count();
    @endphp

    @if ($designsByProduct->count())
        <div class="row justify-content-center">
            <div class="col-11">
                @foreach ($products->take(2) as $product)
                    @include('components.designs.product-designs')
                @endforeach
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-11 moreContent" style="display: none;">
                @foreach ($products->skip(2) as $product)
                    @include('components.designs.product-designs')
                @endforeach
            </div>
        </div>

        @if ($numProduct > 2)
            <div class="row justify-content-center">
                <div class="col-11 d-flex flex-row-reverse">
                    <button id="seeMore" class="toggleBtn btn btn-success px-3 py-2" onclick="toggleContent()">See
                        More
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
