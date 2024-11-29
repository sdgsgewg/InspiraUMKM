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
                <form method="GET" action="{{ route('designs.filter') }}">
                    @csrf

                    <!-- Include existing query parameters as hidden fields -->
                    @foreach (request()->except(['product', 'category', 'min_price', 'max_price', 'rating', 'seller', '_token']) as $key => $value)
                        @if (is_array($value))
                            @foreach ($value as $subValue)
                                <input type="hidden" name="{{ $key }}[]" value="{{ $subValue }}">
                            @endforeach
                        @else
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach

                    {{-- Product --}}
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

                    {{-- Category --}}
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <ul id="category" class="list-group @error('category') is-invalid @enderror">
                        </ul>
                        @error('category')
                            <div class="invalid-feedback">The category field is required</div>
                        @enderror
                    </div>

                    {{-- Price Range --}}
                    <div class="col-12 d-column mb-3">
                        <label for="price-range" class="mb-2">Price Range</label>
                        <div class="d-flex justify-content-between align-items-center" id="price-range">
                            <div>
                                <input type="number" id="min_price" name="min_price"
                                    class="form-control @error('min_price') is-invalid @enderror"
                                    value="{{ old('min_price', request()->min_price) }}"
                                    placeholder="Enter minimum price">
                                @error('min_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                -
                            </div>
                            <div>
                                <input type="number" id="max_price" name="max_price"
                                    class="form-control @error('max_price') is-invalid @enderror"
                                    value="{{ old('max_price', request()->max_price) }}"
                                    placeholder="Enter maximum price">
                                @error('max_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Rating --}}
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select id="rating" class="form-select @error('rating') is-invalid @enderror" name="rating">
                            <option value="">Select a rating</option>
                            <option value="5" {{ old('rating', request()->rating) == '5' ? 'selected' : '' }}>5
                                stars</option>
                            <option value="4" {{ old('rating', request()->rating) == '4' ? 'selected' : '' }}>4
                                stars or more</option>
                            <option value="3" {{ old('rating', request()->rating) == '3' ? 'selected' : '' }}>3
                                stars or more</option>
                            <option value="2" {{ old('rating', request()->rating) == '2' ? 'selected' : '' }}>2
                                stars or more</option>
                            <option value="1" {{ old('rating', request()->rating) == '1' ? 'selected' : '' }}>1
                                star or more</option>
                        </select>
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Seller --}}
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

                    <div class="d-flex flex-row-reverse gap-3">
                        <button type="submit" class="btn btn-primary">Apply</button>
                        <a href="{{ route('designs.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
