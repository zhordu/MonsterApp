<x-app-layout>
    <!-- Top Header for Philippine Monster Map -->
    <div class="fixed top-0 left-72 right-0 bg-gray-800 bg-opacity-95 shadow-lg z-10 border-b border-gray-700">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-white">Philippine Monster Map</h1>
                    <p class="text-gray-300 text-sm">Interactive map of monster sightings across the Philippines</p>
                </div>
                <div class="flex items-center gap-4">
                    <span id="sighting-mode-indicator" class="hidden px-3 py-1 bg-red-600 text-white rounded-full text-sm animate-pulse">
                        Sighting Mode Active - Click on Map to Place Pin
                    </span>

                    <button id="report-sighting-btn" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-all duration-200 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        Report Monster Sighting
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="flex bg-gray-900 min-h-screen pt-16">
        <!-- Left-aligned Sidebar -->
        <div class="fixed left-0 top-0 h-full w-72 bg-gradient-to-b from-gray-800 to-gray-900 border-r border-gray-700 shadow-lg flex flex-col z-20">
            <!-- Logo Section -->
            <div class="flex items-center justify-center h-20 border-b border-gray-700">
                <a href="{{ url('/dashboard') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('monster.png') }}" alt="Monster Logo" class="w-10 h-10">
                    <span class="text-xl font-bold text-white">Monster App</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="/dashboard" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="/interactiveMap" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl bg-gray-700 text-white hover:bg-gray-600 transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400 group-hover:text-red-300" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    <div class="flex items-center justify-between w-full">
                        <span>Interactive Map</span>
                        <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-medium rounded-full bg-red-900 text-red-300">Live</span>
                    </div>
                </a>

                <a href="/survival-guide" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400 group-hover:text-green-300" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                    </svg>
                    <span>Survival Guide</span>
                </a>

                <a href="/monsterpedia" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 group-hover:text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 102 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                    <span>Monsterpedia</span>
                </a>

                <a href="/community-reports" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400 group-hover:text-purple-300" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                    </svg>
                    <span>Community Reports</span>
                </a>
            </nav>

            <!-- User Profile Section -->
            <div class="p-4 border-t border-gray-700">
                <div class="flex items-center gap-3 mb-4">
                    <div class="relative">
                        <div class="h-12 w-12 rounded-full bg-gradient-to-r from-purple-500 to-blue-500 flex items-center justify-center text-white font-bold text-lg">
                            {{ Auth::user()->name[0] ?? 'U' }}
                        </div>
                        <div class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-green-500 border-2 border-gray-800"></div>
                    </div>
                    <div>
                        <h3 class="text-white font-medium">{{ Auth::user()->name ?? 'User' }}</h3>
                        <p class="text-gray-400 text-sm">Active Now</p>
                    </div>
                </div>
                
                <!-- Profile Actions -->
                <div class="space-y-2">
                    <a href="{{ route('profile.edit') }}" class="flex items-center justify-center gap-2 px-4 py-2 bg-blue-500 rounded-lg hover:bg-blue-600 transition-all duration-200 text-white text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                        </svg>
                        Profile Settings
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="flex items-center justify-center gap-2 w-full px-4 py-2 bg-red-500 rounded-lg hover:bg-red-600 transition-all duration-200 text-white text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- App Version -->
            <div class="p-4 border-t border-gray-700">
                <div class="flex items-center justify-between text-xs text-gray-500">
                    <span>Monster App v6.9</span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                        </svg>
                        Update Available
                    </span>
                </div>
            </div>
        </div>

        <!-- Main Content Area with Full Screen Map -->
        <div class="flex-1 ml-72">
            <!-- Map Container - Fixed Position -->
            <div class="flex w-full h-screen">
                <div id="map-container" class="fixed top-16 bottom-0 left-72 right-0 z-5">
                    <div class="h-full w-full">
                        <div class="flex h-full">
                            <div id="map" class="w-full h-full relative">
                                <!-- Fullscreen Toggle Button - Inside Map -->
                                <div class="absolute left-4 top-4 z-[1000]">
                                    <button id="fullscreen-toggle-btn" class="p-2 bg-gray-800 bg-opacity-70 text-white rounded-lg hover:bg-gray-700 transition-all duration-200 flex items-center justify-center shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 01-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 011.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v3h3a1 1 0 110 2H13a1 1 0 01-1-1z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <!-- Sighting Form Container - Initially Hidden -->
                            <div id="sighting-form-container" class="hidden w-[500px] bg-gray-800 rounded-lg shadow-xl overflow-y-auto">
                                <div class="sticky top-0 left-0 right-0 p-4 bg-gray-800 border-b border-gray-700 z-10">
                                    <div class="flex justify-between items-center">
                                        <h2 class="text-xl font-bold text-white">Report Monster Sighting</h2>
                                        <button id="close-form-btn" class="text-gray-400 hover:text-white p-2 rounded-full hover:bg-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <form id="monster-sighting-form" method="POST" action="{{ route('monster-sightings.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <input type="hidden" id="lat" name="lat">
                                        <input type="hidden" id="lng" name="lng">
                                        
                                        <!-- Current Location Display -->
                                        <div class="mb-6 p-3 bg-gray-700 rounded-lg">
                                            <p class="text-sm text-gray-300 mb-1">Selected Location:</p>
                                            <div id="location-display" class="text-white font-medium"></div>
                                            <p class="text-xs text-gray-400 mt-1">Drag the pin on the map to adjust</p>
                                        </div>
                                        
                                        <!-- Upload Image Section -->
                                        <div class="mb-6">
                                            <label for="image" class="block text-sm font-medium text-gray-300 mb-2">Upload Monster Image</label>
                                            <div class="mt-1 flex flex-col">
                                                <input type="file" id="image" name="image" accept="image/*" class="hidden" onchange="previewImage(this)">
                                                <label for="image" class="cursor-pointer bg-gray-700 text-white px-4 py-3 rounded-lg hover:bg-gray-600 transition-colors duration-200 flex items-center justify-center gap-2 border border-gray-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span id="image-label">Choose Image</span>
                                                </label>
                                            </div>
                                            <div id="image-preview" class="mt-3 hidden">
                                                <div class="relative">
                                                    <img id="preview" class="w-full h-auto rounded-lg object-cover border border-gray-600" src="" alt="Preview">
                                                    <button type="button" onclick="removeImage()" class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="grid grid-cols-1 gap-6 mb-6">
                                            <!-- Monster Name -->
                                            <div>
                                                <label for="monster_name" class="block text-sm font-medium text-gray-300">Monster Name</label>
                                                <input type="text" id="monster_name" name="monster_name" required 
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-gray-700 text-white rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                            </div>
                                            
                                            <!-- Category & Danger Level - Side by Side -->
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label for="category" class="block text-sm font-medium text-gray-300">Category</label>
                                                    <select id="category" name="category" required
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-gray-700 text-white rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                                        <option value="">Select a category</option>
                                                        <option value="Aquatic">Aquatic</option>
                                                        <option value="Terrestrial">Terrestrial</option>
                                                        <option value="Aerial">Aerial</option>
                                                        <option value="Paranormal">Paranormal</option>
                                                    </select>
                                                </div>
                                                
                                                <div>
                                                    <label for="danger_level" class="block text-sm font-medium text-gray-300">Danger Level</label>
                                                    <select id="danger_level" name="danger_level" required
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-gray-700 text-white rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                                        <option value="Unknown">Unknown</option>
                                                        <option value="1">Level 1 - Low</option>
                                                        <option value="2">Level 2 - Moderate</option>
                                                        <option value="3">Level 3 - High</option>
                                                        <option value="4">Level 4 - Very High</option>
                                                        <option value="5">Level 5 - Extreme</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <!-- Location & Time - Side by Side -->
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label for="location_name" class="block text-sm font-medium text-gray-300">Location Name</label>
                                                    <input type="text" id="location_name" name="location_name" 
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-gray-700 text-white rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                                </div>
                                                
                                                <div>
                                                    <label for="sighting_time" class="block text-sm font-medium text-gray-300">Sighting Time</label>
                                                    <input type="datetime-local" id="sighting_time" name="sighting_time" 
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-gray-700 text-white rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                                </div>
                                            </div>
                                            
                                            <!-- Description -->
                                            <div>
                                                <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
                                                <textarea id="description" name="description" rows="5" required 
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-gray-700 text-white rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- Action Buttons -->
                                        <div class="flex items-center justify-between pt-4 border-t border-gray-700">
                                            <button type="button" id="reset-pin-btn" 
                                                class="py-2 px-4 border border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                                Reset Pin
                                            </button>
                                            <button type="submit" id="submit-sighting-btn" disabled 
                                                class="py-2 px-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                                Submit Sighting
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Legend Panel -->
                    <div class="absolute left-4 top-24 z-[1000]">
                        <div class="bg-gray-800 bg-opacity-90 p-4 rounded-lg shadow-lg border border-gray-700">
                            <h3 class="text-white font-bold mb-2 text-sm uppercase tracking-wider">Map Legend</h3>
                            
                            <!-- Monster Categories -->
                            <div class="mb-3">
                                <h4 class="text-gray-300 text-xs font-semibold mb-1">Monster Categories</h4>
                                <div class="space-y-1">
                                    <div class="flex items-center">
                                        <button class="category-filter flex items-center w-full hover:bg-gray-700 p-1 rounded transition-colors" data-category="Aquatic">
                                            <img src="/img/marker-aquatic.png" alt="Aquatic" class="w-6 h-6 mr-2">
                                            <span class="text-gray-200 text-xs">Aquatic</span>
                                        </button>
                                    </div>
                                    <div class="flex items-center">
                                        <button class="category-filter flex items-center w-full hover:bg-gray-700 p-1 rounded transition-colors" data-category="Terrestrial">
                                            <img src="/img/marker-terrestrial.png" alt="Terrestrial" class="w-6 h-6 mr-2">
                                            <span class="text-gray-200 text-xs">Terrestrial</span>
                                        </button>
                                    </div>
                                    <div class="flex items-center">
                                        <button class="category-filter flex items-center w-full hover:bg-gray-700 p-1 rounded transition-colors" data-category="Aerial">
                                            <img src="/img/marker-aerial.png" alt="Aerial" class="w-6 h-6 mr-2">
                                            <span class="text-gray-200 text-xs">Aerial</span>
                                        </button>
                                    </div>
                                    <div class="flex items-center">
                                        <button class="category-filter flex items-center w-full hover:bg-gray-700 p-1 rounded transition-colors" data-category="Paranormal">
                                            <img src="/img/marker-paranormal.png" alt="Paranormal" class="w-6 h-6 mr-2">
                                            <span class="text-gray-200 text-xs">Paranormal</span>
                                        </button>
                                    </div>
                                    <div class="flex items-center">
                                        <button class="category-filter flex items-center w-full hover:bg-gray-700 p-1 rounded transition-colors" data-category="sighting">
                                            <img src="/marker-sighting.png" alt="Pending Sighting" class="w-6 h-6 mr-2">
                                            <span class="text-gray-200 text-xs">Pending Sighting</span>
                                        </button>
                                    </div>
                                    <div class="flex items-center mt-1 pt-1 border-t border-gray-700">
                                        <button id="show-all-categories" class="flex items-center w-full bg-gray-700 p-1 rounded transition-colors hover:bg-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-gray-200 text-xs">Show All</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Safe Zones Legend -->
                            <div class="mb-3">
                                <h4 class="text-gray-300 text-xs font-semibold mb-1">Safe Zones</h4>
                                <div class="space-y-1">
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 rounded-full bg-green-500 mr-2"></div>
                                        <button class="safe-zone-button flex items-center w-full hover:bg-gray-700 p-1 rounded transition-colors" data-zone="Butuan">
                                            <span class="text-gray-200 text-xs">Butuan City</span>
                                        </button>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 rounded-full bg-green-500 mr-2"></div>
                                        <button class="safe-zone-button flex items-center w-full hover:bg-gray-700 p-1 rounded transition-colors" data-zone="Cebu">
                                            <span class="text-gray-200 text-xs">Cebu City</span>
                                        </button>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 rounded-full bg-green-500 mr-2"></div>
                                        <button class="safe-zone-button flex items-center w-full hover:bg-gray-700 p-1 rounded transition-colors" data-zone="Davao">
                                            <span class="text-gray-200 text-xs">Davao City</span>
                                        </button>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 rounded-full bg-green-500 mr-2"></div>
                                        <button class="safe-zone-button flex items-center w-full hover:bg-gray-700 p-1 rounded transition-colors" data-zone="Manila">
                                            <span class="text-gray-200 text-xs">Manila</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- User Location -->
                            <div class="mb-3">
                                <h4 class="text-gray-300 text-xs font-semibold mb-1">My Location</h4>
                                <div class="space-y-1">
                                    <div class="flex items-center">
                                        <button id="toggle-location" class="flex items-center w-full hover:bg-gray-700 p-1 rounded transition-colors">
                                            <img src="/img/marker-user.svg" alt="My Location" class="w-6 h-6 mr-2">
                                            <span class="text-gray-200 text-xs">My Current Location</span>
                                        </button>
                                    </div>
                                    <div class="flex items-center">
                                        <button id="center-on-location" class="flex items-center w-full hover:bg-gray-700 p-1 rounded transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-gray-200 text-xs">Center Map on Me</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Monster Levels -->
                            <div>
                                <h4 class="text-gray-300 text-xs font-semibold mb-1">Monster Threat Levels</h4>
                                <div class="space-y-1">
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 rounded-full bg-green-500 mr-2"></div>
                                        <span class="text-gray-200 text-xs">Level 1 - Low</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 rounded-full bg-yellow-500 mr-2"></div>
                                        <span class="text-gray-200 text-xs">Level 2 - Medium</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 rounded-full bg-orange-500 mr-2"></div>
                                        <span class="text-gray-200 text-xs">Level 3 - High</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 rounded-full bg-red-500 mr-2"></div>
                                        <span class="text-gray-200 text-xs">Level 4 - Severe</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 rounded-full bg-red-700 mr-2"></div>
                                        <span class="text-gray-200 text-xs">Level 5 - Extreme</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Toggle Legend Button -->
                            <div class="mt-3 pt-2 border-t border-gray-700">
                                <button id="toggle-legend" class="text-xs text-gray-400 hover:text-white flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Hide Legend
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" 
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" 
          crossorigin=""/>
    
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" 
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" 
            crossorigin=""></script>
    
    <!-- Map Initialization Script -->
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Track fullscreen state
    let isFullscreen = false;
    
    // Adjust map height to fit viewport
    function adjustMapHeight() {
        const mapContainer = document.getElementById('map-container');
        const titleBarHeight = document.querySelector('.flex.justify-between').offsetHeight;
        const viewportHeight = window.innerHeight;
        
        // Set the map container height to 1000px
        document.getElementById('map').style.height = '1020px';
    }
    
    // Initial adjustment and listen for window resize
    adjustMapHeight();
    window.addEventListener('resize', adjustMapHeight);
    
    // Initialize the map centered on a more global view
    const map = L.map('map', {
        center: [20, 0], // Centered on a more global view
        zoom: 2, // Lower zoom level for a wider world view
        minZoom: 2, // Allow zooming out to see more of the world
        maxBounds: [
            [-85.0, -180.0], // Southwest corner (near South Pole)
            [85.0, 180.0]  // Northeast corner (near North Pole)
        ],
        maxBoundsViscosity: 0.8, // Slightly reduced to allow more flexible panning
        zoomControl: false // Remove default zoom control to reposition it
    });

    // Add safe zone circle
    const safeZoneCenter = [8.9475, 125.5406]; // Center coordinates
    const safeZoneRadius = 10000; // Radius in meters (10km)
    
    L.circle(safeZoneCenter, {
        radius: safeZoneRadius,
        color: '#00ff00', // Green color
        fillColor: '#00ff00',
        fillOpacity: 0.2,
        weight: 2
    }).addTo(map).bindPopup(`
        <div class="safe-zone-popup">
            <h3 class="text-lg font-bold mb-2">Safe Zone</h3>
            <img src="{{ asset('Aerial-of-Butuan-City.jpg') }}" alt="Safe Zone" class="w-full h-auto rounded-lg mb-2">
            <p class="text-sm">This area has been designated as a safe zone for monster sightings.</p>
        </div>
    `, {
        maxWidth: 300,
        className: 'safe-zone-popup'
    });
    
    // Add zoom control to the bottom right
    L.control.zoom({
        position: 'bottomright'
    }).addTo(map);

    // Ensure map resizes correctly when window is resized
    window.addEventListener('resize', function() {
        map.invalidateSize();
    });

    // Add tile layer with noWrap option to prevent infinite scrolling
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    noWrap: true // Prevent infinite scrolling
}).addTo(map);
    
    // Add dark mode styling to map container
    document.getElementById('map').classList.add('dark');
    document.getElementById('map').style.backgroundColor = '#1a1a1a';
    
    // Fullscreen toggle functionality
    const fullscreenToggleBtn = document.getElementById('fullscreen-toggle-btn');
    // Set initial tooltip
    fullscreenToggleBtn.setAttribute('title', 'Hide Sidebar');
    const mapContainer = document.getElementById('map-container');
    const mapElement = document.getElementById('map');
    const sidebar = document.querySelector('.fixed.left-0.top-0.h-full');
    const mainContent = document.querySelector('.flex-1.ml-72');
    const header = document.querySelector('.fixed.top-0.left-72.right-0');
    
    // Track windowed fullscreen state
    let isWindowedFullscreen = false;
    
    // Function to toggle windowed fullscreen
    function toggleWindowedFullscreen() {
        if (isWindowedFullscreen) {
            // Exit windowed fullscreen - show sidebar
            sidebar.style.display = '';
            mainContent.classList.remove('ml-0');
            mainContent.classList.add('ml-72');
            header.classList.remove('left-0');
            header.classList.add('left-72');
            mapContainer.classList.remove('left-0');
            mapContainer.classList.add('left-72');
            fullscreenToggleBtn.setAttribute('title', 'Hide Sidebar');
            fullscreenToggleBtn.querySelector('svg').innerHTML = '<path d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 01-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 011.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v3h3a1 1 0 110 2H13a1 1 0 01-1-1z" />';
        } else {
            // Enter windowed fullscreen - hide sidebar
            sidebar.style.display = 'none';
            mainContent.classList.remove('ml-72');
            mainContent.classList.add('ml-0');
            header.classList.remove('left-72');
            header.classList.add('left-0');
            mapContainer.classList.remove('left-72');
            mapContainer.classList.add('left-0');
            fullscreenToggleBtn.setAttribute('title', 'Show Sidebar');
            fullscreenToggleBtn.querySelector('svg').innerHTML = '<path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2H4a1 1 0 01-1-1v-4zm9 1a1 1 0 011 1v3h3a1 1 0 110 2H13a1 1 0 01-1-1z" />';
        }
        
        isWindowedFullscreen = !isWindowedFullscreen;
        
        // Trigger a resize event to make sure the map adjusts properly
        window.dispatchEvent(new Event('resize'));
        map.invalidateSize();
    }
    
    fullscreenToggleBtn.addEventListener('click', function() {
        toggleWindowedFullscreen();
    });
    
    // Get URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const focusId = urlParams.get('focus');
    const focusLat = urlParams.get('lat');
    const focusLng = urlParams.get('lng');
    
    // If focus parameters are present, center map on that location
    if (focusLat && focusLng) {
        map.setView([parseFloat(focusLat), parseFloat(focusLng)], 16);
    } else {
        // Center the map on a more global view
        map.setView([20, 0], 2);
    }
    
    // Create custom icons based on monster categories
    const icons = {
        'Aquatic': L.icon({
            iconUrl: '/img/marker-aquatic.png',
            iconSize: [41, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34]
        }),
        'Terrestrial': L.icon({
            iconUrl: '/img/marker-terrestrial.png',
            iconSize: [41,41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34]
        }),
        'Aerial': L.icon({
            iconUrl: '/img/marker-aerial.png',
            iconSize: [41, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34]
        }),
        'Paranormal': L.icon({
            iconUrl: '/img/marker-paranormal.png',
            iconSize: [41, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34]
        }),
        'sighting': L.icon({
            iconUrl: '/marker-sighting.png',
            iconSize: [38, 38],
            iconAnchor: [12, 38],
            popupAnchor: [1, -34]
        }),
        'user-location': L.icon({
            iconUrl: '/img/marker-user.svg',
            iconSize: [41, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34]
        })
    };
    
    // Store all markers for filtering
    let allMonsterMarkers = [];
    let allSightingMarkers = [];
    let userLocationMarker = null;
    let isFirstLocation = true; // Add flag to track first location

    // Automatically start tracking user location when map loads
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(
            // Success callback
            function(position) {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                
                // Remove existing user location marker if any
                if (userLocationMarker) {
                    map.removeLayer(userLocationMarker);
                }
                
                // Create a new marker for user location
                userLocationMarker = L.marker([lat, lng], {
                    icon: icons['user-location']
                }).addTo(map);
                
                // Get location name using reverse geocoding
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
                    .then(response => response.json())
                    .then(data => {
                        // Extract relevant location information
                        const locationName = data.display_name.split(', ').slice(0, 3).join(', ');
                        // Add popup to marker with location name
                        userLocationMarker.bindPopup(`<div class="monster-popup">
                            <h3>Your Current Location</h3>
                            <p><strong>Location:</strong> ${locationName}</p>
                            <p><strong>Coordinates:</strong> ${lat.toFixed(6)}, ${lng.toFixed(6)}</p>
                        </div>`);
                    })
                    .catch(error => {
                        console.error('Error getting location name:', error);
                        // Add popup with just coordinates if reverse geocoding fails
                        userLocationMarker.bindPopup(`<div class="monster-popup">
                            <h3>Your Current Location</h3>
                            <p><strong>Coordinates:</strong> ${lat.toFixed(6)}, ${lng.toFixed(6)}</p>
                        </div>`);
                    });
                
                // Only center map on first location
                if (isFirstLocation) {
                    map.setView([lat, lng], 16, {
                        animate: true,
                        duration: 0.5
                    });
                    isFirstLocation = false;
                }
            },
            // Error callback
            function(error) {
                console.error('Error getting location:', error);
            },
            // Options
            {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            }
        );
    }
    
    // Load monster markers from monsters table
    fetch('/monster-locations')
        .then(response => response.json())
        .then(monsters => {
            // Add monsters to the map
            monsters.forEach(monster => {
                // Choose icon based on category or use Terrestrial as fallback
                const icon = icons[monster.category] || icons['Terrestrial'];
                
                // Create marker
                const marker = L.marker([monster.lat, monster.lng], {icon: icon}).addTo(map);
                
                // Store marker reference
                allMonsterMarkers.push({
                    marker: marker,
                    category: monster.category || 'Unknown'
                });
                
                // Create popup content with monster details
                const popupContent = `
                    <div class="monster-popup">
                        <h3>${monster.name}</h3>
                        <p><strong>Category:</strong> ${monster.category}</p>
                        <p><strong>Danger Level:</strong> ${monster.danger_level}</p>
                        <p><strong>Sightings:</strong> ${monster.sightings}</p>
                        <p>${monster.description.substring(0, 100)}...</p>
                        <a href="{{ url('/monsters/') }}/${monster.id}" class="text-blue-500 hover:underline">View Details</a>
                    </div>
                `;
                
                // Bind popup to marker
                marker.bindPopup(popupContent);

                // Add radar pulsing effect behind level 5 monster markers
                if (monster.danger_level == 5) {
                    const radarContainer = document.createElement('div');
                    radarContainer.className = 'radar-container';
                    radarContainer.innerHTML = `
                        <div class="radar-core"></div>
                        <div class="radar-pulse"></div>
                        <div class="radar-pulse-delayed"></div>
                    `;
                    
                    // Create a custom icon with the radar effect
                    const radarIcon = L.divIcon({
                        className: 'radar-marker',
                        html: radarContainer.outerHTML,
                        iconSize: [41, 41],
                        iconAnchor: [13, 41] // Center horizontally, align with bottom of pin
                    });
                    
                    // Create a new marker with the radar effect
                    const radarMarker = L.marker([monster.lat, monster.lng], {
                        icon: radarIcon,
                        zIndexOffset: -1000 // Position behind the monster marker
                    }).addTo(map);
                    
                    // Store radar marker reference
                    allMonsterMarkers.push({
                        marker: radarMarker,
                        category: monster.category || 'Unknown'
                    });
                }
            });
        })
        .catch(error => {
            console.error('Error loading monster locations:', error);
        });
    
    // Load sighting markers from sightings table
    fetch('/monster-sightings-locations')
        .then(response => response.json())
        .then(sightings => {
            // Add sightings to the map
            sightings.forEach(sighting => {
                // Use category icon for verified sightings, otherwise use sighting icon
                const icon = sighting.verified ? 
                    (icons[sighting.category] || icons['Terrestrial']) : 
                    icons['sighting'];
                
                // Format the date for display
                const sightingDate = new Date(sighting.sighting_time).toLocaleString();
                
                // Create marker
                const marker = L.marker([sighting.lat, sighting.lng], {icon: icon}).addTo(map);
                
                // Store marker reference
                allSightingMarkers.push({
                    marker: marker,
                    category: sighting.category || 'Unknown',
                    verified: sighting.verified
                });
                
                // Create popup content with sighting details
                const popupContent = `
                    <div class="monster-popup">
                        <h3>${sighting.monster_name}</h3>
                        <p><strong>Category:</strong> ${sighting.category}</p>
                        <p><strong>Danger Level:</strong> ${sighting.danger_level}</p>
                        <p><strong>Location:</strong> ${sighting.location_name || 'Unknown'}</p>
                        <p><strong>Reported on:</strong> ${sightingDate}</p>
                        <p><strong>Reported by:</strong> ${sighting.user_name || 'Anonymous'}</p>
                        <p><strong>Status:</strong> ${sighting.verified ? '<span class="text-green-500">Verified</span>' : '<span class="text-yellow-500">Pending</span>'}</p>
                        <p>${sighting.description.substring(0, 100)}${sighting.description.length > 100 ? '...' : ''}</p>
                        <a href="{{ url('/community-reports') }}?focus=${sighting.id}" class="text-blue-500 hover:underline">View Details</a>
                    </div>
                `;
                
                // Bind popup to marker
                marker.bindPopup(popupContent);

                // Add radar pulsing effect behind level 5 sightings
                if (sighting.danger_level == 5) {
                    const radarContainer = document.createElement('div');
                    radarContainer.className = 'radar-container';
                    radarContainer.innerHTML = `
                        <div class="radar-core"></div>
                        <div class="radar-pulse"></div>
                        <div class="radar-pulse-delayed"></div>
                    `;
                    
                    // Create a custom icon with the radar effect
                    const radarIcon = L.divIcon({
                        className: 'radar-marker',
                        html: radarContainer.outerHTML,
                        iconSize: [41, 41],
                        iconAnchor: [13, 41] // Center horizontally, align with bottom of pin
                    });
                    
                    // Create a new marker with the radar effect
                    const radarMarker = L.marker([sighting.lat, sighting.lng], {
                        icon: radarIcon,
                        zIndexOffset: -1000 // Position behind the monster marker
                    }).addTo(map);
                    
                    // Store radar marker reference
                    allSightingMarkers.push({
                        marker: radarMarker,
                        category: sighting.category || 'Unknown',
                        verified: sighting.verified
                    });
                }

                // If this is the focused sighting, center map but don't open popup
                if (focusId && sighting.id.toString() === focusId) {
                    map.setView([sighting.lat, sighting.lng], 16, {
                        animate: true,
                        duration: 0.5
                    });
                }
            });
        })
        .catch(error => {
            console.error('Error loading monster sighting locations:', error);
        });
        
    // Sighting mode functionality
    let sightingMode = false;
    let currentMarker = null;
    
    // Elements
    const reportButton = document.getElementById('report-sighting-btn');
    const sightingModeIndicator = document.getElementById('sighting-mode-indicator');
    const sightingFormContainer = document.getElementById('sighting-form-container');
    const closeFormBtn = document.getElementById('close-form-btn');
    const resetPinBtn = document.getElementById('reset-pin-btn');
    const submitSightingBtn = document.getElementById('submit-sighting-btn');
    const latInput = document.getElementById('lat');
    const lngInput = document.getElementById('lng');
    
    // Handle Report Sighting button click
    reportButton.addEventListener('click', function() {
        // Toggle sighting mode
        sightingMode = !sightingMode;
        
        if (sightingMode) {
            // Activate sighting mode
            sightingModeIndicator.classList.remove('hidden');
            // Change cursor to crosshair on map
            document.getElementById('map').style.cursor = 'crosshair';
        } else {
            // Deactivate sighting mode
            sightingModeIndicator.classList.add('hidden');
            // Reset cursor
            document.getElementById('map').style.cursor = '';
            
            // If no pin was placed, hide the form
            if (!currentMarker) {
                sightingFormContainer.classList.add('hidden');
            }
        }
    });
    
    // Handle map click to place pin
    map.on('click', function(e) {
        if (!sightingMode) return;
        
        // Get lat/lng from click
        const lat = e.latlng.lat;
        const lng = e.latlng.lng;
        
        // Remove existing marker if any
        if (currentMarker) {
            map.removeLayer(currentMarker);
        }
        
        // Create a new marker
        currentMarker = L.marker([lat, lng], {
            icon: L.icon({
                iconUrl: '/marker-new.png', // Create this icon
                iconSize: [41, 41],
                iconAnchor: [12, 41]
            }),
            draggable: true // Allow marker to be repositioned by dragging
        }).addTo(map);
        
        // Update form coordinates when marker is placed or dragged
        function updateCoordinates(marker) {
            const position = marker.getLatLng();
            latInput.value = position.lat;
            lngInput.value = position.lng;
            submitSightingBtn.disabled = false;
            
            // Get location name using reverse geocoding
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${position.lat}&lon=${position.lng}`)
                .then(response => response.json())
                .then(data => {
                    // Extract relevant location information
                    const locationName = data.display_name.split(', ').slice(0, 3).join(', ');
                    document.getElementById('location_name').value = locationName;
                })
                .catch(error => {
                    console.error('Error getting location name:', error);
                    document.getElementById('location_name').value = 'Location not found';
                });
        }
        
        // Set initial coordinates
        updateCoordinates(currentMarker);
        
        // Update coordinates when marker is dragged
        currentMarker.on('dragend', function() {
            updateCoordinates(currentMarker);
            // Center map on the marker when dragged
            map.setView(currentMarker.getLatLng(), map.getZoom());
        });
        
        // Show the form container
        sightingFormContainer.classList.remove('hidden');
        
        // Center the map on the new marker with a smooth animation
        map.setView([lat, lng], map.getZoom(), {
            animate: true,
            duration: 0.5
        });
        
        // Exit sighting mode after placing pin
        sightingMode = false;
        sightingModeIndicator.classList.add('hidden');
        document.getElementById('map').style.cursor = '';
    });
    
    // Close form button
    closeFormBtn.addEventListener('click', function() {
        sightingFormContainer.classList.add('hidden');
        
        // Also remove the marker if form is closed
        if (currentMarker) {
            map.removeLayer(currentMarker);
            currentMarker = null;
        }
        
        // Reset form
        document.getElementById('monster-sighting-form').reset();
        submitSightingBtn.disabled = true;

        // Reset the time input
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        
        document.getElementById('sighting_time').value = `${year}-${month}-${day}T${hours}:${minutes}`;
    });
    
    // Reset pin button
    resetPinBtn.addEventListener('click', function() {
        if (currentMarker) {
            map.removeLayer(currentMarker);
            currentMarker = null;
        }
        
        // Clear coordinate inputs and disable submit button
        latInput.value = '';
        lngInput.value = '';
        submitSightingBtn.disabled = true;
        
        // Reset the time input
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        
        document.getElementById('sighting_time').value = `${year}-${month}-${day}T${hours}:${minutes}`;
        
        // Reactivate sighting mode to place a new pin
        sightingMode = true;
        sightingModeIndicator.classList.remove('hidden');
        document.getElementById('map').style.cursor = 'crosshair';
    });
    
    // Set current date and time for the sighting_time input
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    
    document.getElementById('sighting_time').value = `${year}-${month}-${day}T${hours}:${minutes}`;

    // Add these functions for image handling
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
                    
                    // Now call the preview function with the resized image
                    previewResizedImage(inputElement);
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
    
    window.previewImage = function(input) {
        // First resize the image if needed
        if (input.files && input.files[0]) {
            // If file is larger than 2MB, resize it
            if (input.files[0].size > 2 * 1024 * 1024) {
                resizeImageBeforeUpload(input);
            } else {
                // If file is already small enough, just preview it
                previewResizedImage(input);
            }
        }
    };
    
    function previewResizedImage(input) {
        const preview = document.getElementById('preview');
        const imagePreview = document.getElementById('image-preview');
        const imageLabel = document.getElementById('image-label');
        const descriptionTextarea = document.getElementById('description');
        const monsterNameInput = document.getElementById('monster_name');
        const categorySelect = document.getElementById('category');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                imagePreview.classList.remove('hidden');
                imageLabel.textContent = input.files[0].name;

                // Only show loading states if category is selected
                if (categorySelect.value) {
                    // Show loading states
                    monsterNameInput.value = 'Generating name...';
                    descriptionTextarea.value = 'Analyzing image...';
                    monsterNameInput.classList.add('animate-pulse');
                    descriptionTextarea.classList.add('animate-pulse');

                    // Optimize image size before sending to API
                    const img = new Image();
                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');
                        
                        // Set maximum dimensions
                        const maxWidth = 800;
                        const maxHeight = 800;
                        
                        // Calculate new dimensions
                        let width = img.width;
                        let height = img.height;
                        
                        if (width > height) {
                            if (width > maxWidth) {
                                height = Math.round((height * maxWidth) / width);
                                width = maxWidth;
                            }
                        } else {
                            if (height > maxHeight) {
                                width = Math.round((width * maxHeight) / height);
                                height = maxHeight;
                            }
                        }
                        
                        // Resize image
                        canvas.width = width;
                        canvas.height = height;
                        ctx.drawImage(img, 0, 0, width, height);
                        
                        // Convert to base64 with reduced quality
                        const base64Image = canvas.toDataURL('image/jpeg', 0.7).split(',')[1];

                        // First, get the monster name
                        fetch('https://openrouter.ai/api/v1/chat/completions', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Authorization': 'Bearer {{ env("OPENROUTER_API_KEY") }}',
                                'HTTP-Referer': window.location.origin,
                                'X-Title': 'Monster Sighting App'
                            },
                            body: JSON.stringify({
                                model: 'shisa-ai/shisa-v2-llama3.3-70b:free',
                                messages: [
                                    {
                                        role: 'user',
                                        content: [
                                            {
                                                type: 'text',
                                                text: `Based on this image and the category "${categorySelect.value}", create a unique and fitting name for this monster. The name should be like memes, brainrot name and modern funny name for its appearance and category. Return only the name, nothing else.`
                                            },
                                            {
                                                type: 'image_url',
                                                image_url: {
                                                    url: `data:image/jpeg;base64,${base64Image}`
                                                }
                                            }
                                        ]
                                    }
                                ]
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.choices && data.choices[0]) {
                                const monsterName = data.choices[0].message.content.trim();
                                monsterNameInput.value = monsterName;
                                monsterNameInput.classList.remove('animate-pulse');

                                // Then, get the description
                                return fetch('https://openrouter.ai/api/v1/chat/completions', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Authorization': 'Bearer {{ env("OPENROUTER_API_KEY") }}',
                                        'HTTP-Referer': window.location.origin,
                                        'X-Title': 'Monster Sighting App'
                                    },
                                    body: JSON.stringify({
                                        model: 'shisa-ai/shisa-v2-llama3.3-70b:free',
                                        messages: [
                                            {
                                                role: 'user',
                                                content: [
                                                    {
                                                        type: 'text',
                                                        text: `Describe this monster sighting in detail. The monster is named ${monsterName}, is of category "${categorySelect.value}", and was sighted at ${document.getElementById('location_name').value}. Include physical characteristics, behavior, and any notable features. Make it sound like a real eyewitness account. Keep it concise but descriptive.make sure only the description will show and make the description start in like you describe the monster and where are you when you saw it and what are you doing in that location`
                                                    },
                                                    {
                                                        type: 'image_url',
                                                        image_url: {
                                                            url: `data:image/jpeg;base64,${base64Image}`
                                                        }
                                                    }
                                                ]
                                            }
                                        ]
                                    })
                                });
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.choices && data.choices[0]) {
                                const description = data.choices[0].message.content.trim();
                                descriptionTextarea.value = description;
                                descriptionTextarea.classList.remove('animate-pulse');
                            }
                        })
                        .catch(error => {
                            console.error('Error generating content:', error);
                            monsterNameInput.value = 'Failed to generate name';
                            descriptionTextarea.value = 'Failed to generate description from image';
                            monsterNameInput.classList.remove('animate-pulse');
                            descriptionTextarea.classList.remove('animate-pulse');
                        });
                    };
                    img.src = e.target.result;
                } else {
                    // If no category is selected, show a message
                    monsterNameInput.value = 'Please select a category first';
                    descriptionTextarea.value = 'Please select a category to analyze the image';
                }
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Add event listener for category changes
    document.getElementById('category').addEventListener('change', function() {
        const imageInput = document.getElementById('image');
        if (imageInput.files && imageInput.files[0]) {
            // If an image is already selected, trigger the preview function again
            previewImage(imageInput);
        }
    });

    window.removeImage = function() {
        const input = document.getElementById('image');
        const preview = document.getElementById('preview');
        const imagePreview = document.getElementById('image-preview');
        const imageLabel = document.getElementById('image-label');
        const descriptionTextarea = document.getElementById('description');
        const monsterNameInput = document.getElementById('monster_name');
        
        input.value = '';
        preview.src = '';
        imagePreview.classList.add('hidden');
        imageLabel.textContent = 'Choose Image';
        descriptionTextarea.value = ''; // Clear the description when image is removed
        monsterNameInput.value = ''; // Clear the monster name when image is removed
    }

    // Legend toggle functionality
    const toggleLegendBtn = document.getElementById('toggle-legend');
    const legendContent = toggleLegendBtn.closest('div.bg-gray-800').querySelectorAll('div:not(:last-child)');
    
    toggleLegendBtn.addEventListener('click', function() {
        // Toggle visibility of legend content
        legendContent.forEach(item => {
            item.classList.toggle('hidden');
        });
        
        // Update button text and icon
        if (toggleLegendBtn.innerText.includes('Hide')) {
            toggleLegendBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2H4a1 1 0 01-1-1v-4zm9 1a1 1 0 011 1v3h3a1 1 0 110 2H13a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
                Show Legend
            `;
            toggleLegendBtn.closest('div.bg-gray-800').classList.add('bg-opacity-70');
            toggleLegendBtn.closest('div.bg-gray-800').classList.remove('bg-opacity-90');
        } else {
            toggleLegendBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
                Hide Legend
            `;
            toggleLegendBtn.closest('div.bg-gray-800').classList.remove('bg-opacity-70');
            toggleLegendBtn.closest('div.bg-gray-800').classList.add('bg-opacity-90');
        }
    });

    // Category filter functionality
    const categoryFilters = document.querySelectorAll('.category-filter');
    const showAllCategoriesBtn = document.getElementById('show-all-categories');
    
    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            const category = filter.getAttribute('data-category');
            
            // Hide all markers
            allMonsterMarkers.forEach(marker => {
                marker.marker.remove();
            });
            allSightingMarkers.forEach(marker => {
                marker.marker.remove();
            });
            
            if (category === 'sighting') {
                // For sighting category, only show unverified sightings
                allSightingMarkers.forEach(marker => {
                    if (marker.verified === false) {
                        marker.marker.addTo(map);
                    }
                });
            } else {
                // Show only markers of the selected category
                allMonsterMarkers.forEach(marker => {
                    if (marker.category === category) {
                        marker.marker.addTo(map);
                    }
                });
                allSightingMarkers.forEach(marker => {
                    if (marker.category === category && marker.verified === true) {
                        marker.marker.addTo(map);
                    }
                });
            }
        });
    });
    
    showAllCategoriesBtn.addEventListener('click', function() {
        // Show all markers
        allMonsterMarkers.forEach(marker => {
            marker.marker.addTo(map);
        });
        allSightingMarkers.forEach(marker => {
            marker.marker.addTo(map);
        });
    });
    
    // User location functionality
    const toggleLocationBtn = document.getElementById('toggle-location');
    const centerOnLocationBtn = document.getElementById('center-on-location');
    let isUserLocationVisible = true; // Default to visible
    
    toggleLocationBtn.addEventListener('click', function() {
        if (userLocationMarker) {
            if (isUserLocationVisible) {
                // Hide user location
                map.removeLayer(userLocationMarker);
                toggleLocationBtn.classList.add('opacity-50');
            } else {
                // Show user location
                userLocationMarker.addTo(map);
                toggleLocationBtn.classList.remove('opacity-50');
            }
            isUserLocationVisible = !isUserLocationVisible;
        } else {
            // If location hasn't been obtained yet, try to get it
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    // Success callback
                    function(position) {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;
                        
                        // Create a new marker for user location
                        userLocationMarker = L.marker([lat, lng], {
                            icon: icons['user-location']
                        }).addTo(map);
                        
                        // Add popup to marker
                        userLocationMarker.bindPopup('Your current location');
                        
                        isUserLocationVisible = true;
                        toggleLocationBtn.classList.remove('opacity-50');
                    },
                    // Error callback
                    function(error) {
                        console.error('Error getting location:', error);
                        alert('Unable to get your location. Please check your browser permissions.');
                    }
                );
            } else {
                alert('Geolocation is not supported by your browser.');
            }
        }
    });
    
    centerOnLocationBtn.addEventListener('click', function() {
        if (userLocationMarker) {
            // Get the current position of the user location marker
            const latlng = userLocationMarker.getLatLng();
            
            // Center the map on the user's location
            map.setView(latlng, 16, {
                animate: true,
                duration: 0.5
            });
            
            // Make sure the marker is visible
            if (!isUserLocationVisible) {
                userLocationMarker.addTo(map);
                isUserLocationVisible = true;
                toggleLocationBtn.classList.remove('opacity-50');
            }
        } else {
            // If location hasn't been obtained yet, try to get it and center
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    // Success callback
                    function(position) {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;
                        
                        // Create a new marker for user location if it doesn't exist
                        userLocationMarker = L.marker([lat, lng], {
                            icon: icons['user-location']
                        }).addTo(map);
                        
                        // Add popup to marker
                        userLocationMarker.bindPopup('Your current location');
                        
                        // Center the map on the user's location
                        map.setView([lat, lng], 16, {
                            animate: true,
                            duration: 0.5
                        });
                        
                        isUserLocationVisible = true;
                        toggleLocationBtn.classList.remove('opacity-50');
                    },
                    // Error callback
                    function(error) {
                        console.error('Error getting location:', error);
                        alert('Unable to get your location. Please check your browser permissions.');
                    }
                );
            } else {
                alert('Geolocation is not supported by your browser.');
            }
        }
    });

    // Add safe zones array
    const safeZones = [
        {
            name: "Butuan City",
            center: [8.9475, 125.5406],
            radius: 10000,
            image: "Aerial-of-Butuan-City.jpg"
        },
        {
            name: "Cebu City",
            center: [10.3157, 123.8854],
            radius: 10000,
            image: "images.jfif"
        },
        {
            name: "Davao City",
            center: [7.0736, 125.6110],
            radius: 10000,
            image: "Davao-City-Coastal-line.jpg"
        },
        {
            name: "Manila",
            center: [14.5995, 120.9842],
            radius: 10000,
            image: "pexels-pixabay-210367.jpg"
        }
    ];

    // Add safe zone circles
    safeZones.forEach(zone => {
        L.circle(zone.center, {
            radius: zone.radius,
            color: '#00ff00', // Green color
            fillColor: '#00ff00',
            fillOpacity: 0.2,
            weight: 2
        }).addTo(map).bindPopup(`
            <div class="safe-zone-popup">
                <h3 class="text-lg font-bold mb-2">${zone.name} Safe Zone</h3>
                <img src="{{ asset('${zone.image}') }}" alt="${zone.name} Safe Zone" class="w-full h-auto rounded-lg mb-2">
                <p class="text-sm">This area has been designated as a safe zone for monster sightings.</p>
            </div>
        `, {
            maxWidth: 300,
            className: 'safe-zone-popup'
        });
    });

    // Add safe zone navigation functionality
    document.querySelectorAll('.safe-zone-button').forEach(button => {
        button.addEventListener('click', function() {
            const zoneName = this.getAttribute('data-zone');
            const zone = safeZones.find(z => z.name.includes(zoneName));
            if (zone) {
                // Set zoom level to 11 which works well for showing the 10km radius circle
                map.setView(zone.center, 12, {
                    animate: true,
                    duration: 1
                });
            }
        });
    });
});
    </script>

<style>
    /* Fullscreen transition effect */
    .fixed.left-0.top-0.h-full,
    .flex-1.ml-72,
    .flex-1.ml-0 {
        transition: all 0.3s ease-in-out;
    }
    
    .monster-popup h3 {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
        color: #4b5563;
    }
    
    .monster-popup p {
        margin-bottom: 0.25rem;
    }
    
    .monster-popup a {
        display: inline-block;
        margin-top: 0.5rem;
    }
    
    /* Animation for sighting mode indicator */
    @keyframes pulse {
        0% { opacity: 1; }
        50% { opacity: 0.5; }
        100% { opacity: 1; }
    }
    
    .animate-pulse {
        animation: pulse 2s infinite;
    }

    /* Add styles for the description textarea */
    #description {
        transition: all 0.3s ease;
    }

    #description.animate-pulse {
        background-color: rgba(75, 85, 99, 0.5);
        color: #9CA3AF;
    }
    
    /* Style for the My Location control */
    .leaflet-control-location {
        background-color: white;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        text-decoration: none;
        color: #3388ff;
        display: block;
    }
    
    .leaflet-control-location:hover {
        background-color: #f4f4f4;
    }
    
    /* Hide scrollbar but maintain scrolling functionality */
    html, body {
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE and Edge */
    }
    
    html::-webkit-scrollbar, 
    body::-webkit-scrollbar,
    div::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Opera */
        width: 0;
    }

    /* Radar pulsing effect for level 5 monsters */
    .radar-container {
        position: relative;
        width: 41px;  /* Match the icon size */
        height: 41px; /* Match the icon size */
    }
    
    .radar-core {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 41px;
        height: 41px;
        background: transparent;
        border-radius: 50%;
        z-index: 2;
    }
    
    .radar-pulse {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 41px;
        height: 41px;
        border-radius: 50%;
        background-color: rgba(231, 76, 60, 0.7);
        animation: radar-pulse 2s infinite cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    @keyframes radar-pulse {
        0% {
            transform: translate(-50%, -50%) scale(1);
            opacity: 0.7;
        }
        70% {
            transform: translate(-50%, -50%) scale(3);
            opacity: 0;
        }
        100% {
            transform: translate(-50%, -50%) scale(3);
            opacity: 0;
        }
    }
    
    /* Add a second pulse with delay for more realistic effect */
    .radar-pulse-delayed {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 41px;
        height: 41px;
        border-radius: 50%;
        background-color: rgba(231, 76, 60, 0.5);
        animation: radar-pulse 2s infinite cubic-bezier(0.25, 0.46, 0.45, 0.94);
        animation-delay: 1s;
    }

    .radar-marker {
        background: transparent !important;
        border: none !important;
    }
</style>
</x-app-layout>