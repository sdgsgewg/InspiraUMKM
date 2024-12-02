<div class="d-flex flex-column">
    <label for="shippingMethod" class="form-label">Shipping Method:</label>

    <select class="form-select" @error('shipping_method_id') is-invalid @enderror" name="shipping_method_id"
        id="shippingMethod" required>
        <option value="">Select a shipping method</option>
        @foreach ($shippingMethods as $sm)
            <option value="{{ $sm->id }} {{ old('shipping_method_id' == $sm->id) ? 'selected' : '' }}">
                <p>{{ $sm->name }}</p>
                <small>{{ ' (' . $sm->shipping_fee . ')' }}</small>
                <small>{{ ' (' . $sm->description . ')' }}</small>
            </option>
        @endforeach
    </select>
    @error('shipping_method_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
