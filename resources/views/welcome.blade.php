<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Emperor Pension House</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">


        <!-- Styles -->
        <style>


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
                font-size: 150px;
                text-shadow: #171717 5px 5px;
                color: #295f2d;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head> 
    <body class="mon bg-yellow">
        <div class="flex-center position-ref full-height mt-3">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" style="color:#295f2d">Home</a>
                    @else
                        <a href="{{ route('login') }}" style="color:#295f2d">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="color:#295f2d">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            

            <div class="content">
                <div class="title m-b-md satisfy" style="color:#295f2d">
                    Emperor Pension House
                    <img src="{{asset('img/love12.svg')}}" alt="">
                </div>
            </div>
        </div>
    </body>
</html>
