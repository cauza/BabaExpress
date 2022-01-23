@extends('layouts.admin')

@section('title')
    <title>Edit Mitra</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Edit Mitra</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Mitra</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('mitra.update', $customer->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ $customer->name }}" class="form-control" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ $customer->email }}" required>
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Nomor HP</label>
                                    <input type="text" name="phone_number" value="{{ $customer->phone_number }}" class="form-control" required>
                                    <p class="text-danger">{{ $errors->first('phone_number') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" name="address" class="form-control" value="{{ $customer->address }}" required>
                                    <p class="text-danger">{{ $errors->first('address') }}</p>
                                </div>
                                <div class="form-group">
                                    <a class="btn btn-danger btn-sm" href="{{ route('mitra.index') }}"><i class="fa fa-btn fa-times"></i> Cancel</a>
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