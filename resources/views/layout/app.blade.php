<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <title>МастерОк</title>
        <link rel="stylesheet" href="css/app.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    </head>
    <body>
        @include('layout.header')
        <div class="page">
            @yield('body')
        </div>
        <script src="js/app.js"></script>
    </body>
</html>