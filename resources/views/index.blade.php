<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        @section('css')
            <link rel="stylesheet" href="{{ mix('css/app.css') }}">
            <link rel="stylesheet" href="{{ mix('css/base.css?' . time()) }}">
        @show
    </head>
    <body>
        <div class="flex-center position-ref full-height main-color">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Portfolio
                </div>
                <div class="sub-title m-b-md">
                    Kan
                </div>

                <div class="links">
                    <a href="">Skill</a>
                    <a href="">History</a>
                    <a href="">Products</a>
                    <a href="">Blog</a>
                </div>
            </div>
        </div>
    </body>
</html>
