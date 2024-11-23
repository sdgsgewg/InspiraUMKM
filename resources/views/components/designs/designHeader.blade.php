<link rel="stylesheet" href="{{ asset('css/designs/style.css') }}?v={{ time() }}">

{{-- Display Product Big Image --}}
{{-- <div class="row justify-content-center my-5">
    <div class="col-11">
        <div class="img-wrapper rounded-4 overflow-hidden" style="width: auto; height:450px;">
            <img src="{{ asset('img/design.jpg') }}" alt="">
        </div>
    </div>
</div> --}}

<div class="row justify-content-center my-5">
    <div class="col-11 col-md-6 d-flex flex-column ">
        <h1 class="text-center mb-5">{{ $title }}</h1>
        <div class="d-flex flex-row gap-3">
            <div class="col-11">
                @include('components.search', ['id' => 2])
            </div>
            <div class="col-1">
                @include('components.filter')
            </div>
        </div>
    </div>
</div>
