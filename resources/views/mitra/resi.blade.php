@extends('layouts.screen')

@section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">    
                <div>
                    <img src="https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl={{ $resi }}&choe=UTF-8">
                </div>
                <div class="tengah">{{ $resi }}</div>
            </div>
            <a href="{{ route('frontpage') }}"><i class="fas fa-arrow-left"></i></a> 
        </div>
@endsection

@section('js')   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@endsection


