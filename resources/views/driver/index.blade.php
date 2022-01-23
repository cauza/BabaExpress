<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #F5821F;
                color: #ffffff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 36px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links-button > a {
                background-color:#F5821F;
                color: rgb(255, 255, 255);
                border: 2px solid #ffffff;
                padding: 10px 40px;
                font-size: 13px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                border-radius: 25px;
                margin-top: 10px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .avatar img{
                border-radius: 50%; 
                width: 150px;        
            }
        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
            @if (auth()->guard('driver')->check())
				<a href="{{ route('driver.logout') }}">Logout</a>
			@else
				<a href="{{ route('driver.login') }}">Login</a>
			@endif
				<a href="{{ route('driver.dashboard') }}">My Account</a>
            </div>

            <div class="content">
                <div class="avatar">
                    <img src="{{ asset('images/'.$data->foto.'') }}" alt="">
                </div>
                <div class="title m-b-md">
                    Hi, {{ $data->name }}
                </div>

                <div class="links-button">
                    {{-- <a href=" {{ route('driver.order') }}">Daftar Order</a> <br> --}}
                    <a href="{{ route('driver.pickup') }}">Jemput Barang</a> <br>
                    <a href="{{ route('driver.send') }}">Antar Barang</a> <br>
                    <a href="{{ route('driver.history') }}">History</a>
                </div>
            </div>
        </div>
    </body>
</html>
