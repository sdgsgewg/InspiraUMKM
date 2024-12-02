<style>
    .nav-item {
        display: flex;
        align-items: center;
    }

    .nav-link {
        flex-grow: 1;
        text-align: center;
    }

    .badge {
        position: absolute;
        right: 10%;
        visibility: hidden;
        opacity: 0;
        min-width: 24px;
        min-height: 24px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 0.9rem;
        margin-left: auto;
        transition: visibility 0s, opacity 0.2s ease-in-out;
    }

    .nav-item:hover .badge {
        visibility: visible;
        opacity: 1;
    }
</style>

<div class="title mb-2">
    <h1>@lang('order.title.' . $title)</h1>
</div>
<div class="position-relative">
    <ul class="nav nav-underline nav-fill d-flex justify-content-between" data-selected-status="{{ $selectedStatus }}">
        @foreach ($allStatus as $s)
            <li class="nav-item position-relative">
                <a class="nav-link me-2" href="#" data-status="{{ $s }}">@lang('order.status.' . $s)</a>
                <span class="badge bg-primary text-white rounded-circle">{{ $numTransactionByStatus[$s] ?? 0 }}</span>
            </li>
        @endforeach
    </ul>
</div>

<hr class="mt-0 mb-3">

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script>
    document.querySelectorAll('.nav-item').forEach(item => {
        const badge = item.querySelector('.badge');
        if (badge && parseInt(badge.textContent) === 0) {
            // Ensure badges with zero transactions remain hidden
            badge.style.visibility = 'hidden';
            badge.style.opacity = '0';
        }
    });
</script>
