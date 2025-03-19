<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/vue.global.js') }}"></script>
</head>
<body>
    <div id="app">
        <home></home>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>