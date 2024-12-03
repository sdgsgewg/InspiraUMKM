@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-11 d-flex justify-content-center">
            <div class="card">
                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                    <h1>Pembayaran Berhasil</h1>
                    <p class="text-success">Terima kasih telah melakukan pembayaran</p>
                    <div class="d-flex justify-content-center gap-3 mt-3">
                        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke halaman utama</a>

                        @php
                            session()->flash('success', 'Order has been created');
                        @endphp

                        <a href="{{ route('transactions.index') }}" class="btn btn-success">Lihat Pesanan Saya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
