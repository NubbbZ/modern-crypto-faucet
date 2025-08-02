<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ $title ?? config('app.name') }}</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

<!-- Styles / Scripts -->
<style>
    body {
        /* Light mode dotted grid */
        background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
        background-size: 32px 32px;
    }
    .dark body {
        /* Dark mode dotted grid */
        background-image: radial-gradient(#27272a 1px, transparent 1px);
        background-size: 32px 32px;
    }
</style>

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
