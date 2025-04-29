<x-app-layout>
    <div class="flex bg-gray-900 min-h-screen">
        <!-- Left-aligned Sidebar -->
        <div class="fixed left-0 top-0 h-full w-72 bg-gradient-to-b from-gray-800 to-gray-900 border-r border-gray-700 shadow-lg flex flex-col">
            <!-- Logo Section -->
            <div class="flex items-center justify-center h-20 border-b border-gray-700">
                <a href="{{ url('/dashboard') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('monster.png') }}" alt="Monster Logo" class="w-10 h-10">
                    <span class="text-xl font-bold text-white">Monster App</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="/dashboard" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl bg-gray-700 text-white hover:bg-gray-600 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="/interactiveMap" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200 group">
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
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
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

        <!-- Main Content Area with Enhanced Dashboard Analytics -->
        <div class="flex-1 ml-72 p-2">
            <!-- Dashboard Analytics Content -->
            <div id="dashboard-content" class="content-section active">
                <!-- Analytics Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-4">
                    <!-- Total Sightings Card -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg shadow-lg p-6 border border-gray-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-400 text-sm">Total Monster Reports</p>
                                <h3 class="text-3xl font-bold text-white mt-1">{{ $totalSightings }}</h3>
                                <p class="text-green-400 text-sm mt-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                                    </svg>
                                    Community Reports
                                </p>
                            </div>
                            <div class="bg-blue-500 bg-opacity-20 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Active Monsters Card -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg shadow-lg p-6 border border-gray-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-400 text-sm">Active Monsters</p>
                                <h3 class="text-3xl font-bold text-white mt-1">{{ $totalMonsters }}</h3>
                                <p class="text-red-400 text-sm mt-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12 13a1 1 0 100 2h5a1 1 0 001-1V9a1 1 0 10-2 0v2.586l-4.293-4.293a1 1 0 00-1.414 0L8 9.586 3.707 5.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0L11 9.414 14.586 13H12z" clip-rule="evenodd" />
                                    </svg>
                                    Registered in Monsterpedia
                                </p>
                            </div>
                            <div class="bg-red-500 bg-opacity-20 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Danger Level Card -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg shadow-lg p-6 border border-gray-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-400 text-sm">Average Danger Level</p>
                                <h3 class="text-3xl font-bold text-white mt-1">{{ $averageDangerLevel }}</h3>
                                @if(count($highDangerRegions) > 0)
                                <div class="mt-2 space-y-1">
                                    <p class="text-red-400 text-sm font-semibold">Extreme Level 5 Monsters:</p>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach(['Luzon', 'Visayas', 'Mindanao'] as $region)
                                            @php
                                                $extremeCount = $sightings->where(function($sighting) use ($region) {
                                                    if ($region === 'Luzon') {
                                                        return $sighting->lat > 14.0 && $sighting->danger_level == 5;
                                                    } elseif ($region === 'Visayas') {
                                                        return $sighting->lat > 10.0 && $sighting->lat <= 14.0 && $sighting->danger_level == 5;
                                                    } else {
                                                        return $sighting->lat <= 10.0 && $sighting->danger_level == 5;
                                                    }
                                                })->count();
                                            @endphp
                                            <div class="relative inline-flex">
                                                <span class="text-xs {{ $extremeCount > 0 ? 'bg-red-900 text-red-300' : 'bg-gray-700 text-gray-400' }} px-2 py-1 rounded">
                                                    {{ $region }}
                                                </span>
                                                @if($extremeCount > 0)
                                                    <span class="absolute -top-2 -right-2 h-5 w-5 bg-red-500 rounded-full flex items-center justify-center text-[10px] text-white font-bold">
                                                        {{ $extremeCount }}
                                                    </span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="bg-yellow-500 bg-opacity-20 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monster Activity Trends Section -->
                <div class="mb-4 bg-gray-800 rounded-lg shadow-lg p-3 border border-gray-700">
                    <h3 class="text-xl font-bold text-white mb-2">Monster Activity Trends</h3>
                    <div class="h-80 bg-gray-900 rounded-lg p-3">
                        <canvas id="activityChart"></canvas>
                    </div>
                    <div class="grid grid-cols-3 gap-2 mt-2">
                        <div class="bg-gray-700 p-3 rounded-lg">
                            <p class="text-gray-400 text-xs">Most Active Time</p>
                            <p class="text-white font-medium">{{ $mostActiveTime }}</p>
                        </div>
                        <div class="bg-gray-700 p-3 rounded-lg">
                            <p class="text-gray-400 text-xs">Most Common Type</p>
                            <p class="text-white font-medium">{{ $mostCommonType }}</p>
                        </div>
                        <div class="bg-gray-700 p-3 rounded-lg">
                            <p class="text-gray-400 text-xs">Peak Activity Days</p>
                            <p class="text-white font-medium">{{ $peakDays }}</p>
                        </div>
                    </div>
                    
                    <!-- Monster Level and Category Distribution Section -->
                    <div class="grid grid-cols-2 gap-4 mt-3">
                        <!-- Monster Level Distribution -->
                        <div class="bg-gray-800 rounded-lg shadow-lg p-3 border border-gray-700">
                            <h4 class="text-lg font-semibold text-white mb-3">Monster Level Distribution</h4>
                            <div class="flex items-center justify-center">
                                <div class="w-64 h-64">
                                    <canvas id="levelDistributionChart"></canvas>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Category Activity Section -->
                        <div class="bg-gray-800 rounded-lg shadow-lg p-3 border border-gray-700">
                            <h4 class="text-lg font-semibold text-white mb-3">Monster Categories Distribution</h4>
                            <div class="flex items-center justify-center">
                                <div class="w-64 h-64">
                                    <canvas id="categoryDistributionChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity and Map Section -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <!-- Recent Sightings -->
                    <div class="md:col-span-2 bg-gray-800 rounded-lg shadow-lg p-3 border border-gray-700">
                        <h3 class="text-xl font-bold text-white mb-2">Recent Sightings</h3>
                        <div class="space-y-2">
                            @foreach($recentSightings as $sighting)
                            <!-- Sighting Item -->
                            <div class="flex items-start gap-4 p-3 bg-gray-700 bg-opacity-50 rounded-lg">
                                <div class="h-12 w-12 rounded-lg 
                                    @if($sighting->danger_level == 1) bg-green-600 bg-opacity-30 text-green-400
                                    @elseif($sighting->danger_level == 2) bg-yellow-600 bg-opacity-30 text-yellow-400
                                    @elseif($sighting->danger_level == 3) bg-orange-600 bg-opacity-30 text-orange-400
                                    @elseif($sighting->danger_level == 4) bg-red-600 bg-opacity-30 text-red-400
                                    @else bg-red-800 bg-opacity-30 text-red-400
                                    @endif
                                    flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium">{{ $sighting->monster_name }}</h4>
                                    <p class="text-gray-400 text-sm">{{ $sighting->location_name ?? 'Unknown Location' }} - {{ $sighting->created_at->diffForHumans() }}</p>
                                    <div class="mt-1 flex items-center gap-2">
                                        <span class="text-xs 
                                            @if($sighting->danger_level == 1) bg-green-900 text-green-300
                                            @elseif($sighting->danger_level == 2) bg-yellow-900 text-yellow-300
                                            @elseif($sighting->danger_level == 3) bg-orange-900 text-orange-300
                                            @elseif($sighting->danger_level == 4) bg-red-900 text-red-300
                                            @else bg-red-800 text-red-300
                                            @endif
                                            px-2 py-1 rounded">Danger Level {{ $sighting->danger_level }}</span>
                                        <span class="text-xs bg-blue-900 text-blue-300 px-2 py-1 rounded">{{ $sighting->category ?? 'Unknown Category' }}</span>
                                        <span class="text-gray-400 text-xs">Reported by {{ $sighting->user->name ?? 'Anonymous' }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4 text-center">
                            <a href="/community-reports" class="text-blue-400 hover:text-blue-300 text-sm font-medium inline-flex items-center">
                                View all sightings
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Hotspot Map Preview -->
                    <div class="bg-gray-800 rounded-lg shadow-lg border border-gray-700 overflow-hidden">
                        <h3 class="text-xl font-bold text-white p-3 pb-1">Monster Hotspots</h3>
                        <div class="px-3 pb-1 text-gray-400 text-sm">Current concentration of sightings</div>
                        <div class="relative h-80 bg-gray-900">
                            <!-- Minimap container -->
                            <div id="minimap" class="w-full h-full"></div>
                        </div>
                        <div class="p-3 bg-gray-800 border-t border-gray-700">
                            <a href="/interactiveMap" class="text-blue-400 hover:text-blue-300 text-sm font-medium inline-flex items-center">
                                Open interactive map
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" 
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" 
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" 
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" 
            crossorigin=""></script>

    <!-- Add minimap initialization script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the minimap
        const minimap = L.map('minimap', {
            center: [8.5063, 125.7428], // Centered on Agusan del Sur
            zoom: 9,
            minZoom: 6,
            maxBounds: [
                [5.0, 114.0],
                [20.0, 128.0]
            ],
            maxBoundsViscosity: 1.0,
            zoomControl: false,
            attributionControl: false
        });

        // Add tile layer with noWrap option to prevent infinite scrolling
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            noWrap: true
        }).addTo(minimap);

        // Add dark mode styling to minimap container
        document.getElementById('minimap').classList.add('dark');
        document.getElementById('minimap').style.backgroundColor = '#1a1a1a';

        // Create custom icons based on monster categories
        const icons = {
            'Aquatic': L.icon({
                iconUrl: '/img/marker-aquatic.png',
                iconSize: [25, 25],
                iconAnchor: [12, 25],
                popupAnchor: [1, -20]
            }),
            'Terrestrial': L.icon({
                iconUrl: '/img/marker-terrestrial.png',
                iconSize: [25, 25],
                iconAnchor: [12, 25],
                popupAnchor: [1, -20]
            }),
            'Aerial': L.icon({
                iconUrl: '/img/marker-aerial.png',
                iconSize: [25, 25],
                iconAnchor: [12, 25],
                popupAnchor: [1, -20]
            }),
            'Paranormal': L.icon({
                iconUrl: '/img/marker-paranormal.png',
                iconSize: [25, 25],
                iconAnchor: [12, 25],
                popupAnchor: [1, -20]
            }),
            'default': L.icon({
                iconUrl: '/img/marker-default.png',
                iconSize: [25, 25],
                iconAnchor: [12, 25],
                popupAnchor: [1, -20]
            }),
            'sighting': L.icon({
                iconUrl: '/marker-sighting.png',
                iconSize: [20, 20],
                iconAnchor: [10, 20],
                popupAnchor: [1, -15]
            })
        };

        // Load and display monster markers
        fetch('/monster-locations')
            .then(response => response.json())
            .then(monsters => {
                monsters.forEach(monster => {
                    const icon = icons[monster.category] || icons['default'];
                    const marker = L.marker([monster.lat, monster.lng], {icon: icon}).addTo(minimap);
                    
                    // Create popup content with monster details
                    const popupContent = `
                        <div class="monster-popup">
                            <h3>${monster.name}</h3>
                            <p><strong>Category:</strong> ${monster.category}</p>
                            <p><strong>Danger Level:</strong> ${monster.danger_level}</p>
                            <p><strong>Sightings:</strong> ${monster.sightings}</p>
                            <p>${monster.description.substring(0, 100)}...</p>
                            <a href="/monsters/${monster.id}" class="text-blue-500 hover:underline">View Details</a>
                        </div>
                    `;
                    
                    // Bind popup to marker
                    marker.bindPopup(popupContent);
                });
            })
            .catch(error => {
                console.error('Error loading monster locations:', error);
            });

        // Load and display sighting markers
        fetch('/monster-sightings-locations')
            .then(response => response.json())
            .then(sightings => {
                sightings.forEach(sighting => {
                    const icon = sighting.verified ? 
                        (icons[sighting.category] || icons['default']) : 
                        icons['sighting'];
                    
                    // Format the date for display
                    const sightingDate = new Date(sighting.sighting_time).toLocaleString();
                    
                    const marker = L.marker([sighting.lat, sighting.lng], {icon: icon}).addTo(minimap);
                    
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
                            <a href="/community-reports?focus=${sighting.id}" class="text-blue-500 hover:underline">View Details</a>
                        </div>
                    `;
                    
                    // Bind popup to marker
                    marker.bindPopup(popupContent);
                });
            })
            .catch(error => {
                console.error('Error loading sighting locations:', error);
            });
    });
    </script>

    <!-- Add Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Activity Chart
        const ctx = document.getElementById('activityChart').getContext('2d');
        const hourlyActivity = @json($hourlyActivity);
        const labels = @json($hourlyActivityLabels);
        const data = Array.from({length: 24}, (_, i) => hourlyActivity[i] || 0);
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monster Sightings',
                    data: data,
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#9CA3AF'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#9CA3AF',
                            maxRotation: 45,
                            minRotation: 45
                        }
                    }
                }
            }
        });

        // Monster Level Distribution Donut Chart
        const levelCtx = document.getElementById('levelDistributionChart').getContext('2d');
        const levelData = {
            labels: ['Level 1', 'Level 2', 'Level 3', 'Level 4', 'Level 5'],
            datasets: [{
                data: [
                    @foreach(range(1, 5) as $level)
                        {{ $sightings->where('danger_level', $level)->count() }},
                    @endforeach
                ],
                backgroundColor: [
                    'rgb(34, 197, 94)',  // green-500
                    'rgb(234, 179, 8)',  // yellow-500
                    'rgb(249, 115, 22)', // orange-500
                    'rgb(239, 68, 68)',  // red-500
                    'rgb(185, 28, 28)'   // red-700
                ],
                borderColor: 'rgb(31, 41, 55)', // gray-800
                borderWidth: 2
            }]
        };

        new Chart(levelCtx, {
            type: 'doughnut',
            data: levelData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            color: '#9CA3AF',
                            font: {
                                size: 12,
                                family: "'Inter', sans-serif"
                            },
                            padding: 20,
                            boxWidth: 12,
                            usePointStyle: true
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                cutout: '70%'
            }
        });

        // Monster Categories Distribution Donut Chart
        const categoryCtx = document.getElementById('categoryDistributionChart').getContext('2d');
        const categoryData = {
            labels: @json($categoryActivity->keys()->toArray()),
            datasets: [{
                data: @json($categoryActivity->pluck('count')->toArray()),
                backgroundColor: [
                    'rgb(59, 130, 246)',  // blue-500
                    'rgb(168, 85, 247)',  // purple-500
                    'rgb(236, 72, 153)',  // pink-500
                    'rgb(249, 115, 22)',  // orange-500
                    'rgb(34, 197, 94)'    // green-500
                ],
                borderColor: 'rgb(31, 41, 55)', // gray-800
                borderWidth: 2
            }]
        };

        new Chart(categoryCtx, {
            type: 'doughnut',
            data: categoryData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            color: '#9CA3AF',
                            font: {
                                size: 12,
                                family: "'Inter', sans-serif"
                            },
                            padding: 20,
                            boxWidth: 12,
                            usePointStyle: true
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                cutout: '70%'
            }
        });
    });
    </script>
</x-app-layout>