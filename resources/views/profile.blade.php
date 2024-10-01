@extends('layouts.main')

@section('container')
    <h1>{{ $title }}</h1>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- @if ($user->image)
        <img src="img/test.jpg" alt="{{ $user->name }}" width="200" class="img-thumbnail rounded-circle">
    @else
        <img src="img/test.jpg" alt="{{ $user->name }}" width="200" class="img-thumbnail rounded-circle">
    @endif --}}

    <img src="{{ asset('img/male icon.png') }}" alt="{{ $user->name }}" width="200" class="img-thumbnail rounded-circle">

    <h3>{{ $user->name }}</h3>
    <p>{{ $user->email }}</p>
@endsection
