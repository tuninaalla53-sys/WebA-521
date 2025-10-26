<html>
    <head>
        <title>@yield('title', env('APP_NAME'))</title>
    </head>
    <body>
        <h1>@yield('header')</h1>

        @yield('content')
    </body>
</html>