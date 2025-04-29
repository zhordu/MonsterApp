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

                <a href="/monsterpedia" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl bg-gray-700 text-white hover:bg-gray-600 transition-all duration-200 group">
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

        <!-- Main Content Area - Monster Repellents -->
        <div class="flex-1 ml-72 p-8">
            <div class="mb-6">
                <div class="flex items-center gap-3">
                    <a href="/survival-guide" class="text-blue-400 hover:text-blue-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <h1 class="text-3xl font-bold text-white">Monster Repellents</h1>
                </div>
                <p class="text-gray-400 mt-2">Keep monsters away with these proven substances and techniques</p>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Table of Contents -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 sticky top-8">
                        <h3 class="text-xl font-bold text-white mb-4">Quick Navigation</h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="#chemical-repellents" class="text-blue-400 hover:text-blue-300 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Chemical Repellents
                                </a>
                            </li>
                            <li>
                                <a href="#sound-based" class="text-blue-400 hover:text-blue-300 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Sound-Based Deterrents
                                </a>
                            </li>
                            <li>
                                <a href="#light-based" class="text-blue-400 hover:text-blue-300 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Light-Based Repellents
                                </a>
                            </li>
                            <li>
                                <a href="#barriers" class="text-blue-400 hover:text-blue-300 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Protective Barriers
                                </a>
                            </li>
                            <li>
                                <a href="#wards" class="text-blue-400 hover:text-blue-300 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Traditional Wards
                                </a>
                            </li>
                            <li>
                                <a href="#effectiveness" class="text-blue-400 hover:text-blue-300 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Effectiveness Chart
                                </a>
                            </li>
                        </ul>

                        <div class="mt-8 p-4 bg-blue-900/30 rounded-lg border border-blue-700">
                            <h4 class="font-semibold text-blue-300 mb-2">Safety First</h4>
                            <p class="text-gray-300 text-sm">Remember that no repellent is 100% effective against all monster types. Always have backup safety measures in place.</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Introduction -->
                    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                        <h2 class="text-2xl font-bold text-white mb-4">Introduction to Monster Repellents</h2>
                        <p class="text-gray-300 mb-4">Monster repellents are essential tools for survival in monster-inhabited areas. Different types of monsters respond to different deterrents, making it vital to understand which repellents work best against specific creatures.</p>
                        <p class="text-gray-300">This guide covers the most effective substances, sounds, lights, and barriers proven to repel various monster species. All recommendations are based on survivor reports and laboratory testing.</p>
                    </div>

                    <!-- Chemical Repellents Section -->
                    <div id="chemical-repellents" class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                        <div class="flex items-center mb-4">
                            <div class="text-blue-400 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-white">Chemical Repellents</h2>
                        </div>
                        
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Salt</h3>
                                <p class="text-gray-300 mb-3">Pure salt is highly effective against slime-based monsters and certain spectral entities. Create barriers by pouring salt in an unbroken line, or dissolve in water to create a spray solution.</p>
                                <div class="flex flex-wrap gap-2 mb-2">
                                    <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Slime Monsters</span>
                                    <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Ectoplasmic Entities</span>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Iron Filings</h3>
                                <p class="text-gray-300 mb-3">Iron is a powerful deterrent for fae creatures and certain woodland monsters. Sprinkle around perimeters or carry in small cloth pouches.</p>
                                <div class="flex flex-wrap gap-2 mb-2">
                                    <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Fae Creatures</span>
                                    <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Woodland Beings</span>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Silver Nitrate Solution</h3>
                                <p class="text-gray-300 mb-3">Effective against shapeshifters and were-creatures. Apply to door handles and window frames to prevent entry.</p>
                                <div class="bg-yellow-900/30 border border-yellow-800 rounded-lg p-3 mt-4">
                                    <div class="flex items-start">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <p class="text-yellow-300 text-sm">Warning: Silver nitrate can cause skin irritation. Always wear protective gloves when handling.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sound-Based Deterrents -->
                    <div id="sound-based" class="bg-gray-800 rounded-xl p-6 border border-gray-700">
    <div class="flex items-center mb-4">
        <div class="text-blue-400 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-white">Sound-Based Deterrents</h2>
    </div>
    
    <div class="space-y-6">
        <div>
            <h3 class="text-xl font-semibold text-white mb-2">Ultrasonic Frequencies</h3>
            <p class="text-gray-300 mb-3">High-frequency sound waves that disrupt monster communication and navigation. Effective against bat-like creatures, sonic entities, and auditory predators.</p>
            <div class="flex flex-wrap gap-2 mb-2">
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Sonic Monsters</span>
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Echolocating Creatures</span>
            </div>
        </div>
        
        <div>
            <h3 class="text-xl font-semibold text-white mb-2">Dissonant Harmonics</h3>
            <p class="text-gray-300 mb-3">Complex sound patterns that create disorientation for auditory-sensitive monsters. Best used with specialized audio equipment that can generate precise frequencies.</p>
            <div class="flex flex-wrap gap-2 mb-2">
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Auditory Predators</span>
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Sound-Sensitive Entities</span>
            </div>
        </div>
        
        <div>
            <h3 class="text-xl font-semibold text-white mb-2">Resonance Disruption</h3>
            <p class="text-gray-300 mb-3">Targeted sound waves that interfere with monster sensory perception. Particularly effective against creatures that rely on vibrational communication.</p>
            <div class="bg-blue-900/30 border border-blue-700 rounded-lg p-3 mt-4">
                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-blue-300 text-sm">Note: Equipment effectiveness varies. Always test and calibrate before critical encounters.</p>
                </div>
            </div>
        </div>
    </div>
