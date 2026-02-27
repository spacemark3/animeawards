<!DOCTYPE html>
<html>
<head>
    <title>Anime</title>
</head>
<body style="background: #141414; color: white; font-family: Arial;">

<h1>Animedex</h1>

<div style="display: flex; flex-wrap: wrap; gap: 20px;">
    @foreach($animes as $anime)
        <div style="width: 200px;">
            <img src="{{ $anime->image_url }}" 
                alt="{{ $anime->title }}" 
                style="width: 100%; border-radius: 8px;">

            <h3>{{ $anime->title }}</h3>
            <p>⭐ {{ $anime->score }}</p>
            <p>{{ $anime->episodes }} Episodes</p>
        </div>
    @endforeach
</div>

</body>
</html>
