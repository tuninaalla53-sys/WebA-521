
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                    <span class="text-gray-700">Welcome, {{ auth()->user()->name }}</span>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="text-blue-600 hover:text-blue-800">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="border-4 border-dashed border-gray-200 rounded-lg h-96 p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Dashboard</h1>
                <p class="text-lg text-gray-600 mb-4">You are successfully logged in!</p>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-4">User Information</h2>
                    <div class="space-y-2">
                        <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                        <p><strong>Registered:</strong> {{ auth()->user()->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                    <h2 class="text-xl font-semibold mb-4">API Tokens</h2>
                    <p class="text-gray-600">Use API tokens to authenticate your API requests.</p>
                    <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Manage API Tokens
                    </button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>