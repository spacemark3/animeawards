<div class="max-w-md mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-4 text-center">Create Anime</h2>

    {{-- Messaggi di successo --}}
    @if (session()->has('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    {{-- Messaggi di errore generali --}}
    @if (session()->has('error'))
    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        {{-- Titolo --}}
        <div>
            <label class="block text-sm font-medium mb-1">Title</label>
            <input
                type="text"
                wire:model="title"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter anime title">
            @error('title')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Sinossi --}}
        <div>
            <label class="block text-sm font-medium mb-1">Synopsis</label>
            <textarea
                wire:model="synopsis"
                rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter anime synopsis"></textarea>
            @error('synopsis')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Bottone submit --}}
        <div class="text-center">
            <button
                type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition-colors">
                Save Anime
            </button>
        </div>
    </form>
</div>