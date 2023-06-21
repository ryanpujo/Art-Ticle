<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite('resources/js/app.ts')
        @routes
        @vite('resources/css/app.css')
        @inertiaHead
    </head>
    <body class="bg-gray-300">
        @inertia
        
    </body>
</html>
