<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Task Management</title>
    <meta name="description" content="Simple Task Management: Organize your tasks and boost productivity effortlessly.">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>
<body>
    <div class="container">
        <h1>Simple Task Management</h1>
        <p class="subtitle">Organize your tasks and boost productivity effortlessly.</p>
        <a href="{{ route('tasks.index') }}" class="button" aria-label="Get started with task management">Get Started →</a>
        <a href="{{ route('tasks.index') }}" class="login" aria-label="Login to your account">Login</a>
    </div>
</body>
</html>
