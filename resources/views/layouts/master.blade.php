<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{url('/favicon.ico')}}" type="image/x-icon">
    @vite([
    'resources/sass/app.scss',
    'resources/css/app.css',
    'resources/js/app.js'
    ])
    <title>@yield('title')</title>
</head>

<body class="w-100 bg-offwhite">

<div class="container-fluid">
    <main>
        @include('components.errors')
        @yield('content')
    </main>
</div>
{{--@include('layouts.components.footer')--}}
@vite(['resources/js/app.js'])
@stack('js')
</body>

</html>
