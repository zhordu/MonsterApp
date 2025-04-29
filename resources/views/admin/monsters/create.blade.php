<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add New Monster - Monster App Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
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
                <a href="/admin/dashboard" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span>Verify Monsters</span>
                </a>

                <a href="/admin/monsterpedia" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl bg-gray-700 text-white hover:bg-gray-600 transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 group-hover:text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                    <span>Monsterpedia</span>
                </a>

                <a href="/admin/community-reports" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400 group-hover:text-purple-300" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                    </svg>
                    <span>Community Reports</span>
                </a>
            </nav>

            <!-- Logout Section -->
            <div class="p-4 border-t border-gray-700">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V7.414l-5-5H3zm7 8a1 1 0 10-2 0v3a1 1 0 102 0v-3z" clip-rule="evenodd" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-72 p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-white">Add New Monster</h2>
                <a href="{{ route('admin.monsterpedia') }}" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-lg flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Back to Monsters
                </a>
            </div>

            @if($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-gray-800 rounded-lg shadow overflow-hidden p-6">
                <form action="{{ route('admin.monsters.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-gray-300 mb-2">Monster Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="category" class="block text-gray-300 mb-2">Category</label>
                            <select name="category" id="category" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                                <option value="">Select Category</option>
                                <option value="Aquatic" {{ old('category') == 'Aquatic' ? 'selected' : '' }}>Aquatic</option>
                                <option value="Terrestrial" {{ old('category') == 'Terrestrial' ? 'selected' : '' }}>Terrestrial</option>
                                <option value="Aerial" {{ old('category') == 'Aerial' ? 'selected' : '' }}>Aerial</option>
                                <option value="Paranormal" {{ old('category') == 'Paranormal' ? 'selected' : '' }}>Paranormal</option>
                            </select>
                            @error('category')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="md:col-span-2">
                            <label for="description" class="block text-gray-300 mb-2">Description</label>
                            <textarea name="description" id="description" rows="4" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500" required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="danger_level" class="block text-gray-300 mb-2">Danger Level</label>
                            <select name="danger_level" id="danger_level" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                                <option value="">Select Danger Level</option>
                                <option value="Low" {{ old('danger_level') == 'Low' ? 'selected' : '' }}>Low</option>
                                <option value="Moderate" {{ old('danger_level') == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                                <option value="High" {{ old('danger_level') == 'High' ? 'selected' : '' }}>High</option>
                                <option value="Very High" {{ old('danger_level') == 'Very High' ? 'selected' : '' }}>Very High</option>
                                <option value="Extreme" {{ old('danger_level') == 'Extreme' ? 'selected' : '' }}>Extreme</option>
                            </select>
                            @error('danger_level')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="sightings" class="block text-gray-300 mb-2">Number of Sightings</label>
                            <input type="number" name="sightings" id="sightings" value="{{ old('sightings', 0) }}" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500" required min="0">
                            @error('sightings')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="md:col-span-2">
                            <label class="block text-gray-300 mb-2">Monster Location</label>
                            <div class="bg-gray-700 border border-gray-600 rounded-lg overflow-hidden">
                                <div id="map" class="h-64 w-full"></div>
                                <div class="p-4 grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="lat" class="block text-gray-300 text-sm mb-1">Latitude</label>
                                        <input type="number" step="any" name="lat" id="lat" value="{{ old('lat') }}" class="w-full bg-gray-800 border border-gray-600 rounded-lg px-3 py-1.5 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500" required readonly>
                                    </div>
                                    <div>
                                        <label for="lng" class="block text-gray-300 text-sm mb-1">Longitude</label>
                                        <input type="number" step="any" name="lng" id="lng" value="{{ old('lng') }}" class="w-full bg-gray-800 border border-gray-600 rounded-lg px-3 py-1.5 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500" required readonly>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-400 text-sm mt-2">Click on the map to set the monster's location</p>
                            @error('lat')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            @error('lng')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="md:col-span-2">
                            <label for="image" class="block text-gray-300 mb-2">Monster Image</label>
                            <div class="border-2 border-dashed border-gray-600 rounded-lg p-6 text-center">
                                <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="resizeImageBeforeUpload(this)">
                                <label for="image" class="cursor-pointer">
                                    <div id="preview-container" class="hidden mb-4 mx-auto max-w-xs">
                                        <img id="preview-image" src="#" alt="Preview" class="mx-auto max-h-48 rounded">
                                    </div>
                                    <div id="upload-prompt" class="flex flex-col items-center justify-center py-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="text-gray-400">Click to upload a monster image</p>
                                        <p class="text-gray-500 text-sm mt-1">PNG, JPG, GIF up to 2MB</p>
                                    </div>
                                </label>
                            </div>
                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-6 rounded-lg flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Add Monster
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showPreview(event) {
            const previewContainer = document.getElementById('preview-container');
            const previewImage = document.getElementById('preview-image');
            const uploadPrompt = document.getElementById('upload-prompt');
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    uploadPrompt.classList.add('hidden');
                }
                reader.readAsDataURL(file);
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
                        
                        // Show preview with the resized image
                        const event = { target: { files: dataTransfer.files } };
                        showPreview(event);
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

        // Initialize the map
        document.addEventListener('DOMContentLoaded', function() {
            // Default center (Philippines)
            const defaultLat = {{ old('lat', 14.5995) }};
            const defaultLng = {{ old('lng', 120.9842) }};
            const centerLat = defaultLat || 14.5995; // Manila, Philippines latitude
            const centerLng = defaultLng || 120.9842; // Manila, Philippines longitude
            
            // Create map
            const map = L.map('map').setView([centerLat, centerLng], 6); // Zoom level 6 for Philippines view
            
            // Add tile layer (OpenStreetMap)
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            
            // Add marker
            let marker;
            if (defaultLat && defaultLng) {
                marker = L.marker([defaultLat, defaultLng]).addTo(map);
            }
            
            // Update coordinates when clicking on map
            map.on('click', function(e) {
                const lat = e.latlng.lat.toFixed(6);
                const lng = e.latlng.lng.toFixed(6);
                
                // Update input fields
                document.getElementById('lat').value = lat;
                document.getElementById('lng').value = lng;
                
                // Update marker
                if (marker) {
                    marker.setLatLng(e.latlng);
                } else {
                    marker = L.marker(e.latlng).addTo(map);
                }
            });
        });
    </script>
</body>
</html> 