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
                <a href="/dashboard" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200">
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

                <a href="/survival-guide" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl bg-gray-700 text-white hover:bg-gray-600 transition-all duration-200 group">
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

        <!-- Main Content Area - Survival Guide -->
        <div class="flex-1 ml-72 p-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-white mb-2">Monster Survival Guide</h1>
                <p class="text-gray-400">Essential knowledge to survive monster encounters</p>
            </div>

            <!-- Search Bar -->
            <div class="mb-8">
                <div class="relative">
                    <input type="text" placeholder="Search survival tips..." class="w-full bg-gray-800 text-white border border-gray-700 rounded-lg py-3 px-4 pl-12 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <div class="absolute left-4 top-3.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Guide Categories -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Category 1 -->
                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-green-500 transition-all hover:shadow-lg hover:shadow-green-900/20">
                    <div class="text-green-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Survival Basics</h3>
                    <p class="text-gray-400 mb-4">Essential knowledge for surviving your first monster encounter.</p>
                    <a href="learnmoresurvival" class="text-green-400 font-medium hover:text-green-300 flex items-center">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <!-- Category 2 -->
                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-500 transition-all hover:shadow-lg hover:shadow-red-900/20">
                    <div class="text-red-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Combat Tactics</h3>
                    <p class="text-gray-400 mb-4">When running isn't an option: how to defend yourself against monsters.</p>
                    <a href="learnmorecombat" class="text-red-400 font-medium hover:text-red-300 flex items-center">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <!-- Category 3 -->
                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-blue-500 transition-all hover:shadow-lg hover:shadow-blue-900/20">
                    <div class="text-blue-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Monster Repellents</h3>
                    <p class="text-gray-400 mb-4">Keep monsters away with these proven substances and techniques.</p>
                    <a href="learnmoremonster" class="text-blue-400 font-medium hover:text-blue-300 flex items-center">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Featured Guide -->
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-xl p-6 border border-gray-700 mb-8">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="w-full md:w-2/3">
                        <div class="flex items-center mb-4">
                            <span class="bg-green-900 text-green-300 text-xs font-medium px-2.5 py-0.5 rounded">FEATURED GUIDE</span>
                        </div>
                        <h2 class="text-2xl font-bold text-white mb-4">The Ultimate Guide to Monster Territory Navigation</h2>
                        <p class="text-gray-300 mb-6">Learn how to identify monster territories, navigate safely through danger zones, and escape if you accidentally encounter a hostile creature.</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Navigation</span>
                            <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Terrain Analysis</span>
                            <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Safety</span>
                        </div>
                        <a href="#" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-medium inline-flex items-center transition-all">
                            Read Full Guide
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    <div class="w-full md:w-1/3 flex items-center justify-center">
                        <div class="h-64 w-64 bg-gray-700 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Tips Section -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-white mb-4">Recent Survival Tips</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tip 1 -->
                    <div class="bg-gray-800 rounded-lg p-5 border border-gray-700">
                        <h3 class="text-lg font-semibold text-white mb-2">Sound Masking Techniques</h3>
                        <p class="text-gray-400 mb-4">Learn how to mask your sounds to avoid attracting noise-sensitive monsters.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">Updated 2 days ago</span>
                            <a href="#" class="text-blue-400 hover:text-blue-300 text-sm">Read More</a>
                        </div>
                    </div>
                    
                    <!-- Tip 2 -->
                    <div class="bg-gray-800 rounded-lg p-5 border border-gray-700">
                        <h3 class="text-lg font-semibold text-white mb-2">Emergency Shelter Building</h3>
                        <p class="text-gray-400 mb-4">Quick methods to build a monster-proof emergency shelter with limited resources.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">Updated 1 week ago</span>
                            <a href="#" class="text-blue-400 hover:text-blue-300 text-sm">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Community Tips -->
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-white">Community Survival Tips</h2>
                    <a href="#" class="text-sm text-blue-400 hover:text-blue-300">View All</a>
                </div>
                
                <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden">
                    <!-- Tip 1 -->
                    <div class="p-5 border-b border-gray-700">
                        <div class="flex justify-between mb-2">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-purple-600 flex items-center justify-center text-white text-sm font-bold mr-3">JS</div>
                                <span class="font-medium text-white">JohnSurviver</span>
                            </div>
                            <span class="text-xs text-gray-500">3 days ago</span>
                        </div>
                        <p class="text-gray-300 mb-3">"Always carry salt in a secure container. It's effective against slime-based creatures and can be used to create protective barriers."</p>
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905a3.61 3.61 0 01-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                            </svg>
                            <span class="mr-4">42</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            <span>8 replies</span>
                        </div>
                    </div>
                    
                    <!-- Tip 2 -->
                    <div class="p-5">
                        <div class="flex justify-between mb-2">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-green-600 flex items-center justify-center text-white text-sm font-bold mr-3">MH</div>
                                <span class="font-medium text-white">MonsterHunter99</span>
                            </div>
                            <span class="text-xs text-gray-500">1 week ago</span>
                        </div>
                        <p class="text-gray-300 mb-3">"UV lights confuse most nocturnal monsters. I recommend keeping a small UV flashlight in your emergency kit. Has saved my life twice!"</p>
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905a3.61 3.61 0 01-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                            </svg>
                            <span class="mr-4">63</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            <span>17 replies</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 