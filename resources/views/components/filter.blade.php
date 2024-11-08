<!-- Filter Button -->
<div>
    <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center" data-bs-toggle="modal"
        data-bs-target="#filterModal">
        <i class="bi bi-funnel"></i>
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filter Designs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{ route('designs.index') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="product" class="form-label">Product</label>
                        <select id="product" class="form-select @error('product') is-invalid @enderror"
                            name="product">
                            <option value="">Select a Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->slug }}"
                                    {{ old('product', request()->product) == $product->slug ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('product')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Categories</label>
                        <ul id="category" class="list-group @error('category') is-invalid @enderror">
                        </ul>
                        @error('category')
                            <div class="invalid-feedback">The category field is required</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="seller" class="form-label">Seller</label>
                        <select id="seller" class="form-select @error('seller') is-invalid @enderror" name="seller">
                            <option value="">Select a seller</option>
                            @foreach ($sellers as $seller)
                                <option value="{{ $seller->username }}"
                                    {{ old('seller', request()->seller) == $seller->username ? 'selected' : '' }}>
                                    {{ $seller->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('seller')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
