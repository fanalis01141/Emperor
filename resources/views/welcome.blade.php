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
                margin-top:100px;
            }

            .links > a {
                color: #fedc3d;
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
    <body class="mon bg">
{{-- 
        <div class="bg">
        </div> --}}

        <div class="flex-center position-ref mt-3">
            @if (Route::has('login'))
                <div class="top-right links ">
                    @auth
                        <a href="{{ url('/home') }}" class="butter">Home</a>
                    @else
                       
                    
                    <a href="{{ route('login') }}"  class="butter">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"  class="butter">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            

            <div class="content bg">

                
                <div class="title m-b-md butter">
                    Emperor Pension House
                </div>

                <div>

                    {{-- <img src="{{asset('bg.jpg')}}" alt="" srcset="" style="z-index:5000"> --}}
                     <img src="{{asset('img/love12.svg')}}" alt="">
                     <img src="{{asset('img/love13.svg')}}" alt=""> --}}
                </div>

            </div>
        </div>
    </body>
</html>
