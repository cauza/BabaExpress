@extends('layouts.screen')

@section('title')
    Cek Resi
@endsection

@section('link')
    <a href="{{ route('driver.pickup') }}"><i class="fas fa-arrow-left"></i></a> 
@endsection

@section('content')
<div class="form-order position-ref">
            <div class="content-left container-xl">
                @if (session('success'))
                    <div class="alert alert-danger">{{ session('success') }}</div>
                @endif
                <form class="mb-25" action="{{ route('driver.sendstore') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="resi"><a href="{{ route('driver.scanresi') }}"><i class="fa fa-camera" ></i></a>  Masukkan Kode Resi</label>
                    <input type="text" name="resi" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('resi') }}</p>
                </div>
                <div class="form-group">
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-outline-light br-25 pdh-30"><i class="fa fa-check" ></i> Cek</button>
                    </div>
                </div>
            </form>
            <hr>
            </div>
        </div>
@endsection
