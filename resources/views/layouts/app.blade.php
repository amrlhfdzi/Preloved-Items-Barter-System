<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        
        <!-- Scripts -->
        @livewireStyles 
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script src="{{ asset('assets/js/jquery-3.6.3.min.js)}}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js)}}"></script>
        @livewireScripts
    </body>
</html>
