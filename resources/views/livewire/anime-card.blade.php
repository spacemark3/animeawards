<div class="anime-card">
    @if($anime->image_url)
        <img src="{{ $anime->image_url }}" alt="{{ $anime->title }}">
    @endif
    <div class="anime-info">
        <h3>{{ $anime->title }}</h3>
        <p>Score: {{ $anime->score }}</p>
    </div>
</div>