<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="tw-font-sans tw-text-gray-900 tw-antialiased">
    <!-- min-h-screen d-flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900 border border-3 -->
        <div class="vh-100 d-flex py-md-5 dark:tw-bg-gray-900">

            <!-- w-full sm:max-w-md mt-6 px-6 py-4 bg-dark dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg -->
            <div class="container-fluid d-flex flex-row h-auto bg-dark rounded-5 px-0 mx-0 mx-md-5">
                @if (isset($splash))
                    @if ($splash->hasActualContent())
                        {{ $splash }}
                    @endif
                @endif
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
