<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) || '' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Start Scripts -->
        <!-- Vite App CSS | JS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alternative Flowbite -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

        <!-- Head Push Blade -->
        {{ $head ?? '' }}
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            {{-- Check Role --}}
            @if(Auth::check())
                @if (Auth::user()->is_admin == 1)
                {{-- Check Route --}}
                
                    @if (request()->routeIs('dashboard') || request()->routeIs('dashboard.*') || request()->routeIs('admin') || request()->routeIs('admin.*'))
                        @include('layouts.navigation.admin')
                    @else
                        @include('layouts.navigation.guest')
                    @endif
                @elseif(Auth::user()->is_admin == 0)
                    {{-- Check Route --}}
                    @if (request()->routeIs('dashboard') || request()->routeIs('dashboard.*') || request()->routeIs('user') || request()->routeIs('user.*'))
                        @include('layouts.navigation.user')
                    @else
                        @include('layouts.navigation.guest')
                    @endif
                @endif
                
            @else
                @include('layouts.navigation.guest')
            @endif
            
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        {{-- Laravel Sweet Alert --}}
        {{-- @include('sweetalert::alert') --}}
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

        {{-- Customize --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Foot Push Blade -->
        {{ $foot ?? '' }}
    </body>
</html>
