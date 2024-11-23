<!-- Check if there are books for this genre -->
@php
    $designsInCategory = $product->designs->filter(function ($design) use ($category) {
        return $design->category == $category;
    });
@endphp

@if ($designsInCategory->count() > 0)
    {{-- Display Category Name --}}
    <div class="d-flex justify-content-between align-items-center my-4">
        @if ($product->name === 'Packaging')
            <h4>{{ $category->name . ' Packaging' }}</h4>
        @elseif ($product->name === 'Stickers')
            <h4>{{ 'Kertas Sticker ' . $category->name }}</h4>
        @else
            <h4>{{ $category->name }}</h4>
        @endif

        @if ($designsInCategory->count() > 6)
            <a href="{{ route('designs.category', ['category' => $category->slug]) }}"
                class="d-flex align-items-center view-all-link btn">
                View All <i class="bi bi-arrow-right-circle ms-2"></i>
            </a>
        @endif
    </div>

    <!-- Carousel for Designs in Each Category -->
    <div id="carouselExample{{ $product->id }}{{ $category->id }}" class="carousel mb-5"
        data-design-amount="{{ $designsInCategory->count() }}">

        <div class="carousel-inner">
            @foreach ($designsInCategory->take(6) as $index => $design)
                <div class="carousel-item @if ($index === 0) active @endif">
                    @include('components.designs.card', ['design' => $design])
                </div>
            @endforeach
        </div>

        @include('components.designs.carousel-control')
    </div>
@endif
