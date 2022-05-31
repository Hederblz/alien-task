<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- Styles --}}
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/@yield('style').css">

    {{-- Apis --}}
    <script type="module"
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    {{-- Fonts --}}

    {{-- ESPERAR DECISÃO DA EQUIPE --}}

    {{-- Scripts --}}
    <script src="/js/@yiled('script').js"></script>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
