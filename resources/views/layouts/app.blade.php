<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anime Reel</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body>
    @yield('content')

    @livewireScripts
    @vite('resources/js/app.js')
</body>
</html>