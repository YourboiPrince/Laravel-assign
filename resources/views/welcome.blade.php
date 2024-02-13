<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/app.css"> <!-- Assuming this includes your CSS file -->

    <title>Laravel</title>
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #60a5fa;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
        }

        nav a {
            margin-left: 1rem;
            color: white;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 2rem;
        }

        section {
            width: 100%;
            padding: 1rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        section h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        section button {
            padding: 0.5rem 1rem;
            font-weight: bold;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        section .text-black {
            color: black;
        }

        section .text-purple-500 {
            color: #805ad5;
        }

        section .bg-blue-500 {
            background-color: #3b82f6;
        }

        section .hover\:bg-blue-600:hover {
            background-color: #2563eb;
        }

        section .bg-purple-500 {
            background-color: #a78bfa;
        }

        section .hover\:bg-purple-600:hover {
            background-color: #8b5cf6;
        }
    </style>
</head>
<body>

    <header>
        <div>
            <span class="text-xl font-semibold">Laravel</span>
        </div>
        <nav>
            <a href="#" class="text-white">Destinations</a>
            <a href="{{ route('blogs.index') }}" class="text-white">Blog</a>
            <a href="#" class="text-white">About</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-white">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-white">Login</a>
                @endauth
            @endif
        </nav>
    </header>

    <main>
        <section>
            <div class="text-center">
                <h1>
                    <span class="text-black">What is</span>
                    <span class="text-purple-500"> your next destination ?</span>
                </h1>
                <div class="flex justify-center space-x-4">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Search
                    </button>
                    <button class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded">
                        Register
                    </button>
                </div>
            </div>
        </section>
    </main>

</body>
</html>
