@extends('layouts.screen')

@section('title')
    QR Code Mitra
@endsection

@section('link')
    <a href="{{ route('customer.dashboard') }}"><i class="fas fa-arrow-left"></i></a> 
@endsection

@section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">    
                <div>
                    <img src="https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl={{ $id }}&choe=UTF-8">
                </div><br>
                <div class="tengah">{{ $id }}</div>
            </div>
        </div>
@endsection

@section('js')   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@endsection