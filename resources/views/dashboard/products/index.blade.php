@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Design Products</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="table-responsive small col-lg-6">
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Create new product</a>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>

                            <a href="{{ route('admin.products.edit', ['product' => $product->slug]) }}"
                                class="badge bg-warning">
                                <i class="bi bi-pencil-square icon"></i>
                            </a>

                            <button type="button" class="badge bg-danger border-0" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $product->id }}">
                                <i class="bi bi-x-circle icon"></i>
                            </button>

                            @include('components.modals.dashboard.delete-modal', [
                                'item' => $product,
                                'resourceType' => 'product',
                                'resourceUrl' => 'products',
                            ])

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
