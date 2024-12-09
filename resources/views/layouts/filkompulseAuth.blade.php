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
        @vite(
            ['resources/css/bootstrap.css', 
            'resources/js/app.js',
            'resources/css/tailwind.css',
            'resources/js/bootstrap.js'
            ])
    </head>
    <body class="tw-font-sans tw-text-gray-900 tw-bg-gray-900 tw-antialiased tw-overflow-hidden">
        <!-- <div class="tw-absolute tw-z-20 tw-border-[200px] tw-rounded-full tw-border-blue-500 tw-blur-sm moveRight"></div>
        <div class="tw-absolute tw-z-20 tw-border-[200px] tw-rounded-full tw-border-yellow-500 tw-blur-sm tw-right-1/3 tw-top-1/3 moveRight"></div>
        <div class="tw-absolute tw-z-30 tw-border-[200px] tw-rounded-full tw-border-red-500 tw-blur-sm tw-bottom-0 tw-right-0 moveRight"></div> -->
        <div class="tw-h-dvh d-flex py-5 px-5 tw-z-10">
            <div class="tw-grid tw-grid-flow-col tw-grid-cols-2 tw-h-full tw-max-h-full tw-w-full tw-max-w-full tw-rounded-3xl tw-bg-gray-600/10 tw-backdrop-blur-lg tw-z-40 tw-shadow tw-shadow-gray-500/30">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

<!-- <style>
    @keyframes translateMove {
        0% {
            transform: translateX(-100vw);
        }
        100% {
            transform: translateX(100vw);
        }
    }

    .moveRight {
        animation: translateMove 1s linear infinite;
    }

    .moveLeft {
        animation: translateMove 1s linear reverse infinite;
    }
</style> -->