@foreach ($checkoutItems as $sellerId => $sellerGroup)
    <div class="seller-section">
        @foreach ($sellerGroup['items'] as $design)
            @foreach ($design->product->options as $option)
                <div class="mb-2">
                    <label for="option_value{{ $option->id }}"
                        class="form-label">{{ $design->product->name . ' ' . $option->name . ' (' . $design->title . ') :' }}</label>

                    <select
                        class="form-select @error('option_value_id.' . $design->id . '.' . $option->id) is-invalid @enderror"
                        name="option_value_id[{{ $design->id }}][{{ $option->id }}]"
                        id="option_value{{ $option->id }}" required>
                        <option value="">Select a value</option>
                        @foreach ($design->product->name === 'Packaging' ? $option->values : $design->category->optionValues as $value)
                            <option value="{{ $value->id }}"
                                {{ old('option_value_id.' . $design->id . '.' . $option->id) == $value->id ? 'selected' : '' }}>
                                {{ $value->value }}
                            </option>
                        @endforeach
                    </select>
                    @error('option_value_id.' . $design->id . '.' . $option->id)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach
        @endforeach
    </div>
@endforeach
