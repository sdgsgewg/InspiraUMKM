@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $design['title'] }}</h1>
                <p>
                    By.
                    <a href="{{ route('designs.index', ['author' => $design->author->username]) }}"
                        class="text-decoration-none">{{ $design->author->name }}</a>
                    in
                    <a href="{{ route('designs.index', ['category' => $design->category->slug ]) }}" class="text-decoration-none">
                        {{ $design->category->name }}</a>
                </p>

                <?php
                $url = '../../img/';
                // $url = 'https://api.unsplash.com/search/photos';
                ?>

                @if ($design->image)
                    <div style="max-height: 350px; overflow:hidden">
                        <img src="{{ asset('storage/' . $design->image) }}" alt="{{ $design->category->name }}"
                            class="img-fluid">
                    </div>
                @else
                    <img src="{{ $url . $design->category->name . '.jpg' }}" alt="{{ $design->category->name }}" width="1200"
                        height="400" class="img-fluid">
                @endif

                <article class="my-3 fs-5">
                    {!! $design->body !!}
                </article>

                <a href="{{ route('designs.index') }}" class="d-block mt-3">&laquo; Back to all designs</a>
            </div>
        </div>
    </div>
@endsection
