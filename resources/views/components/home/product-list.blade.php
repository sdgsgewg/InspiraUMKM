<style>
    .product-card {
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .image-container {
        height: 200px; /* Fixed height for the image container */
        background-color: rgb(214, 215, 181);
    }

    .product-name {
        display: flex;
        justify-content: center;
        align-items: start;
        flex-grow: 1;
        text-align: center;
        font-weight: bold;
    }
</style>

<div class="row justify-content-center mb-5">
    <div class="col-11">
        <div class="row d-flex flex-wrap justify-content-evenly gap-3">
            @foreach ($products as $p)
                <div class="product-card col-5 col-sm-4 col-md-3 col-xl-2 d-flex flex-column rounded-4 p-0"
                    onclick="{{ "window.location.href='" . route('designs.product', ['product' => $p->slug]) . "'" }}">

                    <!-- Image Container -->
                    <div class="image-container d-flex align-items-center justify-content-center rounded-4 p-3 w-100">
                        <div class="overflow-hidden w-100 h-100">
                            @if ($p->image)
                                <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}"
                                    class="w-100 h-100 object-fit-cover">
                            @else
                                <img src="{{ asset('img/product/' . $p->slug . '.png') }}" alt="{{ $p->name }}"
                                    class="w-100 h-100 object-fit-cover">
                            @endif
                        </div>
                    </div>

                    <!-- Product Name -->
                    <div class="product-name mt-1">
                        <p class="fs-4 m-0">{{ $p->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
