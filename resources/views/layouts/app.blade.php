<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
</head>
<body>
    <header>
        <h1>Welcome to the Admin Dashboard</h1>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>&copy; 2024 Your Company</p>
    </footer>
</body>
</html>
