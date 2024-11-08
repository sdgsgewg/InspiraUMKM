@extends('dashboard.layouts.main')

@section('container')
    <style>
        .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    <div class="row my-3">
        <div class="col-lg-10">
            <h1 class="mb-3">{{ $design['title'] }}</h1>

            <div class="d-flex flex-row gap-3">
                <a href="{{ route('admin.designs.index') }}"
                    class="btn btn-success d-inline-flex">
                    <i class="bi bi-arrow-left me-2 align-middle"></i> Back to my design
                </a>
                <a href="{{ route('admin.designs.edit', ['design' => $design->slug]) }}"
                    class="btn btn-warning d-inline-flex">
                    <i class="bi bi-pencil-square me-2 align-middle"></i> Edit
                </a>
                <form action="{{ route('admin.designs.destroy', ['design' => $design->slug]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger d-inline-flex"
                        onclick="return confirm('Are you sure?')">
                        <i class="bi bi-x-circle icon me-2 align-middle"></i> Delete
                    </button>
                </form>
            </div>

            <div class=" card d-flex flex-row mt-4" style="height: 250px;">
                <div class="img-wrapper col-4 overflow-hidden" style="height: 100%;">
                    @if ($design->image)
                        <img src="{{ asset('storage/' . $design->image) }}" alt="{{ $design->category->name }}">
                    @else
                        <img src="{{ asset('img/' . $design->product->name . '.jpg') }}"
                            alt="{{ $design->category->name }}">
                    @endif
                </div>
                <div class="col-8 ms-5">
                    <p class="fs-4 fw-bold">Product: {{ $design->product->name }}</p>
                    <p class="fs-4 fw-bold">Category: {{ $design->category->name }}</p>
                    <p class="fs-5">Stock: {{ $design->stock }}</p>
                    <p class="fs-5">Price: Rp{{ number_format($design->price, 2, ',', '.') }}</p>
                </div>
            </div>

            <div class="d-flex flex-column mt-4">
                <h1>Description</h1>
                <hr>
                <article class="my-3 fs-5">
                    {!! $design->description !!}
                </article>
            </div>
        </div>
    </div>
@endsection
