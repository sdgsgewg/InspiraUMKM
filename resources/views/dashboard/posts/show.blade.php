@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post['title'] }}</h1>

                <a href="/dashboard/posts" class="btn btn-success"><i class="bi bi-arrow-left"></i> Back to my posts</a>

                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i>
                    Edit</a>

                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                        <i class="bi bi-x-circle icon"></i> Delete
                    </button>
                </form>

                <?php
                $url = '../../img/';
                // $url = 'https://api.unsplash.com/search/photos';
                ?>

                @if ($post->image)
                    <div style="max-height: 350px; overflow: hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" width="1200"
                            height="600" class="img-fluid mt-3">
                    </div>
                @else
                    <img src="{{ $url . $post->category->name . '.jpg' }}" alt="{{ $post->category->name }}" width="1200"
                        height="600" class="img-fluid mt-3">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

            </div>
        </div>
    </div>
@endsection
