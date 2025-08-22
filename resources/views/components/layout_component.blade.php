<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset("assets/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <title>{{ $title }}</title>
</head>

<body class="bg-light">
    <x-home.nav />

    {{ $content }}
</body>

<script src={{ asset('assets/bootstrap.bundle.min.js') }}></script>

</html>