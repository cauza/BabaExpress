@extends('layouts.admin')

@section('title')
    <title>Edit Ongkir</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Edit Ongkir</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Ongkir</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('ongkir.update', $ongkir->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" name="kecamatan" value="{{ $ongkir->kecamatan }}" class="form-control" required>
                                    <p class="text-danger">{{ $errors->first('kecamatan') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="ongkir">Ongkir</label>
                                    <input type="text" name="ongkir" value="{{ $ongkir->ongkir }}" class="form-control" required>
                                    <p class="text-danger">{{ $errors->first('ongkir') }}</p>
                                </div>
                                <div class="form-group">
                                    <a class="btn btn-danger btn-sm" href="{{ route('ongkir.index') }}"><i class="fa fa-btn fa-times"></i> Cancel</a>
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-btn fa-save"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection