<div class="bg-black min-h-screen p-10 font-graffiti relative overflow-hidden">
    
    <div class="flex justify-between items-baseline mb-12 border-b-4 border-yellow-400 pb-2">
        <h1 class="text-7xl text-yellow-400 tracking-widest uppercase rotate-[-2deg]">
            ANIMEDEX<span class="text-white text-4xl ml-2">v.12</span>
        </h1>
        <button wire:click="loadAnimes" class="bg-yellow-400 text-white px-8 py-2 text-2xl hover:bg-white hover:scale-110 transition-all border-4 border-white">
            SHUFFLE
        </button>
    </div>

    <div class="relative h-[70vh] w-full" id="collage-container">
        @foreach($animes as $index => $anime)
            @php
                $top = rand(5, 60);
                $left = rand(5, 80);
                $rotate = rand(-15, 15);
            @endphp

            <div class="absolute cursor-grab active:cursor-grabbing group transition-transform"
                 style="top: {{ $top }}%; left: {{ $left }}%; transform: rotate({{ $rotate }}deg); z-index: {{ $index }};">
                
                <div class="bg-yellow-400 p-1 shadow-[12px_12px_0px_0px_rgba(255,255,255,1)] group-hover:shadow-[12px_12px_0px_0px_rgba(220,38,38,1)] transition-all duration-300">
                    <img src="{{ $anime->image_url }}" class="w-48 h-64 object-cover contrast-125 border-2 border-black">
                    
                    <div class="p-2 bg-white mt-1">
                        <p class="text-lg text-yellow-400 leading-none truncate w-44">
                            {{ $anime->title }}
                        </p>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-xs text-black bg-white px-2 uppercase font-bold">Vol. {{ $anime->episodes ?? '?' }}</span>
                            <p class="text-2xl text-white-400 italic">★{{ $anime->score }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="fixed bottom-0 left-4 flex items-end select-none pointer-events-none opacity-90">
        <span class="text-[15rem] leading-none font-black text-red-600 italic tracking-tighter drop-shadow-[10px_10px_0px_rgba(255,255,255,1)]">R</span>
        
        <div class="flex flex-col mb-10 -ml-4">
            <span class="text-6xl text-white tracking-tighter uppercase">EC ● LIVE_FEED</span>
            <span class="text-3xl text-yellow-400 tracking-[0.5em] animate-pulse">
                {{ now()->format('H:i:s') }}
            </span>
        </div>
    </div>
</div>