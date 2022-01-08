<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

            .black-text {
                color: #494949;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .form-order {
                align-items: center;
                padding:25px;
                justify-content: center;
            }

            .mb-25 {
                margin-bottom: 25px;
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

            .content-left {
                text-align: left;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #ffffff;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            #app-header {
                background-color: #c55d02;
                padding: 10px 20px;
                font-weight: bold;
                position: -webkit-sticky; /* Safari */
                position: sticky;
                top: 0;
                z-index: 100;
            }

            #app-header a {
                color: #ffffff;
                font-size: 24px;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                margin-right: 10px;
            }

            .flex-h {
                display: flex;
                justify-content: space-between;
            }

            .light-card {
                background-color: #422002;
                margin-bottom: 20px;
            }

            .text-grey {
                color: #fcf8f0;
                --bs-table-striped-color: #fff4f4;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .br-25 {
                border-radius: 25px;
            }

            .pdh-30 {
                padding-left: 30px;
                padding-right: 30px;
            }

        </style>
		<title> @yield('title') </title>
		@yield('css')
  </head>
  <body>
    <body>
        <div id="app-container">
                    <div id="app-header">
                    <!-- left-aligned header icon -->
                    <h2 class="margin-0 container-xl"><a href="{{ route('frontpage') }}"><i class="fas fa-arrow-left"></i></a>
						@yield('title')
					</h2>
                    <!-- right-aligned header icon -->
                    </div>
        
        @yield('content')
        </div>
    </body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
	@yield('js')
  </body>
</html>