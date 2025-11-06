
<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold">MyApp</a>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <span>Welcome, {{ auth()->user()->name }}</span>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="text-blue-600 hover:text-blue-800">Logout</button>
                        </form>
                    @else
                        <a href="/login" class="text-blue-600 hover:text-blue-800">Login</a>
                        <a href="/register" class="text-blue-600 hover:text-blue-800">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>