<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Monster - Monster App Admin</title>
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
                <h2 class="text-3xl font-bold text-white">Edit Monster</h2>
                <a href="{{ route('admin.monsterpedia') }}" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-lg flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Monsterpedia
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-900 text-green-200 p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-gray-800 rounded-lg shadow-lg p-6">
                <form action="{{ route('admin.monsters.update', $monster) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Monster Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $monster->name) }}" 
                                class="w-full bg-gray-700 text-white rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-300 mb-1">Category</label>
                            <select name="category" id="category" 
                                class="w-full bg-gray-700 text-white rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('category') border-red-500 @enderror">
                                <option value="">Select a category</option>
                                <option value="Aquatic" {{ old('category', $monster->category) == 'Aquatic' ? 'selected' : '' }}>Aquatic</option>
                                <option value="Terrestrial" {{ old('category', $monster->category) == 'Terrestrial' ? 'selected' : '' }}>Terrestrial</option>
                                <option value="Aerial" {{ old('category', $monster->category) == 'Aerial' ? 'selected' : '' }}>Aerial</option>
                                <option value="Paranormal" {{ old('category', $monster->category) == 'Paranormal' ? 'selected' : '' }}>Paranormal</option>
                            </select>
                            @error('category')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Danger Level -->
                        <div>
                            <label for="danger_level" class="block text-sm font-medium text-gray-300 mb-1">Danger Level</label>
                            <select name="danger_level" id="danger_level" 
                                class="w-full bg-gray-700 text-white rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('danger_level') border-red-500 @enderror">
                                <option value="">Select danger level</option>
                                <option value="Low" {{ old('danger_level', $monster->danger_level) == 'Low' ? 'selected' : '' }}>Low</option>
                                <option value="Moderate" {{ old('danger_level', $monster->danger_level) == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                                <option value="High" {{ old('danger_level', $monster->danger_level) == 'High' ? 'selected' : '' }}>High</option>
                                <option value="Very High" {{ old('danger_level', $monster->danger_level) == 'Very High' ? 'selected' : '' }}>Very High</option>
                                <option value="Extreme" {{ old('danger_level', $monster->danger_level) == 'Extreme' ? 'selected' : '' }}>Extreme</option>
                            </select>
                            @error('danger_level')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-300 mb-1">Monster Image</label>
                            <div class="border-2 border-dashed border-gray-600 rounded-lg p-4 text-center">
                                <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="resizeImageBeforeUpload(this)">
                                <label for="image" class="cursor-pointer">
                                    <div id="preview-container" class="{{ $monster->image_path ? '' : 'hidden' }} mb-4 mx-auto max-w-xs">
                                        @if($monster->image_path)
                                            <img id="preview-image" src="{{ route('monsters.image', $monster) }}" alt="{{ $monster->name }}" class="mx-auto max-h-48 rounded">
                                        @else
                                            <img id="preview-image" src="#" alt="Preview" class="mx-auto max-h-48 rounded">
                                        @endif
                                    </div>
                                    <div id="upload-prompt" class="{{ $monster->image_path ? 'hidden' : '' }} flex flex-col items-center justify-center py-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="text-gray-400">Click to upload a monster image</p>
                                        <p class="text-gray-500 text-sm mt-1">PNG, JPG, GIF up to 2MB</p>
                                    </div>
                                </label>
                            </div>
                            <p class="text-gray-400 text-xs mt-1">Leave empty to keep the current image</p>
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="lat" class="block text-sm font-medium text-gray-300 mb-1">Latitude</label>
                            <input type="number" step="any" name="lat" id="lat" value="{{ old('lat', $monster->lat) }}" 
                                class="w-full bg-gray-700 text-white rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('lat') border-red-500 @enderror">
                            @error('lat')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="lng" class="block text-sm font-medium text-gray-300 mb-1">Longitude</label>
                            <input type="number" step="any" name="lng" id="lng" value="{{ old('lng', $monster->lng) }}" 
                                class="w-full bg-gray-700 text-white rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('lng') border-red-500 @enderror">
                            @error('lng')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium text-gray-300 mb-1">Description</label>
                        <textarea name="description" id="description" rows="5" 
                            class="w-full bg-gray-700 text-white rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('description') border-red-500 @enderror">{{ old('description', $monster->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('admin.monsterpedia') }}" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">Cancel</a>
                        <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-4 rounded-lg">Update Monster</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Image preview functionality
        document.getElementById('image').addEventListener('change', function(event) {
            showPreview(event);
        });

        function showPreview(event) {
            const previewContainer = document.getElementById('preview-container');
            const previewImage = document.getElementById('preview-image');
            const uploadPrompt = document.getElementById('upload-prompt');
            
            if (event.target.files.length > 0) {
                const src = URL.createObjectURL(event.target.files[0]);
                previewImage.src = src;
                previewContainer.classList.remove('hidden');
                uploadPrompt.classList.add('hidden');
            }
        }

        // Image resizing function to ensure uploads are under 2MB
        function resizeImageBeforeUpload(inputElement) {
            const file = inputElement.files[0];
            if (!file) return;

            // If file is already smaller than 2MB, no need to resize
            if (file.size <= 2 * 1024 * 1024) {
                showPreview({ target: inputElement });
                return;
            }

            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(event) {
                const img = new Image();
                img.src = event.target.result;
                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    let width = img.width;
                    let height = img.height;

                    // Calculate new dimensions while maintaining aspect ratio
                    const MAX_WIDTH = 1200;
                    const MAX_HEIGHT = 1200;

                    if (width > height) {
                        if (width > MAX_WIDTH) {
                            height *= MAX_WIDTH / width;
                            width = MAX_WIDTH;
                        }
                    } else {
                        if (height > MAX_HEIGHT) {
                            width *= MAX_HEIGHT / height;
                            height = MAX_HEIGHT;
                        }
                    }

                    canvas.width = width;
                    canvas.height = height;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, width, height);

                    // Convert to Blob and create a new File
                    canvas.toBlob(function(blob) {
                        // Create a new File object
                        const resizedFile = new File([blob], file.name, {
                            type: 'image/jpeg',
                            lastModified: Date.now()
                        });

                        // Replace the original file with the resized one
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(resizedFile);
                        inputElement.files = dataTransfer.files;

                        console.log(`Original size: ${formatFileSize(file.size)}, Resized: ${formatFileSize(resizedFile.size)}`);
                        
                        // Show preview with the resized image
                        showPreview({ target: inputElement });
                    }, 'image/jpeg', 0.7); // JPEG at 70% quality for better compression
                };
            };
        }

        function formatFileSize(bytes) {
            if (bytes < 1024) return bytes + ' bytes';
            else if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
            else return (bytes / 1048576).toFixed(1) + ' MB';
        }
    </script>
</body>
</html>