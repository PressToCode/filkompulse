<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ URL::asset('images/favicon.png') }}">

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
    <body class="tw-font-sans tw-antialiased">
        <div {{$attributes->merge(['class' => 'tw-min-h-screen tw-bg-gray-900'])}}>
            @includeUnless($navbar=="no", 'layouts.navigation')
            
            <!-- Hero Image -->
            @isset($header)
                {{ $header }}
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <x-footer></x-footer>
    </body>
</html>