</div>
                 <!-- Light-Based Repellents -->
<div id="light-based" class="bg-gray-800 rounded-xl p-6 border border-gray-700">
    <div class="flex items-center mb-4">
        <div class="text-blue-400 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-white">Light-Based Repellents</h2>
    </div>
    
    <div class="space-y-6">
        <div>
            <h3 class="text-xl font-semibold text-white mb-2">Ultraviolet Radiation</h3>
            <p class="text-gray-300 mb-3">Specialized UV light frequencies that disrupt the cellular structure of photosensitive monsters. Particularly effective against shadow creatures and light-averse entities.</p>
            <div class="flex flex-wrap gap-2 mb-2">
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Shadow Monsters</span>
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Light-Sensitive Creatures</span>
            </div>
        </div>
        
        <div>
            <h3 class="text-xl font-semibold text-white mb-2">Prismatic Light Barriers</h3>
            <p class="text-gray-300 mb-3">Complex light refraction techniques that create defensive perimeters. Uses carefully calibrated light spectrums to generate protective barriers against ethereal and shadow-based monsters.</p>
            <div class="flex flex-wrap gap-2 mb-2">
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Ethereal Entities</span>
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Shadow Beings</span>
            </div>
        </div>
        
        <div>
            <h3 class="text-xl font-semibold text-white mb-2">Strobing Frequency Disruptors</h3>
            <p class="text-gray-300 mb-3">High-intensity, rapidly alternating light patterns that overwhelm and disorient monsters with light-sensitive sensory systems. Most effective against nocturnal and bioluminescent creatures.</p>
            <div class="bg-yellow-900/30 border border-yellow-800 rounded-lg p-3 mt-4">
                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-yellow-300 text-sm">Caution: Prolonged exposure may cause disorientation in humans. Use protective eyewear when operating.</p>
                </div>
            </div>
        </div>
    </div>
</div>
                    <!-- Protective Barriers -->
<div id="barriers" class="bg-gray-800 rounded-xl p-6 border border-gray-700">
    <div class="flex items-center mb-4">
        <div class="text-purple-400 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6M12 9v6m9-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-white">Protective Barriers</h2>
    </div>
    
    <div class="space-y-6">
        <div>
            <h3 class="text-xl font-semibold text-white mb-2">Salt Circles</h3>
            <p class="text-gray-300 mb-3">Salt forms an effective barrier against spectral monsters and demonic entities. Always use purified or rock salt for better results.</p>
            <div class="flex flex-wrap gap-2 mb-2">
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Demons</span>
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Spirits</span>
            </div>
        </div>
        
        <div>
            <h3 class="text-xl font-semibold text-white mb-2">Iron Fences</h3>
            <p class="text-gray-300 mb-3">Iron is a natural repellent for many supernatural creatures. Enclosing your safe zones with iron fences adds a strong layer of protection.</p>
            <div class="flex flex-wrap gap-2 mb-2">
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Spectral Entities</span>
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Dark Spirits</span>
            </div>
        </div>
        
        <div>
            <h3 class="text-xl font-semibold text-white mb-2">Sacred Glyphs</h3>
            <p class="text-gray-300 mb-3">Glyphs drawn with sacred materials (chalk or blood of a sacred lineage) form a mystical shield that wards off cursed monsters.</p>
            <div class="flex flex-wrap gap-2 mb-2">
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Cursed Beasts</span>
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Hexed Creatures</span>
            </div>
        </div>
        
        <div class="bg-gray-700 rounded-lg p-4 mt-6">
            <h4 class="font-semibold text-white mb-2">PRO TIP</h4>
            <p class="text-gray-300 text-sm">Combining physical and mystical barriers enhances defense and provides protection against multiple monster types simultaneously.</p>
        </div>
    </div>
