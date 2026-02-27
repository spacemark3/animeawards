<div class="bg-gray-50 min-h-screen p-8 font-sans">
    <div class="max-w-7xl mx-auto flex justify-between items-center mb-8 pb-6 border-b border-gray-200">
        <div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tight">
                ANIMEDEX <span class="text-blue-600">v.12</span>
            </h1>
            <p class="text-gray-500 text-sm">Backend Status: <span class="text-green-600 font-mono">LIVE_FEED {{ now()->format('H:i:s') }}</span></p>
        </div>

        <button
            wire:click="loadAnimes"
            wire:loading.attr="disabled"
            class="flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-bold transition-all disabled:bg-gray-400"
        >
            <svg wire:loading class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
            <span>{{ $this->animes->count() > 0 ? 'SHUFFLE COLLECTION' : 'LOAD DATA' }}</span>
        </button>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($animes as $anime)
            <div wire:key="anime-{{ $anime->id }}" class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                
                <div class="aspect-[3/4] bg-gray-200 relative">
                    @if($anime->image_url)
                        <img src="{{ $anime->image_url }}" class="w-full h-full object-cover">
                    @else
                        <div class="flex items-center justify-center h-full text-gray-400 italic">No Image</div>
                    @endif
                    
                    <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-sm text-white px-2 py-1 rounded text-xs font-bold">
                        ★ {{ $anime->score }}
                    </div>
                </div>

                <div class="p-4">
                    <h2 class="font-bold text-gray-900 truncate mb-1" title="{{ $anime->title }}">
                        {{ $anime->title }}
                    </h2>
                    <div class="flex justify-between items-center text-xs text-gray-500 font-medium uppercase tracking-wider">
                        <span>{{ $anime->episodes ?? '?' }} Episodes</span>
                        <span class="text-blue-600">ID: #{{ $anime->id }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>