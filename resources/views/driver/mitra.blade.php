@extends('layouts.screen')

@section('title')
    Cek Mitra
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
                <form class="mb-25" action="{{ route('driver.cekmitra') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="mitra_id"><a href="{{ route('driver.scan') }}"><i class="fa fa-camera" ></i></a>  ID Mitra</label>
                    <input type="text" name="mitra_id" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('mitra_id') }}</p>
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
