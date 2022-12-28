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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- <a class="navbar-brand" href="#">Silver Carnival</a> -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a
                                class="nav-link {{ Route::is(['contacts.create', 'contacts.edit', 'contacts.index', 'contacts.show', 'contact-extras.edit']) ? 'active' : '' }}"
                                href="{{ route('contacts.index') }}"
                            >
                                Contacts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link {{ Route::is(['events.create', 'events.edit', 'events.index', 'events.show']) ? 'active' : '' }}"
                                href="{{ route('events.index') }}"
                            >
                                Events
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div id="root" class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
