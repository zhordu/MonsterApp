<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $monster->name }} - Admin Monsterpedia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900">
    <div class="flex bg-gray-900 min-h-screen">
        <!-- Left-aligned Sidebar -->
        <div class="fixed left-0 top-0 h-full w-72 bg-gradient-to-b from-gray-800 to-gray-900 border-r border-gray-700 shadow-lg flex flex-col">
            <!-- Logo Section -->
            <div class="flex items-center justify-center h-20 border-b border-gray-700">
                <a href="{{ url('/admin/dashboard') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('monster.png') }}" alt="Monster Logo" class="w-10 h-10">
                    <span class="text-xl font-bold text-white">Monster App Admin</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="/admin/dashboard" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl text-white hover:bg-gray-600 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span>Verify Monsters</span>
                </a>

                <a href="/admin/monsterpedia" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl bg-gray-700 text-white hover:bg-gray-600 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 group-hover:text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                    <span>Monsterpedia</span>
                </a>
            </nav>

            <!-- Admin Profile Section -->
            <div class="mt-auto p-4 space-y-3">
                <div class="flex items-center gap-3 px-2">
                    <div class="flex-shrink-0">
                        <div class="h-9 w-9 rounded-full bg-violet-600 flex items-center justify-center">
                            <span class="text-base font-medium text-white">
                                {{ substr(auth()->guard('admin')->user()->name, 0, 1) }}
                            </span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="text-sm font-medium text-white">{{ auth()->guard('admin')->user()->name }}</div>
                        <div class="text-xs text-gray-400">Active Now</div>
                    </div>
                </div>

                <a href="{{ route('admin.profile.edit') }}" 
                   class="flex items-center justify-center gap-2 w-full px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                    </svg>
                    Profile Settings
                </a>

                <form method="POST" action="{{ route('admin.logout') }}" class="w-full">
                    @csrf
                    <button type="submit" 
                            class="flex items-center justify-center gap-2 w-full px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V7.414l-5-5H3zm7 8a1 1 0 10-2 0v3a1 1 0 102 0v-3z" clip-rule="evenodd" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-72 p-8">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.monsterpedia') }}" class="text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                    <h2 class="text-3xl font-bold text-white">{{ $monster->name }}</h2>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.monsters.edit', $monster) }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Edit Monster
                    </a>
                    <button onclick="deleteMonster({{ $monster->id }})" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        Delete Monster
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Monster Image -->
                <div class="bg-gray-800 rounded-lg overflow-hidden">
                    <div class="h-96 bg-gradient-to-br 
                        @if($monster->category == 'Aquatic') from-blue-600 to-cyan-500 
                        @elseif($monster->category == 'Terrestrial') from-red-600 to-orange-500 
                        @elseif($monster->category == 'Aerial') from-green-600 to-teal-500 
                        @elseif($monster->category == 'Paranormal') from-indigo-600 to-purple-500 
                        @else from-gray-600 to-gray-500 
                        @endif 
                        flex items-center justify-center">
                        
                        @if($monster->image_path)
                            <img src="{{ route('monsters.image', $monster) }}" alt="{{ $monster->name }}" class="h-full w-full object-cover">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 text-white opacity-80" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                        @endif
                    </div>
                </div>

                <!-- Monster Details -->
                <div class="space-y-6">
                    <div class="bg-gray-800 rounded-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-2xl font-bold text-white">{{ $monster->name }}</h3>
                            <span class="
                                @if($monster->category == 'Aquatic') bg-blue-900 text-blue-300 
                                @elseif($monster->category == 'Terrestrial') bg-red-900 text-red-300 
                                @elseif($monster->category == 'Aerial') bg-green-900 text-green-300 
                                @elseif($monster->category == 'Paranormal') bg-purple-900 text-purple-300 
                                @else bg-gray-900 text-gray-300 
                                @endif 
                                px-3 py-1 rounded-full text-sm font-medium">
                                {{ $monster->category }}
                            </span>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div>
                                <p class="text-gray-400 text-sm">Danger Level</p>
                                <p class="text-white font-medium">{{ $monster->danger_level }}</p>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Sightings</p>
                                <p class="text-white font-medium">{{ $monster->sightings }}</p>
                            </div>
                        </div>

                        <div>
                            <p class="text-gray-400 text-sm mb-2">Description</p>
                            <p class="text-white">{{ $monster->description }}</p>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="bg-gray-800 rounded-lg p-6">
                        <h4 class="text-xl font-bold text-white mb-4">Additional Information</h4>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-400 text-sm">Created At</p>
                                <p class="text-white">{{ $monster->created_at->format('F j, Y') }}</p>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Last Updated</p>
                                <p class="text-white">{{ $monster->updated_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteMonster(monsterId) {
            if (confirm('Are you sure you want to delete this monster? This action cannot be undone.')) {
                fetch(`/admin/monsters/${monsterId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = '/admin/monsterpedia';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the monster.');
                });
            }
        }
    </script>
</body>
</html> 