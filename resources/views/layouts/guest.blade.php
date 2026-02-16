<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Animedex</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

<style>
    .font-graffiti { font-family: 'Permanent Marker', cursive; }
    body { user-select: none; background-color: black; }
</style>
</head>
<body class="bg-black antialiased">
    {{ $slot }}

    @livewireScripts
    <script>
    document.addEventListener('mousedown', function(e) {
        let el = e.target.closest('.absolute');
        if (!el) return;

        let coords = el.getBoundingClientRect();
        let shiftX = e.clientX - coords.left;
        let shiftY = e.clientY - coords.top;

        function moveAt(pageX, pageY) {
            el.style.left = (pageX - shiftX) + 'px';
            el.style.top = (pageY - shiftY) + 'px';
        }

        function onMouseMove(e) {
            moveAt(e.pageX, e.pageY);
        }

        document.addEventListener('mousemove', onMouseMove);

        document.onmouseup = function() {
            document.removeEventListener('mousemove', onMouseMove);
            document.onmouseup = null;
        };
    });

    // Prevent default browser drag image behavior
    document.addEventListener('dragstart', (e) => {
        if (e.target.closest('.absolute')) e.preventDefault();
    });
</script>
</body>
</html>