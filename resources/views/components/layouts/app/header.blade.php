<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        @include('partials.header')

        {{ $slot }}

        @include('partials.footer')

        @fluxScripts
    </body>
</html>
