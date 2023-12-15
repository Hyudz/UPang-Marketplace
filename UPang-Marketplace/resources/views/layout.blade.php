<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>@yield('Title Custom Authentication')</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

            <style>
                body {
                    background-image: url('{{ asset("img/cover.jpg") }}');
                    background-repeat: no-repeat;
                    background-size: cover;
                    font-family: 'Open Sans', sans-serif;
                }
            </style>
        </head>

        <body>
        @include('header')    
        @yield('content')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
        </body>
    </html>