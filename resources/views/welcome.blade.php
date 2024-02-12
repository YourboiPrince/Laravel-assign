<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Styles -->
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
            <a href="Blog.php" class="text-white">Blog</a>
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
            <h1 class="text-3xl font-semibold mb-6">Main Content</h1>
            <p>This is the main content area of your application. You can add your content here.</p>
        </section>
    </main>
</body>
</html>
