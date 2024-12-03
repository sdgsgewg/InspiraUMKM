@extends('layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/cart/style.css') }}?v={{ time() }}">

    <div class="row justify-content-center mt-5">
        <div class="col-11">
            <p>{{ 'Rp' . number_format($transaction->grand_total_price, 2, ',', '.') }}</p>
            @include('components.checkout.checkout-button', ['navigateTo' => 'Pay Now'])
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script src="{{ asset('js/transaction/checkout.js') }}?v={{ time() }}"></script> --}}

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('{{ $transaction->snap_token }}', {
                // Optional
                onSuccess: function(result) {
                    window.location.href = '{{ route('payments.payment-success', ['transaction' => $transaction->order_number]) }}';
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
@endsection
