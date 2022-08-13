<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{asset('build/assets/app.b21c011a.css')}}">
        <script src="{{asset('build/assets/app.d225c007.js')}}"></script>
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $("form").submit(function () {
                    $("[type=submit]").attr("disabled", true);
                    $("[type=submit]").addClass("cursor-not-allowed hover:cursor-not-allowed bg-gray-500 hover:bg-gray-500");
                    return true;
                });
            });
        </script>
    </body>
</html>
