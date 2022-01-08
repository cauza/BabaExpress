@extends('layouts.screen')

@section('title')
    Detail Pesanan
@endsection

@section('content')
<div class="form-order position-ref">
    <div class="content-left container-xl">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

					<div class="login_form_inner">
						<h3>No. Resi : {{ $orders->resi }}</h3>
                        <h4>Pengirim :</h4>
                        <table class="table table-striped text-grey">
                            <tr><td>Nama</td><td>:</td><td>{{ $orders->nama_pengirim }}</td></tr>
                            <tr><td>Alamat</td><td>:</td><td>{{ $orders->alamat_pengirim }}</td></tr>
                            <tr><td>Kontak</td><td>:</td><td>{{ $orders->kontak_pengirim }}</td></tr>
                        </table>
                        <h4>Penerima :</h4>
                        <table class="table table-striped text-grey">
                            <tr><td>Nama</td><td>:</td><td>{{ $orders->nama_penerima }}</td></tr>
                            <tr><td>Alamat</td><td>:</td><td>{{ $orders->alamat_penerima }}</td></tr>
                            <tr><td>Kontak</td><td>:</td><td>{{ $orders->kontak_penerima }}</td></tr>
                        </table>
                        <h4>Detail Barang :</h4>
                        <table class="table table-striped text-grey">
                            <tr><td>Nama Barang</td><td>:</td><td>{{ $orders->nama_barang }}</td></tr>
                            <tr><td>Berat</td><td>:</td><td>{{ $orders->berat }}</td></tr>
                            <tr><td>Volume</td><td>:</td><td>{{ $orders->volume }}</td></tr>
                            <tr><td>Harga</td><td>:</td><td>{{ $orders->harga }}</td></tr>
                            <tr><td>Ongkir</td><td>:</td><td>{{ $orders->ongkir }}</td></tr>
                        </table>
					</div>
    </div>
</div>
@endsection


