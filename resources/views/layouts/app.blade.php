<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App')</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS -->
</head>
<body>
    <div id="app">
        <!-- Navigation Bar -->
        <nav class="navbar">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('sentiment') }}">Sentiment Analysis</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>
    </div>
    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script> <!-- Include your JavaScript -->
</body>
</html>
