@extends('layouts.main')

@section('css')
    <style>
        .tick {
            top: 0%;
            left: 50%;
            width: 140px;
            height: 140px;
            transform: translate(-50%, -50%);
        }
    </style>
@endsection

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-11 col-sm-8 col-lg-6 col-xl-5 mt-5">
            <div class="card position-relative col-12">
                {{-- Icon Centang --}}
                <div class="tick position-absolute rounded-circle overflow-hidden">
                    <img src="{{ asset('img/tick-2.png') }}" alt="">
                </div>
                <div class="card-body d-flex flex-column">
                    {{-- Informasi penting transaksi --}}
                    <div class="d-flex flex-column justify-content-center align-items-center pt-3 mt-5">
                        <h1>
                            Rp{{ number_format($transaction->grand_total_price, '0', '', '.') }}
                        </h1>
                        <p class="text-success fs-4 mt-2 mb-0">@lang('checkout.payment_success')</p>
                        <p class="text-secondary mt-1">@lang('checkout.thanks_msg')</p>
                    </div>

                    {{-- Ringkasan Transaksi --}}
                    <div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="m-0">@lang('checkout.to')</p>
                            <p class="fw-bold m-0">{{ $transaction->seller->name }}</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="m-0">@lang('checkout.payment_method_success')</p>
                            <p class="fw-bold m-0">{{ $transaction->payment->paymentMethod->name }}</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="m-0">@lang('checkout.total_payment')</p>
                            <p class="fw-bold m-0">Rp{{ number_format($transaction->grand_total_price, 0, '', '.') }}</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="m-0">@lang('checkout.transaction_number')</p>
                            <p class="fw-bold m-0">{{ $transaction->order_number }}</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="m-0">@lang('checkout.payment_time')</p>
                            <p class="fw-bold m-0">{{ $transaction->payment->payment_time }}</p>
                        </div>
                        <hr>
                    </div>

                    {{-- Navigation Button --}}
                    <div class="d-flex justify-content-center gap-3 mt-5">
                        <a href="{{ route('home') }}" class="btn btn-primary">@lang('checkout.to_home_page')</a>

                        @php
                            session()->flash('success', 'Order has been created');
                        @endphp

                        <a href="{{ route('transactions.index') }}" class="btn btn-success">@lang('checkout.to_order_page')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
