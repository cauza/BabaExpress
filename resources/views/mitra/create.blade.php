@extends('layouts.screen')

@section('title')
    Form Order Kiriman
@endsection

@section('link')
    <a href="{{ route('customer.dashboard') }}"><i class="fas fa-arrow-left"></i></a> 
@endsection

@section('content')
<div class="form-order position-ref">
            <div class="content-left container-xl">
                
                <form class="mb-25" action="{{ route('order.store') }}" method="post">
                @csrf
                <h3>Pengirim :</h3>
                <hr>
                <div class="form-group">
                    <label for="nama_pengirim">Nama Pengirim</label>
                    <input type="text" name="nama_pengirim" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('nama_pengirim') }}</p>
                </div>
                <div class="form-group">
                    <label for="alamat_pengirim">Alamat Penjemputan</label>
                    <input type="text" name="alamat_pengirim" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('alamat_pengirim') }}</p>
                </div>
                <div class="form-group">
                    <label for="kontak_pengirim">Kontak Pengirim</label>
                    <input type="text" name="kontak_pengirim" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('kontak_pengirim') }}</p>
                </div>
                <h3>Penerima :</h3>
                <hr>
                <div class="form-group">
                    <label for="nama_penerima">Nama Penerima</label>
                    <input type="text" name="nama_penerima" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('nama_penerima') }}</p>
                </div>
                <div class="form-group">
                    <label for="alamat_penerima">Alamat Pengantaran</label>
                    <input type="text" name="alamat_penerima" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('alamat_penerima') }}</p>
                </div>
                <div class="form-group">
                    <label for="kontak_penerima">Kontak Penerima</label>
                    <input type="text" name="kontak_penerima" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('kontak_penerima') }}</p>
                </div>
                <h3>Detail Barang :</h3>
                <hr>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('nama_barang') }}</p>
                </div>
                <div class="form-group">
                    <label for="berat">Berat Barang</label>
                    <input type="text" name="berat" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('berat') }}</p>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Barang</label>
                    <input type="text" name="harga" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('harga') }}</p>
                </div>
                <div class="form-group">
                    <label for="volume">Volume</label>
                    <input type="text" name="volume" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('volume') }}</p>
                </div>
                <div class="form-group">
                    <label for="ongkir">Ongkos Kirim</label>
                    <input type="text" name="ongkir" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('ongkir') }}</p>
                </div>
                <div class="form-group">
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-outline-light br-25 pdh-30"><i class="fa fa-plus" ></i> Tambah</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
@endsection