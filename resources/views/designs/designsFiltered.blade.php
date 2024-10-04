@extends('layouts.main')

@section('container')

    <h1 class="mb-4 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-5">
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
        <div class="card mb-3">

            <div style="width: 100%; height: 400px;">
                <?php
                $url = '../../img/';
                // $url = 'https://api.unsplash.com/search/photos';
                ?>

                @if ($designs[0]->image)
                    <div style="max-height: 400px; overflow: hidden">
                        <img src="{{ asset('storage/' . $designs[0]->image) }}" alt="{{ $designs[0]->category->name }}"
                            style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px 5px 0 0;">
                    </div>
                @else
                    <img src="{{ $url . $designs[0]->category->name . '.jpg' }}" alt="{{ $designs[0]->category->name }}"
                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px 5px 0 0;">
                @endif
            </div>

            <div class="card-body text-center">
                <h3 class="card-title">
                    <a href="{{ route('designs.show', ['design' => $designs[0]->slug]) }}" class="text-decoration-none text-dark text-white">
                        {{ $designs[0]->title }}
                    </a>
                </h3>
                <p>
                    <small class="text-body-secondary">
                        By.
                        <a href="{{ route('designs.index', ['author' => $designs[0]->author->username]) }}"
                            class="text-decoration-none">{{ $designs[0]->author->name }}</a>
                        in
                        <a href="{{ route('designs.index', ['category' => $designs[0]->category->slug]) }}" class="text-decoration-none">
                            {{ $designs[0]->category->name }}</a>
                    </small>
                </p>
                <p class="card-text">{{ $designs[0]->excerpt }}</p>
                <a href="{{ route('designs.index', ['design' => $designs[0]->slug]) }}" class="text-decoration-none btn btn-primary">View details</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($designs->skip(1) as $design)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="position-absolute px-3 py-2"
                                style="background-color: rgba(0, 0, 0, 0.6); border-radius: 5px 0 0 0">
                                <a href="{{ route('designs.index', ['design' => $design->category->slug]) }}"
                                    class="text-white text-decoration-none">
                                    {{ $design->category->name }}
                                </a>
                            </div>

                            <div style="width: 100%; height: 200px;">
                                <?php
                                $url = '../../img/';
                                ?>

                                @if ($design->image)
                                    <img src="{{ asset('storage/' . $design->image) }}"
                                        alt="{{ $design->category->name }}"
                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px 5px 0 0;">
                                @else
                                    <img src="{{ $url . $design->category->name . '.jpg' }}"
                                        alt="{{ $design->category->name }}"
                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px 5px 0 0;">
                                @endif
                            </div>

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $design->title }}</h5>
                                <p>
                                    <small class="text-body-secondary">
                                        By.
                                        <a href="{{ route('designs.index', ['author' => $design->author->username]) }}"
                                            class="text-decoration-none">{{ $design->author->name }}</a>
                                    </small>
                                </p>
                                <div class="mt-auto">
                                    <a href="{{ route('designs.show', ['design' => $design->slug]) }}" class="btn btn-primary">View details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No design found.</p>
    @endif

    <div class="d-flex justify-content-end mt-5">
        {{ $designs->links() }}
    </div>

@endsection
