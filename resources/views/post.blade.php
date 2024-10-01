@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post['title'] }}</h1>
                <p>
                    By.
                    <a href="/posts?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a>
                    in
                    <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">
                        {{ $post->category->name }}</a>
                </p>

                <?php
                $url = '../../img/';
                // $url = 'https://api.unsplash.com/search/photos';
                ?>

                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                </div>
                @else
                    <img src="{{ $url . $post->category->name . '.jpg' }}" alt="{{ $post->category->name }}" width="1200"
                        height="400" class="img-fluid">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <a href="/posts" class="d-block mt-3">&laquo; Back to all posts</a>
            </div>
        </div>
    </div>
@endsection
