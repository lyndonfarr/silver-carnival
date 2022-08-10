<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="pos-f-t">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container d-flex">
                    <button
                        class="navbar-toggler ml-auto"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarToggleExternalContent"
                        aria-controls="navbarToggleExternalContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4">
                    <div class="container">
                        <h4 class="text-white">Collapsed content</h4>
                        <span class="text-muted">Toggleable via the navbar brand.</span>
                    </div>
                </div>
            </div>
        </div>
        <main class="py-4">
            <div id="root" class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
