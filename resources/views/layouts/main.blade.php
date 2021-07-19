<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            text-align: center;
            color: #999;
        }

        .dashboard {
            width: 100%;
            height: 100vh;
            display: flex;
        }

        .message {
            margin: auto;
            width: 600px;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="dashboard container">
            <div class="message">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>