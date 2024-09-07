<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="app-url" content="{{ config('app.url') }}">
<!-- In your Blade layout or view file -->
<title>@yield('title', config('app.name', 'Internship Records Monitoring System'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @include('layouts.style')
    </head>
    <body data-sidebar="dark">
        <div id="layout-wrapper">
            @include('layouts.head')
            @include('layouts.sidebar')
            <!-- Page Content -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                            <main>
                                {{ $slot }}
                            </main>
                    </div>
                </div>
            </div>


        </div>
        @include('layouts.script')
    </body>
</html>
