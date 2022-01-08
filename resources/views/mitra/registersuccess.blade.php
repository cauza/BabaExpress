<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BabaXpress</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">

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
                margin: 35px;
                font-size: 80px;
                font-family: 'Shadows Into Light', cursive;
                font-weight: 400;
                line-height: 0.9;
                text-shadow: 2px 2px #363636;
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

            .header-logo {
                background-color: #ffffff;
                border-radius: 0 0 900px 900px;
                min-height: 30%;
                align-items: center;
                display: flex;
                justify-content: center;
                box-shadow: 5px 10px #888888;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Selamat
                </div>
                <div>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                </div>
                <div class="links-button">
                    <a href="{{ route('customer.dashboard') }}">Kembali</a>
                </div>
            </div>
        </div>
    </body>
</html>
