<div class="reel" id="animeReel">
    @foreach($topAnimes as $anime)
        <div class="anime-card" data-score="{{ $anime->score }}">
            <img src="{{ $anime->image_url }}" alt="{{ $anime->title }}" class="anime-image">
            <div class="anime-info">
                <h3>{{ $anime->title }}</h3>
                <p>Score: {{ $anime->score }}</p>
            </div>
        </div>
    @endforeach
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script>
function initParallax() {
    const reel = document.getElementById('animeReel');
    if(!reel) return;
    const cards = document.querySelectorAll('.anime-card');

    reel.addEventListener('scroll', () => {
        cards.forEach(card => {
            const speed = card.dataset.score / 10 || 0.5;
            const rect = card.getBoundingClientRect();
            const offset = (rect.left - window.innerWidth / 2) * -0.1 * speed;

            anime({
                targets: card,
                translateY: offset,
                duration: 400,
                easing: 'easeOutQuad'
            });
        });
    });
}

// Quando Livewire ha caricato tutti i componenti
document.addEventListener('livewire:load', initParallax);

// Quando Livewire aggiorna il DOM (ad esempio con componenti figli)
document.addEventListener('livewire:update', initParallax);
</script>