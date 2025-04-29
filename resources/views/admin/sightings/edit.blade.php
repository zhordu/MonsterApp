<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Monster Sighting - Monster App Admin</title>
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
                <a href="/admin/dashboard" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl bg-gray-700 text-white hover:bg-gray-600 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span>Verify Monsters</span>
                </a>

                <a href="/admin/monsterpedia" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200 group">
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
                <h2 class="text-3xl font-bold text-white">Edit Monster Sighting</h2>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-lg flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Dashboard
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-900 text-green-200 p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-gray-800 rounded-lg shadow-lg p-6">
                <form action="{{ route('admin.sightings.update', $sighting) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Current Image Preview -->
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Current Image</label>
                            @if($sighting->image)
                                <img src="{{ route('monster-sightings.image', $sighting) }}" alt="Current monster sighting" 
                                     class="w-64 h-64 object-cover rounded-lg border-2 border-gray-600">
                            @else
                                <div class="w-64 h-64 bg-gray-700 rounded-lg border-2 border-gray-600 flex items-center justify-center">
                                    <span class="text-gray-400">No image available</span>
                                </div>
                            @endif
                        </div>

                        <!-- Image Upload -->
                        <div class="col-span-2">
                            <label for="image" class="block text-sm font-medium text-gray-300">Update Image</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                   class="mt-1 block w-full text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-700 file:text-white hover:file:bg-gray-600">
                            <p class="mt-1 text-sm text-gray-400">Leave empty to keep the current image</p>
                        </div>

                        <div>
                            <label for="monster_name" class="block text-sm font-medium text-gray-300">Monster Name</label>
                            <input type="text" name="monster_name" id="monster_name" value="{{ old('monster_name', $sighting->monster_name) }}" 
                                   class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-300">Category</label>
                            <select name="category" id="category" 
                                    class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Select a category</option>
                                <option value="Aquatic" {{ old('category', $sighting->category) == 'Aquatic' ? 'selected' : '' }}>Aquatic</option>
                                <option value="Terrestrial" {{ old('category', $sighting->category) == 'Terrestrial' ? 'selected' : '' }}>Terrestrial</option>
                                <option value="Aerial" {{ old('category', $sighting->category) == 'Aerial' ? 'selected' : '' }}>Aerial</option>
                                <option value="Paranormal" {{ old('category', $sighting->category) == 'Paranormal' ? 'selected' : '' }}>Paranormal</option>
                                <option value="Unknown" {{ old('category', $sighting->category) == 'Unknown' ? 'selected' : '' }}>Unknown</option>
                            </select>
                        </div>

                        <div>
                            <label for="danger_level" class="block text-sm font-medium text-gray-300">Danger Level</label>
                            <select name="danger_level" id="danger_level" 
                                    class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="Unknown" {{ old('danger_level', $sighting->danger_level) == 'Unknown' ? 'selected' : '' }}>Unknown</option>
                                <option value="1" {{ old('danger_level', $sighting->danger_level) == '1' ? 'selected' : '' }}>Level 1 - Low</option>
                                <option value="2" {{ old('danger_level', $sighting->danger_level) == '2' ? 'selected' : '' }}>Level 2 - Moderate</option>
                                <option value="3" {{ old('danger_level', $sighting->danger_level) == '3' ? 'selected' : '' }}>Level 3 - High</option>
                                <option value="4" {{ old('danger_level', $sighting->danger_level) == '4' ? 'selected' : '' }}>Level 4 - Very High</option>
                                <option value="5" {{ old('danger_level', $sighting->danger_level) == '5' ? 'selected' : '' }}>Level 5 - Extreme</option>
                            </select>
                        </div>

                        <div>
                            <label for="location_name" class="block text-sm font-medium text-gray-300">Location Name</label>
                            <input type="text" name="location_name" id="location_name" value="{{ old('location_name', $sighting->location_name) }}" 
                                   class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="sighting_time" class="block text-sm font-medium text-gray-300">Sighting Time</label>
                            <input type="datetime-local" name="sighting_time" id="sighting_time" 
                                   value="{{ old('sighting_time', $sighting->sighting_time ? date('Y-m-d\TH:i', strtotime($sighting->sighting_time)) : '') }}" 
                                   class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="lat" class="block text-sm font-medium text-gray-300">Latitude</label>
                            <input type="number" step="any" name="lat" id="lat" value="{{ old('lat', $sighting->lat) }}" 
                                   class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="lng" class="block text-sm font-medium text-gray-300">Longitude</label>
                            <input type="number" step="any" name="lng" id="lng" value="{{ old('lng', $sighting->lng) }}" 
                                   class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
                        <textarea name="description" id="description" rows="4" 
                                  class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $sighting->description) }}</textarea>
                    </div>

                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('admin.dashboard') }}" 
                           class="px-4 py-2 border border-gray-600 rounded-md text-gray-300 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Update Sighting
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
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
        
        // Add event listener to the image input when the DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            if (imageInput) {
                imageInput.addEventListener('change', function() {
                    resizeImageBeforeUpload(this);
                });
            }
        });
    </script>
</body>
</html>