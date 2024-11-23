<div class="card my-3 d-flex flex-row">

    <div class="col-4">
        <div class="img-wrapper col-md-4">
            @if ($design->image)
                <img src="{{ asset('storage/' . $design->image) }}" class="rounded-start" alt="...">
            @else
                <img src="{{ asset('img/' . $design->product->name) . '.jpg' }}" class="rounded-start" alt="...">
            @endif
        </div>
    </div>

    <div class="col-8">
        <div class="card-body d-flex flex-row justify-content-between h-100">
            <div class="d-flex flex-column justify-content-between">
                <div class="design-title">
                    <h5>{{ $design->title }}</h5>
                </div>
                <div class="design-price">
                    <p class="mb-0">Rp{{ number_format($design->price, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-end">
                <p class="qty d-flex flex-column justify-content-center m-0" data-design-id="{{ $design->id }}"
                    data-qty="{{ $design->pivot->quantity }}">
                    x{{ $design->pivot->quantity }}
                </p>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal-{{ $design->id }}" tabindex="-1"
        aria-labelledby="deleteModalLabel-{{ $design->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel-{{ $design->id }}">
                        Confirm Deletion
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove design "{{ $design->title }}" from the
                    cart?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('carts.destroy', ['cart' => $cart->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="design_id" value="{{ $design->id }}">
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="maxQtyModal-{{ $design->id }}" tabindex="-1"
        aria-labelledby="maxQtyModalLabel-{{ $design->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="maxQtyModalLabel-{{ $design->id }}">
                        Quantity Limit Reached
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You have reached the maximum allowed quantity for "{{ $design->title }}"
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

</div>
