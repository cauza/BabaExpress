@extends('layouts.screen')

@section('title')
    Driver Regitration
@endsection

@section('link')
    <a href="{{ route('driver.dashboard') }}"><i class="fas fa-arrow-left"></i></a> 
@endsection

@section('content')
        <div class="form-order position-ref">
            <div class="content container-xl">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form class="mb-25" action="{{ route('driver.create') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="driver_name">Nama</label>
                    <input type="text" name="driver_name" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('driver_name') }}</p>
                </div>
                <div class="form-group">
                    <label for="driver_phone">Kontak</label>
                    <input type="text" name="driver_phone" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('driver_phone') }}</p>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Ulangi Password</label>
                    <input type="password" name="password_confirmation" class="form-control br-25" required>
                    <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                </div>
                <div class="form-group">
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-outline-light br-25 pdh-30"><i class="fa fa-check" ></i> Register</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
@endsection