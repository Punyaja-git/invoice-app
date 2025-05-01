<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel App</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Basic CSS -->
    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background-color: #f8f9fa;
        }

        .topbar {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h2 {
            margin: 0;
            font-size: 1.2rem;
        }

        .topbar .buttons a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            padding: 6px 12px;
            border: 1px solid white;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        .topbar .buttons a:hover {
            background-color: white;
            color: #343a40;
        }

        .container {
            text-align: center;
            padding: 60px 20px;
        }

        h1 {
            font-size: 2.5rem;
            color: #333;
        }

        p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 30px;
        }

        a.button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        a.button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="topbar">
        <h2>Laravel App</h2>
        <div class="buttons">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <div class="container">
        <h1>Welcome to Laravel Invoice-App</h1>
        <p>Your Laravel application is set up successfully.</p>
        <a href="{{ url('/dashboard') }}" class="button">Go to Dashboard</a>
    </div>

</body>
</html>
