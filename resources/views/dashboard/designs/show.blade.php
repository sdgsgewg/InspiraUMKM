@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $design['title'] }}</h1>

                <a href="/dashboard/designs" class="btn btn-success d-inline-flex"><i class="bi bi-arrow-left me-2"></i> Back to my design</a>

                <a href="/dashboard/designs/{{ $design->slug }}/edit" class="btn btn-warning d-inline-flex"><i class="bi bi-pencil-square me-2"></i>
                    Edit</a>

                <form action="/dashboard/designs/{{ $design->slug }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger d-inline-flex" onclick="return confirm('Are you sure?')">
                        <i class="bi bi-x-circle icon me-2"></i> Delete
                    </button>
                </form>

                <?php
                $url = '../../img/';
                // $url = 'https://api.unsplash.com/search/photos';
                ?>

                @if ($design->image)
                    <div style="max-height: 350px; overflow: hidden">
                        <img src="{{ asset('storage/' . $design->image) }}" alt="{{ $design->category->name }}" width="1200"
                            height="600" class="img-fluid mt-3">
                    </div>
                @else
                    <img src="{{ $url . $design->category->name . '.jpg' }}" alt="{{ $design->category->name }}" width="1200"
                        height="600" class="img-fluid mt-3">
                @endif

                <article class="my-3 fs-5">
                    {!! $design->body !!}
                </article>

            </div>
        </div>
    </div>
@endsection
