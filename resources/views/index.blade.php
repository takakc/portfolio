<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="大阪在住WEBプログラマーのポートフォリオです。">

        <title>ポートフォリオ | kankan</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        @section('css')
            <link rel="stylesheet" href="{{ mix('css/app.css') }}">
            <link rel="stylesheet" href="{{ mix('css/base.css') }}">
            <link rel="stylesheet" href="{{ mix('css/loading.css') }}">
            <link rel="stylesheet" href="{{ mix('css/modal.css') }}">
        @show
    </head>
    <body>
        <div id="app">
            <top-component></top-component>
        </div>
        <script src=" {{ mix('js/app.js') }} "></script>
    </body>
</html>
