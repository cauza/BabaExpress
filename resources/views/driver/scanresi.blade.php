@extends('layouts.screen')

@section('title')
    Order Kiriman
@endsection

@section('link')
    <a href="{{ route('driver.dashboard') }}"><i class="fas fa-arrow-left"></i></a> 
@endsection

@section('content')
    <div class="form-order content-left container-xl">
    <div id="qr-reader"></div>
    <div id="qr-reader-results"></div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/html5-qrcode.min.js') }}"></script>
<script>
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(decodedText, decodedResult) {
            window.location.href = '/driver/detailresi/'+decodedText;
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    });
</script>
@endsection
