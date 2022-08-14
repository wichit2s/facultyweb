<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body>

        @include("components/usernavbar")

        @include("components/numbers")

        @include("components/carousel")

        <div class="grid bg-slate-100 h-screen content-center text-center">
            Contents for members only!!!
        </div>

    </body>
</html>
