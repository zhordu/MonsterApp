<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Monsterpedia - Monster App</title>
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
                <h2 class="text-3xl font-bold text-white">Admin Monsterpedia</h2>
                <a href="{{ route('admin.monsters.create') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-4 rounded-lg flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New Monster
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-900 text-green-200 p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Search Bar -->
            <div class="mb-8">
                <form method="GET" action="{{ route('admin.monsterpedia') }}">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search monsters..." class="w-full bg-gray-800 text-white rounded-lg py-3 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <button type="submit" class="absolute inset-y-0 right-0 px-4 text-gray-400 hover:text-white">
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <!-- Filter Tabs -->
            <div class="flex space-x-4 mb-6 border-b border-gray-700 pb-2">
                <a href="{{ route('admin.monsterpedia') }}" class="{{ request('category') == null ? 'text-white bg-gray-700' : 'text-gray-400 hover:text-white' }} px-4 py-2 rounded-t-lg font-medium">All Monsters</a>
                <a href="{{ route('admin.monsterpedia', ['category' => 'Aquatic']) }}" class="{{ request('category') == 'Aquatic' ? 'text-white bg-gray-700' : 'text-gray-400 hover:text-white' }} px-4 py-2 font-medium">Aquatic</a>
                <a href="{{ route('admin.monsterpedia', ['category' => 'Terrestrial']) }}" class="{{ request('category') == 'Terrestrial' ? 'text-white bg-gray-700' : 'text-gray-400 hover:text-white' }} px-4 py-2 font-medium">Terrestrial</a>
                <a href="{{ route('admin.monsterpedia', ['category' => 'Aerial']) }}" class="{{ request('category') == 'Aerial' ? 'text-white bg-gray-700' : 'text-gray-400 hover:text-white' }} px-4 py-2 font-medium">Aerial</a>
                <a href="{{ route('admin.monsterpedia', ['category' => 'Paranormal']) }}" class="{{ request('category') == 'Paranormal' ? 'text-white bg-gray-700' : 'text-gray-400 hover:text-white' }} px-4 py-2 font-medium">Paranormal</a>
            </div>

            <!-- Monster Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($monsters as $monster)
                    <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg transform transition hover:scale-105 relative">
                        <a href="{{ route('admin.monsters.show', $monster) }}" class="block">
                            <div class="w-full aspect-square bg-gradient-to-br 
                                @if($monster->category == 'Aquatic') from-blue-600 to-cyan-500 
                                @elseif($monster->category == 'Terrestrial') from-red-600 to-orange-500 
                                @elseif($monster->category == 'Aerial') from-green-600 to-teal-500 
                                @elseif($monster->category == 'Paranormal') from-indigo-600 to-purple-500 
                                @else from-gray-600 to-gray-500 
                                @endif 
                                flex items-center justify-center relative overflow-hidden">
                                
                                @if($monster->image_path)
                                    <img src="{{ route('monsters.image', $monster) }}" alt="{{ $monster->name }}" class="h-full w-full object-cover object-center">
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

                        <!-- Action buttons overlay -->
                        <div class="absolute top-2 right-2 flex space-x-2 z-10">
                            <a href="{{ route('admin.monsters.edit', $monster) }}" class="bg-blue-600 p-2 rounded-full hover:bg-blue-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                            <button onclick="deleteMonster({{ $monster->id }})" class="bg-red-600 p-2 rounded-full hover:bg-red-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="text-xl text-gray-400 mt-4">No monsters found</h3>
                        <p class="text-gray-500 mt-2">Try adjusting your search or filters</p>
                        <a href="{{ route('admin.monsters.create') }}" class="inline-block mt-4 bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-4 rounded-lg">Add Your First Monster</a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $monsters->appends(request()->query())->links() }}
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
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the monster.');
                });
            }
        }

        // Image resizing function to ensure uploads are under 2MB
        function resizeImageBeforeUpload(inputElement) {
            const file = inputElement.files[0];
            if (!file) return;

            // If file is already smaller than 2MB, no need to resize
            if (file.size <= 2 * 1024 * 1024) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {
                    // Create a canvas to resize the image
                    const canvas = document.createElement('canvas');
                    let width = img.width;
                    let height = img.height;
                    
                    // Calculate new dimensions while maintaining aspect ratio
                    // Start with 80% quality and reduce dimensions if needed
                    let quality = 0.8;
                    const maxWidth = 1920; // Max width for the image
                    const maxHeight = 1080; // Max height for the image
                    
                    if (width > height) {
                        if (width > maxWidth) {
                            height *= maxWidth / width;
                            width = maxWidth;
                        }
                    } else {
                        if (height > maxHeight) {
                            width *= maxHeight / height;
                            height = maxHeight;
                        }
                    }
                    
                    canvas.width = width;
                    canvas.height = height;
                    
                    // Draw the image on the canvas
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, width, height);
                    
                    // Convert to Blob and check size
                    canvas.toBlob(function(blob) {
                        // If still too large, reduce quality further
                        if (blob.size > 2 * 1024 * 1024) {
                            quality = 0.6; // Try with 60% quality
                            canvas.toBlob(function(blob) {
                                if (blob.size > 2 * 1024 * 1024) {
                                    quality = 0.4; // Last attempt with 40% quality
                                    canvas.toBlob(replaceFileWithBlob, 'image/jpeg', 0.4);
                                } else {
                                    replaceFileWithBlob(blob);
                                }
                            }, 'image/jpeg', 0.6);
                        } else {
                            replaceFileWithBlob(blob);
                        }
                    }, 'image/jpeg', quality);
                    
                    function replaceFileWithBlob(blob) {
                        // Create a new File from the blob
                        const resizedFile = new File([blob], file.name, {
                            type: 'image/jpeg',
                            lastModified: new Date().getTime()
                        });
                        
                        // Create a new FileList-like object
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(resizedFile);
                        
                        // Replace the original file with the resized one
                        inputElement.files = dataTransfer.files;
                        
                        console.log(`Image resized from ${formatFileSize(file.size)} to ${formatFileSize(blob.size)}`);
                        
                        // If there's a preview function, trigger it
                        if (typeof showPreview === 'function') {
                            const event = { target: { files: dataTransfer.files } };
                            showPreview(event);
                        }
                    }
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
        
        function formatFileSize(bytes) {
            if (bytes < 1024) return bytes + ' bytes';
            else if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
            else return (bytes / 1048576).toFixed(1) + ' MB';
        }
        
        // Add event listeners to all file inputs when the DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            const fileInputs = document.querySelectorAll('input[type="file"][accept*="image"]');
            fileInputs.forEach(input => {
                input.addEventListener('change', function() {
                    resizeImageBeforeUpload(this);
                });
            });
        });
    </script>
</body>
</html> 