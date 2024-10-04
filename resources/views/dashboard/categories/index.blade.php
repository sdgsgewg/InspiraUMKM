@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Design Categories</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive small col-lg-6">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Create new category</a>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>

                            <a href="{{ route('admin.categories.edit', ['category' => $category->slug]) }}" class="badge bg-warning">
                                <i class="bi bi-pencil-square icon"></i>
                            </a>

                            <form action="{{ route('admin.categories.destroy', ['category' => $category->slug]) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-x-circle icon"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