</div>
                <!-- Traditional Wards -->
<div id="wards" class="bg-gray-800 rounded-xl p-6 border border-gray-700">
    <div class="flex items-center mb-4">
        <div class="text-blue-400 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 4.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-white">Traditional Wards</h2>
    </div>
    
    <div class="space-y-6">
        <div>
            <h3 class="text-xl font-semibold text-white mb-2">Runic Protection Circles</h3>
            <p class="text-gray-300 mb-3">Ancient symbolic systems that create metaphysical barriers against supernatural entities. Carefully drawn runes must be precise and unbroken to maintain their protective integrity.</p>
            <div class="flex flex-wrap gap-2 mb-2">
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Supernatural Entities</span>
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Ethereal Beings</span>
            </div>
        </div>
        
        <div>
            <h3 class="text-xl font-semibold text-white mb-2">Blessed Talismans</h3>
            <p class="text-gray-300 mb-3">Consecrated objects imbued with protective energy. Typically crafted through ritualistic processes and blessed by spiritual practitioners to repel malevolent entities.</p>
            <div class="flex flex-wrap gap-2 mb-2">
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Demonic Entities</span>
                <span class="bg-gray-700 text-gray-300 text-xs font-medium px-2.5 py-0.5 rounded">Negative Energy</span>
            </div>
        </div>
        
        <div>
            <h3 class="text-xl font-semibold text-white mb-2">Ancestral Warding Techniques</h3>
            <p class="text-gray-300 mb-3">Cultural protection methods passed down through generations. These include specific chants, ritual movements, and symbolic gestures that create metaphysical shields against monster intrusion.</p>
            <div class="bg-blue-900/30 border border-blue-700 rounded-lg p-3 mt-4">
                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-blue-300 text-sm">Important: Effectiveness depends on precise execution and cultural authenticity of the warding method.</p>
                </div>
            </div>
        </div>
    </div>
</div>

                    <!-- Effectiveness Chart Section -->
<div id="effectiveness" class="bg-gray-800 rounded-xl p-6 border border-gray-700 mt-8">
    <div class="flex items-center mb-4">
        <div class="text-indigo-400 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-white">Monster Repellent Effectiveness Chart</h2>
    </div>
    
    <div class="bg-gray-700 rounded-lg p-4 overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="text-xs text-gray-300 uppercase bg-gray-800">
                <tr>
                    <th scope="col" class="px-4 py-3">Repellent Type</th>
                    <th scope="col" class="px-4 py-3">Slime Monsters</th>
                    <th scope="col" class="px-4 py-3">Spectral Entities</th>
                    <th scope="col" class="px-4 py-3">Shapeshifters</th>
                    <th scope="col" class="px-4 py-3">Dark Spirits</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-600">
                    <td class="px-4 py-3 font-medium text-white">Salt</td>
                    <td class="px-4 py-3">95%</td>
                    <td class="px-4 py-3">80%</td>
                    <td class="px-4 py-3">10%</td>
                    <td class="px-4 py-3">60%</td>
                </tr>
                <tr class="border-b border-gray-600">
                    <td class="px-4 py-3 font-medium text-white">Iron Barriers</td>
                    <td class="px-4 py-3">20%</td>
                    <td class="px-4 py-3">85%</td>
                    <td class="px-4 py-3">40%</td>
                    <td class="px-4 py-3">75%</td>
                </tr>
                <tr class="border-b border-gray-600">
                    <td class="px-4 py-3 font-medium text-white">UV Light</td>
                    <td class="px-4 py-3">30%</td>
                    <td class="px-4 py-3">70%</td>
                    <td class="px-4 py-3">60%</td>
                    <td class="px-4 py-3">50%</td>
                </tr>
                <tr>
                    <td class="px-4 py-3 font-medium text-white">Sonic Disruptors</td>
                    <td class="px-4 py-3">15%</td>
                    <td class="px-4 py-3">40%</td>
                    <td class="px-4 py-3">25%</td>
                    <td class="px-4 py-3">35%</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="bg-blue-900/30 border border-blue-700 rounded-lg p-3 mt-4">
        <div class="flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <p class="text-blue-300 text-sm">Note: Effectiveness percentages are approximate and may vary based on specific monster subspecies and environmental conditions.</p>
        </div>
    </div>
</div>
</section>
</x-app-layout>