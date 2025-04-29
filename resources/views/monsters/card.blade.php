{{-- Monster Card Component --}}
<a href="{{ route('monsters.show', $monster) }}" class="bg-gray-800 rounded-lg overflow-hidden shadow-lg transform transition hover:scale-105 hover:bg-gray-700 flex flex-col h-full cursor-pointer">
    <div class="w-full aspect-square bg-gradient-to-br 
        @if($monster->category == 'Aquatic') from-blue-600 to-cyan-500 
        @elseif($monster->category == 'Terrestrial') from-red-600 to-orange-500 
        @elseif($monster->category == 'Aerial') from-green-600 to-teal-500 
        @elseif($monster->category == 'Paranormal') from-indigo-600 to-purple-500 
        @else from-gray-600 to-gray-500 
        @endif 
        flex items-center justify-center relative">
        
        @if($monster->image_path)
            <img src="{{ route('monsters.image', $monster) }}" alt="{{ $monster->name }}" class="h-full w-full object-cover">
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-white opacity-80" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
            </svg>
        @endif
    </div>
    <div class="p-4 flex items-center justify-center">
        <h3 class="text-xl font-bold text-white text-center">{{ $monster->name }}</h3>
    </div>
</a>
