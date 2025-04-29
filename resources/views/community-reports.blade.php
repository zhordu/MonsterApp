<x-app-layout>
<meta name="csrf-token" content="{{ csrf_token() }}">
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

                <a href="/community-reports" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl bg-gray-700 text-white hover:bg-gray-600 transition-all duration-200 group">
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

        <!-- Main Content Area -->
        <div class="flex-1 ml-72 p-8">
            <div class="max-w-3xl mx-auto">
                <!-- Page Header -->
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold text-white">Community Monster Sightings</h1>
                </div>

                <!-- Sightings Feed -->
                <div class="space-y-6">
                    @foreach($monsterSightings as $sighting)
                    <div id="sighting-{{ $sighting->id }}" class="bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                        <!-- Sighting Header -->
                        <div class="p-4 border-b border-gray-700">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold">
                                    {{ substr($sighting->user->name ?? 'Anonymous', 0, 1) }}
                                </div>
                                <div>
                                    <h3 class="text-white font-medium">{{ $sighting->user->name ?? 'Anonymous User' }}</h3>
                                    <p class="text-gray-400 text-sm">{{ $sighting->created_at->diffForHumans() }} · {{ $sighting->location_name }}</p>
                                </div>
                                
                                <div class="ml-auto flex items-center">
                                    <span class="px-2 py-1 text-xs rounded-full text-white
                                        @if($sighting->danger_level == 1) bg-green-600
                                        @elseif($sighting->danger_level == 2) bg-yellow-600
                                        @elseif($sighting->danger_level == 3) bg-orange-600
                                        @elseif($sighting->danger_level == 4) bg-red-600
                                        @else bg-red-800
                                        @endif">
                                        Level {{ $sighting->danger_level }}
                                    </span>
                                    
                                    @if($sighting->verified)
                                    <span class="ml-2 px-2 py-1 bg-blue-600 text-xs rounded-full text-white">Verified</span>
                                    @endif

                                    @if($sighting->user_id === Auth::id())
                                    <div class="relative ml-4">
                                        <button onclick="toggleMenu({{ $sighting->id }})" 
                                                class="text-gray-400 hover:text-white focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <circle cx="4" cy="10" r="2" />
                                                <circle cx="10" cy="10" r="2" />
                                                <circle cx="16" cy="10" r="2" />
                                            </svg>
                                        </button>
                                        
                                        <!-- Dropdown Menu -->
                                        <div id="menu-{{ $sighting->id }}" 
                                             class="hidden absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg py-1 z-10">
                                            <a href="{{ route('monster-sightings.edit', $sighting) }}" 
                                               class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                                Edit
                                            </a>
                                            <button onclick="deleteSighting({{ $sighting->id }})" 
                                                    class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-red-900/20 hover:text-red-300 flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Sighting Content -->
                        <div class="p-4">
                            @if($sighting->image)
                                <div class="mb-4 flex justify-center">
                                    <img src="{{ route('monster-sightings.image', $sighting) }}" 
                                         alt="Monster sighting image" 
                                         class="max-w-full rounded-lg" 
                                         style="max-height: 500px; width: auto; height: auto; object-fit: contain;">
                                </div>
                            @endif

                            <div class="space-y-4">
                                <div>
                                    <p class="text-gray-400 description-text" id="short-desc-{{ $sighting->id }}">{{ Str::limit($sighting->description, 150) }}</p>
                                    <p class="text-gray-400 description-text hidden" id="full-desc-{{ $sighting->id }}">{{ $sighting->description }}</p>
                                    @if(Str::length($sighting->description) > 150)
                                        <button onclick="toggleDescription({{ $sighting->id }})" id="toggle-btn-{{ $sighting->id }}" class="text-blue-400 hover:text-blue-300 text-sm mt-1">See more</button>
                                    @endif
                                </div>

                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-lg font-bold text-white">{{ $sighting->monster_name }}</span>
                                    <span class="px-2 py-0.5 bg-gray-700 rounded-full text-gray-300 text-xs">{{ $sighting->category }}</span>
                                </div>

                                @if($sighting->lat && $sighting->lng)
                                <div class="mt-4 bg-gray-900 rounded-lg p-3 text-sm text-gray-400">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                            </svg>
                                            Location: {{ $sighting->lat }}, {{ $sighting->lng }}
                                        </div>
                                        <a href="/interactiveMap?focus={{ $sighting->id }}&lat={{ $sighting->lat }}&lng={{ $sighting->lng }}" 
                                           class="text-blue-400 hover:text-blue-300 text-sm font-medium inline-flex items-center">
                                            View on Map
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex border-t border-gray-700">
                            <div class="flex-1 p-4">
                                <!-- Comment Toggle Button -->
                                <button onclick="toggleComments({{ $sighting->id }})" 
                                        class="flex items-center gap-2 text-gray-400 hover:text-white mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                                    </svg>
                                    <span id="comment-count-{{ $sighting->id }}">{{ $sighting->comments->count() }} Comments</span>
                                </button>

                                <!-- Comments Section (Hidden by default) -->
                                <div id="comments-section-{{ $sighting->id }}" class="hidden space-y-4">
                                    <!-- Comment Form -->
                                    <form id="comment-form-{{ $sighting->id }}" class="mb-4">
                                        <div class="flex items-center gap-2">
                                            <div class="h-8 w-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold">
                                                {{ substr(Auth::user()->name, 0, 1) }}
                                            </div>
                                            <input type="text" 
                                                   name="content" 
                                                   placeholder="Add a comment..." 
                                                   class="flex-1 bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                   required>
                                            <button type="submit" 
                                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                                                Comment
                                            </button>
                                        </div>
                                    </form>

                                    <!-- Comments List -->
                                    <div id="comments-{{ $sighting->id }}" class="space-y-4">
                                        @foreach($sighting->comments as $comment)
                                        <div id="comment-{{ $comment->id }}" class="flex items-start gap-2">
                                            <div class="h-8 w-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold">
                                                {{ substr($comment->user->name, 0, 1) }}
                                            </div>
                                            <div class="flex-1">
                                                <div class="bg-gray-700 rounded-lg p-3">
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center gap-2">
                                                            <span class="text-white font-medium">{{ $comment->user->name }}</span>
                                                            <span class="text-gray-400 text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                                                        </div>
                                                        @if($comment->user_id === Auth::id())
                                                        <div class="relative">
                                                            <button onclick="toggleCommentMenu({{ $comment->id }})" 
                                                                    class="text-gray-400 hover:text-white focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                    <circle cx="4" cy="10" r="2" />
                                                                    <circle cx="10" cy="10" r="2" />
                                                                    <circle cx="16" cy="10" r="2" />
                                                                </svg>
                                                            </button>
                                                            
                                                            <!-- Comment Dropdown Menu -->
                                                            <div id="comment-menu-{{ $comment->id }}" 
                                                                 class="hidden absolute right-0 bottom-full mb-2 w-48 bg-gray-800 rounded-md shadow-lg py-1 z-10">
                                                                <button onclick="editComment({{ $comment->id }})" 
                                                                        class="block w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white flex items-center gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                                    </svg>
                                                                    Edit
                                                                </button>
                                                                <button onclick="deleteComment({{ $comment->id }})" 
                                                                        class="block w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-red-900/20 hover:text-red-300 flex items-center gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                                    </svg>
                                                                    Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <p class="text-gray-300 mt-1">{{ $comment->content }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $monsterSightings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-4 right-4 bg-gray-800 text-white px-6 py-3 rounded-lg shadow-lg transform transition-all duration-300 translate-y-full opacity-0">
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <span id="toast-message">Post deleted successfully!</span>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the focus parameter from the URL
            const urlParams = new URLSearchParams(window.location.search);
            const focusId = urlParams.get('focus');
            
            if (focusId) {
                // Find the element with the matching ID
                const element = document.getElementById(`sighting-${focusId}`);
                if (element) {
                    // Scroll the element into view with smooth behavior
                    element.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    
                    // Add a highlight effect
                    element.classList.add('ring-2', 'ring-blue-500');
                    setTimeout(() => {
                        element.classList.remove('ring-2', 'ring-blue-500');
                    }, 3000);
                } else {
                    // If the sighting is not on the current page, we need to find which page it's on
                    fetch(`/find-sighting-page/${focusId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.page && data.page !== {{ $monsterSightings->currentPage() }}) {
                                // Redirect to the correct page with the focus parameter
                                window.location.href = `/community-reports?page=${data.page}&focus=${focusId}`;
                            }
                        })
                        .catch(error => {
                            console.error('Error finding sighting page:', error);
                        });
                }
            }

            // Close all menus when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.relative')) {
                    const menus = document.querySelectorAll('[id^="menu-"]');
                    menus.forEach(menu => menu.classList.add('hidden'));
                }
            });
        });

        function showToast(message) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            toastMessage.textContent = message;
            
            // Show toast
            toast.classList.remove('translate-y-full', 'opacity-0');
            
            // Hide toast after 3 seconds
            setTimeout(() => {
                toast.classList.add('translate-y-full', 'opacity-0');
            }, 3000);
        }

        function toggleMenu(sightingId) {
            const menu = document.getElementById(`menu-${sightingId}`);
            menu.classList.toggle('hidden');
        }
        
        function toggleDescription(id) {
            const shortDesc = document.getElementById(`short-desc-${id}`);
            const fullDesc = document.getElementById(`full-desc-${id}`);
            const toggleBtn = document.getElementById(`toggle-btn-${id}`);
            
            if (shortDesc.classList.contains('hidden')) {
                shortDesc.classList.remove('hidden');
                fullDesc.classList.add('hidden');
                toggleBtn.textContent = 'See more';
            } else {
                shortDesc.classList.add('hidden');
                fullDesc.classList.remove('hidden');
                toggleBtn.textContent = 'See less';
            }
        }
        
        function deleteSighting(id) {
            if (confirm('Are you sure you want to delete this sighting?')) {
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                fetch(`/monster-sightings/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the sighting from the DOM
                        const sightingElement = document.getElementById(`sighting-${id}`);
                        sightingElement.remove();
                        
                        // Show toast
                        showToast('Sighting deleted successfully');
                    } else {
                        showToast('Error: ' + data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('An error occurred while deleting the sighting', 'error');
                });
            }
        }
        
        // Function to get URL parameters
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }
        
        // Check if we need to focus on a specific sighting
        document.addEventListener('DOMContentLoaded', function() {
            // Prevent default browser scroll behavior when page loads
            if (history.scrollRestoration) {
                history.scrollRestoration = 'manual';
            }
            
            // Force scroll to top immediately when page loads with focus parameter
            window.scrollTo(0, 0);
            
            const focusId = getUrlParameter('focus');
            if (focusId) {
                // We need to ensure all images are loaded before attempting to scroll
                // This is especially important for elements at the bottom of the page
                window.addEventListener('load', function() {
                    const sightingElement = document.getElementById(`sighting-${focusId}`);
                    if (sightingElement) {
                        // First highlight the element to make it visible
                        sightingElement.classList.add('ring-4', 'ring-blue-500', 'ring-opacity-100');
                        sightingElement.style.boxShadow = '0 0 20px rgba(59, 130, 246, 0.8)';
                        
                        // Note: We no longer automatically expand the description
                        // The user will need to click 'See more' manually
                        
                        // For elements at the bottom, we need a special approach
                        // First attempt: direct scroll with a fixed position
                        const attemptDirectScroll = function() {
                            // Get element position
                            const rect = sightingElement.getBoundingClientRect();
                            const elementTop = rect.top + window.pageYOffset;
                            
                            // Calculate position that puts element in the middle of the viewport
                            const middle = elementTop - (window.innerHeight / 2) + (rect.height / 2);
                            
                            // Scroll to position
                            window.scrollTo({
                                top: middle,
                                behavior: 'auto'
                            });
                            
                            // Check if element is now visible in viewport
                            setTimeout(() => {
                                const newRect = sightingElement.getBoundingClientRect();
                                const isFullyVisible = (
                                    newRect.top >= 0 &&
                                    newRect.bottom <= window.innerHeight
                                );
                                
                                const isPartiallyVisible = (
                                    newRect.top < window.innerHeight &&
                                    newRect.bottom > 0
                                );
                                
                                // If not even partially visible, try a different approach
                                if (!isPartiallyVisible) {
                                    // Last resort: force scroll to element directly
                                    sightingElement.scrollIntoView({
                                        behavior: 'auto',
                                        block: 'center'
                                    });
                                }
                                
                                // Start the pulse animation
                                let pulseCount = 0;
                                const pulseInterval = setInterval(() => {
                                    if (pulseCount >= 3) {
                                        clearInterval(pulseInterval);
                                        // Remove highlight after pulsing
                                        setTimeout(() => {
                                            sightingElement.classList.remove('ring-4', 'ring-blue-500', 'ring-opacity-100');
                                            sightingElement.style.boxShadow = '';
                                        }, 1000);
                                        return;
                                    }
                                    
                                    sightingElement.classList.add('bg-gray-700');
                                    setTimeout(() => {
                                        sightingElement.classList.remove('bg-gray-700');
                                    }, 400);
                                    
                                    pulseCount++;
                                }, 800);
                            }, 100);
                        };
                        
                        // Delay to ensure the page is fully rendered
                        setTimeout(attemptDirectScroll, 800);
                    }
                });
            }
        });

        // Comment functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Handle comment form submission
            document.querySelectorAll('[id^="comment-form-"]').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const sightingId = this.id.split('-')[2];
                    const content = this.querySelector('input[name="content"]').value;
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    
                    fetch(`/monster-sightings/${sightingId}/comments`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({ content })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Add the new comment to the DOM
                            const commentsContainer = document.getElementById(`comments-${sightingId}`);
                            const comment = data.comment;
                            
                            const commentHtml = `
                                <div id="comment-${comment.id}" class="flex items-start gap-2">
                                    <div class="h-8 w-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold">
                                        ${comment.user.name.charAt(0)}
                                    </div>
                                    <div class="flex-1">
                                        <div class="bg-gray-700 rounded-lg p-3">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-2">
                                                    <span class="text-white font-medium">${comment.user.name}</span>
                                                    <span class="text-gray-400 text-sm">Just now</span>
                                                </div>
                                                <div class="relative">
                                                    <button onclick="toggleCommentMenu(${comment.id})" 
                                                            class="text-gray-400 hover:text-white focus:outline-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                            <circle cx="4" cy="10" r="2" />
                                                            <circle cx="10" cy="10" r="2" />
                                                            <circle cx="16" cy="10" r="2" />
                                                        </svg>
                                                    </button>
                                                    
                                                    <!-- Comment Dropdown Menu -->
                                                    <div id="comment-menu-${comment.id}" 
                                                         class="hidden absolute right-0 bottom-full mb-2 w-48 bg-gray-800 rounded-md shadow-lg py-1 z-10">
                                                        <button onclick="editComment(${comment.id})" 
                                                                class="block w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white flex items-center gap-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                            </svg>
                                                            Edit
                                                        </button>
                                                        <button onclick="deleteComment(${comment.id})" 
                                                                class="block w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-red-900/20 hover:text-red-300 flex items-center gap-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-gray-300 mt-1">${comment.content}</p>
                                        </div>
                                    </div>
                                </div>
                            `;
                            
                            commentsContainer.insertAdjacentHTML('beforeend', commentHtml);
                            
                            // Update comment count
                            const commentCount = commentsContainer.children.length;
                            document.getElementById(`comment-count-${sightingId}`).textContent = 
                                `${commentCount} ${commentCount === 1 ? 'Comment' : 'Comments'}`;
                            
                            // Clear the input
                            this.querySelector('input[name="content"]').value = '';
                            
                            // Show toast
                            showToast('Comment added successfully');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('An error occurred while adding the comment', 'error');
                    });
                });
            });
        });

        function deleteComment(commentId) {
            if (confirm('Are you sure you want to delete this comment?')) {
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                fetch(`/comments/${commentId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the comment from the DOM
                        const commentElement = document.getElementById(`comment-${commentId}`);
                        const sightingId = commentElement.closest('[id^="sighting-"]').id.split('-')[1];
                        commentElement.remove();
                        
                        // Update comment count
                        const commentCount = document.getElementById(`comments-${sightingId}`).children.length;
                        document.getElementById(`comment-count-${sightingId}`).textContent = 
                            `${commentCount} ${commentCount === 1 ? 'Comment' : 'Comments'}`;
                        
                        // Show toast
                        showToast('Comment deleted successfully');
                    } else {
                        showToast('Error: ' + data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('An error occurred while deleting the comment', 'error');
                });
            }
        }

        function toggleCommentMenu(commentId) {
            // Close all other menus first
            document.querySelectorAll('[id^="comment-menu-"]').forEach(menu => {
                if (menu.id !== `comment-menu-${commentId}`) {
                    menu.classList.add('hidden');
                }
            });
            
            // Toggle the clicked menu
            const menu = document.getElementById(`comment-menu-${commentId}`);
            menu.classList.toggle('hidden');
        }

        function editComment(commentId) {
            const commentElement = document.getElementById(`comment-${commentId}`);
            const contentElement = commentElement.querySelector('p');
            const currentContent = contentElement.textContent;
            
            // Create edit form
            const editForm = document.createElement('form');
            editForm.innerHTML = `
                <div class="flex items-center gap-2">
                    <input type="text" 
                           name="content" 
                           value="${currentContent}" 
                           class="flex-1 bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required>
                    <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                        Save
                    </button>
                    <button type="button" 
                            onclick="cancelEdit(${commentId})"
                            class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                        Cancel
                    </button>
                </div>
            `;
            
            // Replace content with edit form
            contentElement.parentNode.replaceChild(editForm, contentElement);
            
            // Handle form submission
            editForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const newContent = this.querySelector('input[name="content"]').value;
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                fetch(`/comments/${commentId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({ content: newContent })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Replace form with updated content
                        const newContentElement = document.createElement('p');
                        newContentElement.className = 'text-gray-300 mt-1';
                        newContentElement.textContent = newContent;
                        editForm.parentNode.replaceChild(newContentElement, editForm);
                        
                        // Show toast
                        showToast('Comment updated successfully');
                    } else {
                        showToast('Error: ' + data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('An error occurred while updating the comment', 'error');
                });
            });
        }

        function cancelEdit(commentId) {
            const commentElement = document.getElementById(`comment-${commentId}`);
            const form = commentElement.querySelector('form');
            const contentElement = document.createElement('p');
            contentElement.className = 'text-gray-300 mt-1';
            contentElement.textContent = form.querySelector('input[name="content"]').value;
            form.parentNode.replaceChild(contentElement, form);
        }

        // Close comment menus when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.relative')) {
                document.querySelectorAll('[id^="comment-menu-"]').forEach(menu => {
                    menu.classList.add('hidden');
                });
            }
        });

        function toggleComments(sightingId) {
            const commentsSection = document.getElementById(`comments-section-${sightingId}`);
            commentsSection.classList.toggle('hidden');
            
            // Update comment count
            const commentCount = document.getElementById(`comments-${sightingId}`).children.length;
            document.getElementById(`comment-count-${sightingId}`).textContent = 
                `${commentCount} ${commentCount === 1 ? 'Comment' : 'Comments'}`;
        }
    </script>
</x-app-layout>