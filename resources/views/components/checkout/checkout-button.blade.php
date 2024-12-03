<div class="d-flex flex-row align-items-center justify-content-center gap-3">
    <button type="button" class="btn btn-light d-inline-flex rounded-pill border border-black shadow">
        <i class="bi bi-whatsapp me-2" style="color: #25D366;"></i>WhatsApp
    </button>
    <button type="submit" class="btn btn-success text-transform-uppercase"
        id="{{ $navigateTo === 'Pay Now' ? 'pay-button' : '' }}">{{ $navigateTo }}</button>
</div>
