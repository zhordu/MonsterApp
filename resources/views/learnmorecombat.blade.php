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

        <!-- Main Content Area - Combat Tactics -->
        <div class="flex-1 ml-72 p-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-white mb-2">Combat Tactics</h1>
                <p class="text-gray-400">When running isn't an option: how to defend yourself against monsters</p>
            </div>

            <!-- Breadcrumb Navigation -->
            <div class="flex items-center text-sm text-gray-500 mb-8">
                <a href="/dashboard" class="hover:text-white">Dashboard</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="/survival-guide" class="hover:text-white">Survival Guide</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-white">Combat Tactics</span>
            </div>

            <!-- Warning Banner -->
            <div class="bg-red-900/30 border border-red-700 rounded-lg p-4 mb-8 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-3 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <div>
                    <h3 class="text-red-400 font-semibold mb-1">Combat Should Be Your Last Resort</h3>
                    <p class="text-gray-300 text-sm">Whenever possible, evade monsters rather than engaging them. The tactics described here should only be used when escape is not an option. Your primary goal is always survival, not victory.</p>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                <!-- Left Column - Table of Contents -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 sticky top-8">
                        <h3 class="text-lg font-bold text-white mb-4">Quick Navigation</h3>
                        <ul class="space-y-3 text-gray-300">
                            <li>
                                <a href="#general-principles" class="flex items-center hover:text-red-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    General Principles
                                </a>
                            </li>
                            <li>
                                <a href="#weapons-effectiveness" class="flex items-center hover:text-red-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    Weapons Effectiveness
                                </a>
                            </li>
                            <li>
                                <a href="#monster-weak-points" class="flex items-center hover:text-red-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    Monster Weak Points
                                </a>
                            </li>
                            <li>
                                <a href="#improvised-weapons" class="flex items-center hover:text-red-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    Improvised Weapons
                                </a>
                            </li>
                            <li>
                                <a href="#defensive-tactics" class="flex items-center hover:text-red-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                    </svg>
                                    Defensive Tactics
                                </a>
                            </li>
                            <li>
                                <a href="#group-combat" class="flex items-center hover:text-red-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Group Combat Strategies
                                </a>
                            </li>
                            <li>
                                <a href="#after-combat" class="flex items-center hover:text-red-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    After Combat Care
                                </a>
                            </li>
                        </ul>
                        
                        <div class="mt-8 pt-6 border-t border-gray-700">
                            <h4 class="text-white font-medium mb-3">Need Expert Help?</h4>
                            <a href="/combat-training" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded w-full block text-center font-medium">
                                Find Combat Training
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Main Content -->
                <div class="lg:col-span-2">
                    <!-- General Principles Section -->
                    <section id="general-principles" class="mb-12">
                        <h2 class="text-2xl font-bold text-white mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            General Principles
                        </h2>
                        
                        <div class="bg-gray-800 rounded-lg p-6 mb-6">
                            <p class="text-gray-300 mb-4">When faced with a monster encounter where escape is impossible, remember these key principles:</p>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div class="bg-gray-700 rounded-lg p-4">
                                    <h4 class="text-white font-semibold mb-2 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Stay Calm
                                    </h4>
                                    <p class="text-gray-300 text-sm">Panic dulls your senses and leads to mistakes. Control your breathing and focus on survival.</p>
                                </div>
                                
                                <div class="bg-gray-700 rounded-lg p-4">
                                    <h4 class="text-white font-semibold mb-2 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Assess the Threat
                                    </h4>
                                    <p class="text-gray-300 text-sm">Quickly identify the monster type to determine weak points and effective tactics.</p>
                                </div>
                                
                                <div class="bg-gray-700 rounded-lg p-4">
                                    <h4 class="text-white font-semibold mb-2 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Use Your Environment
                                    </h4>
                                    <p class="text-gray-300 text-sm">Find defensive positions, obstacles, and potential weapons in your surroundings.</p>
                                </div>
                                
                                <div class="bg-gray-700 rounded-lg p-4">
                                    <h4 class="text-white font-semibold mb-2 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Conserve Energy
                                    </h4>
                                    <p class="text-gray-300 text-sm">Fight defensively and look for opportunities rather than exhausting yourself with constant attacks.</p>
                                </div>
                            </div>
                            
                            <div class="bg-red-900/30 border border-red-700 rounded-lg p-4">
                                <h4 class="text-red-400 font-semibold mb-2">Remember:</h4>
                                <p class="text-gray-300 text-sm">Your goal is to survive, not to "win" the fight. If an opportunity to escape presents itself during combat, take it immediately. A tactical retreat is always preferable to an uncertain victory.</p>
                            </div>
                        </div>
                    </section>
                    
                    <!-- Weapons Effectiveness Section -->
                    <section id="weapons-effectiveness" class="mb-12">
                        <h2 class="text-2xl font-bold text-white mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Weapons Effectiveness
                        </h2>
                        
                        <div class="bg-gray-800 rounded-lg p-6 mb-6">
                            <p class="text-gray-300 mb-6">Different monsters have varying vulnerabilities to different weapon types. This chart shows general effectiveness against common monster categories:</p>
                            
                            <div class="overflow-x-auto">
                                <table class="w-full border-collapse mb-4">
                                    <thead>
                                        <tr class="bg-gray-700">
                                            <th class="p-3 text-left text-white border-b border-gray-600">Monster Type</th>
                                            <th class="p-3 text-center text-white border-b border-gray-600">Blunt</th>
                                            <th class="p-3 text-center text-white border-b border-gray-600">Sharp</th>
                                            <th class="p-3 text-center text-white border-b border-gray-600">Fire</th>
                                            <th class="p-3 text-center text-white border-b border-gray-600">Metal</th>
                                            <th class="p-3 text-center text-white border-b border-gray-600">Silver</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="hover:bg-gray-700">
                                            <td class="p-3 border-b border-gray-600 text-white">Skeletal</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-green-400">High</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Low</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Low</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-green-400">Medium</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Low</td>
                                        </tr>
                                        <tr class="hover:bg-gray-700">
                                            <td class="p-3 border-b border-gray-600 text-white">Slime</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-red-400">Very Low</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-red-400">Very Low</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-green-400">High</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Low</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Low</td>
                                        </tr>
                                        <tr class="hover:bg-gray-700">
                                            <td class="p-3 border-b border-gray-600 text-white">Furred</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Low</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-green-400">High</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Medium</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-green-400">High</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Medium</td>
                                        </tr>
                                        <tr class="hover:bg-gray-700">
                                            <td class="p-3 border-b border-gray-600 text-white">Undead</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-green-400">Medium</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Low</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-green-400">High</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Medium</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-green-400">High</td>
                                        </tr>
                                        <tr class="hover:bg-gray-700">
                                            <td class="p-3 border-b border-gray-600 text-white">Flying</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Medium</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-green-400">High</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Medium</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Low</td>
                                            <td class="p-3 border-b border-gray-600 text-center text-yellow-400">Low</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <p class="text-gray-400 text-sm">Note: The effectiveness values are generalized and may vary based on specific weapon enhancements or monster variants.</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>