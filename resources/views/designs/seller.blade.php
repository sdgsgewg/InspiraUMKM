@extends('layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/designs/style.css') }}?v={{ time() }}">

    <div class="row justify-content-center mt-4">
        <div class="col-11">
            <div class="d-flex flex-row" style="height: 150px;">
                <div class="col-4 d-flex flex-row" style="height: 100%;">
                    <div class="align-items-start img-thumbnail rounded-circle overflow-hidden"
                        style="width: 100px; height: 100px;">
                        @if ($seller->image)
                            <img src="{{ asset('storage/' . $seller->image) }}" alt="{{ $seller->name }}"
                                class="rounded-circle">
                        @else
                            <img src="{{ asset('img/' . $seller->gender . ' icon.png') }}" alt="{{ $seller->name }}"
                                class="rounded-circle">
                        @endif
                    </div>
                    <div class="d-flex flex-column ms-3">
                        <h4>{{ $seller->name }}</h4>
                    </div>
                </div>
                <div class="col-7 d-flex flex-column gap-1 ms-2">
                    <div class="d-inline-flex">
                        <i class="bi bi-palette me-2"></i> Designs: {{ $seller->designs->count() }}
                    </div>
                    <div class="d-inline-flex">
                        <i class="bi bi-calendar me-2"></i> Date Joined: {{ date_format($seller->created_at, 'j F Y') }}
                    </div>
                    @if ($averageRating > 0.0)
                        <div class="d-inline-flex">
                            <i class="bi bi-star me-2"></i> Rating: <span class="badge bg-warning text-dark shadow-sm ms-2"
                                style="font-size: 0.9rem; font-weight: bold;">
                                {{ $averageRating }}
                            </span>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11">
            @if ($designs->count())
                <div class="row d-flex flex-wrap align-items-stretch">
                    @foreach ($designs as $design)
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                            @include('components.designs.card')
                        </div>
                    @endforeach
                </div>
                <div class="d-flex align-items-center justify-content-center mt-5">
                    {{ $designs->links() }}
                </div>
            @else
                @include('components.designs.noDesign')
            @endif

        </div>
    </div>
@endsection
