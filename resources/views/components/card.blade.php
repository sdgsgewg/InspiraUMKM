<div class="card d-flex flex-column">
    <div class="category position-absolute px-3 py-2">
        <a href="{{ route('designs.index', ['category' => $design->category->slug]) }}"
            class="text-white text-decoration-none">
            {{ $design->category->name }}
        </a>
    </div>

    <div class="img-wrapper">
        @if ($design->image)
            <img src="{{ asset('storage/' . $design->image) }}" alt="{{ $design->category->name }}">
        @else
            <img src="{{ asset('img/' . $design->product->name . '.jpg') }}" alt="{{ $design->category->name }}">
        @endif
    </div>

    <div class="card-body">
        <div>
            <h5 class="card-title">{{ $design->title }}</h5>
            <p>
                <small class="text-body-secondary">
                    By. <a href="{{ route('designs.index', ['seller' => $design->seller->username]) }}"
                        class="text-decoration-none">
                        {{ $design->seller->name }}</a>
                </small>
            </p>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('designs.show', ['design' => $design->slug]) }}" class="btn btn-primary">View
                details</a>

            @if (auth()->check() && auth()->user()->id !== $design->seller->id)
                <form action="{{ route('carts.store', ['design' => $design->slug]) }}" method="POST" class="d-inline">
                    @csrf
                    <button type={{ $design->stock > 0 ? 'submit' : 'button' }}
                        class="btn {{ $design->stock > 0 ? 'btn-primary' : 'btn-secondary' }} d-flex">
                        <i class="bi bi-cart-plus"></i>
                    </button>
                </form>
            @endif

        </div>
    </div>
</div>
