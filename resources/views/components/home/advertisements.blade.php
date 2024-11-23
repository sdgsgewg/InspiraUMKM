<div class="row justify-content-center my-5">
    <div class="col-11 position-relative">
        @php
            $advertisements = 3;
        @endphp
        <div id="carouselExampleIndicators" class="carousel slide" data-ads-amount="{{ $advertisements }}">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                @for ($i = 0; $i < $advertisements; $i++)
                    <div class="carousel-item @if ($i === 0) active @endif">
                        <div class="img-wrapper rounded-4 overflow-hidden" style="width: auto; height:350px;">
                            <img src="{{ asset('img/Accessories.jpg') }}" class="d-block w-100 rounded-4"
                                alt="">
                        </div>
                    </div>
                @endfor
            </div>

            @if ($advertisements > 1)
                <button class="carousel-control-prev border border-black" type="button"
                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next border border-black" type="button"
                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif

        </div>
    </div>
</div>
