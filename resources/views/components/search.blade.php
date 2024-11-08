<div>
    <form action="/designs" method="get">
        @if (request('product'))
            <input type="hidden" name="product" value="{{ request('product') }}">
        @endif
        @if (request('category'))
            <input type="hidden" name="category"
                value="{{ is_array(request('category')) ? implode(',', request('category')) : request('category') }}">
        @endif
        @if (request('seller'))
            <input type="hidden" name="seller" value="{{ request('seller') }}">
        @endif
        <div class="position-relative input-group">
            <div class="col-12">
                <input type="text" class="form-control rounded-pill ps-4" placeholder="Search..." name="search"
                    value="{{ request('search') }}" autocomplete="off" style="padding-right: 80px;">
            </div>
            <div class="position-absolute search-btn" style="right: 0; top: 0;">
                <button class="btn btn-outline-success rounded-pill px-4" type="submit" style="padding: 5px 0;">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
