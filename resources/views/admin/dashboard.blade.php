<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - Monster App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .dashboard-card {
            background: linear-gradient(145deg, #1f2937 0%, #111827 100%);
        }
    </style>
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
            <div class="max-w-7xl mx-auto">
                <!-- Header Section -->
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Pending Monster Sightings</h1>
                        <p class="text-gray-400 mt-1">Review and manage reported monster sightings</p>
                    </div>
                    <div class="flex gap-4" id="bulkActions" style="display: none;">
                        <button onclick="verifyAllSelected()" 
                                class="inline-flex items-center px-4 py-2 border border-green-500/20 rounded-lg text-sm font-medium text-green-400 hover:bg-green-500/10 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Verify Selected
                        </button>
                        <button onclick="deleteAllSelected()"
                                class="inline-flex items-center px-4 py-2 border border-red-500/20 rounded-lg text-sm font-medium text-red-400 hover:bg-red-500/10 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Delete Selected
                        </button>
                    </div>
                </div>

                @if(session('success'))
                    <div class="mb-6 flex items-center p-4 bg-green-500/10 text-green-400 rounded-lg border border-green-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Table Card -->
                <div class="dashboard-card rounded-xl shadow-xl overflow-hidden border border-gray-700">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead>
                                <tr class="bg-gray-800">
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                        <input type="checkbox" id="selectAll" class="rounded border-gray-600 text-blue-500 focus:ring-blue-500">
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                        Monster Details
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                        Category & Danger
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                        Location
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                        Reporter
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @forelse($pendingSightings as $sighting)
                                    <tr class="hover:bg-gray-800/50 transition-colors duration-200">
                                        <td class="px-6 py-4">
                                            <input type="checkbox" class="sighting-checkbox rounded border-gray-600 text-blue-500 focus:ring-blue-500" value="{{ $sighting->id }}">
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($sighting->image)
                                                <img src="{{ route('monster-sightings.image', $sighting) }}" 
                                                     alt="Monster sighting image" 
                                                     class="w-16 h-16 object-cover rounded-lg ring-1 ring-gray-700">
                                            @else
                                                <div class="w-16 h-16 rounded-lg bg-gray-700 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm">
                                                <div class="font-medium text-white">{{ $sighting->monster_name }}</div>
                                                <div class="text-gray-400 mt-1">ID: #{{ $sighting->id }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col gap-2">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-500/10 text-blue-400">
                                                    {{ $sighting->category }}
                                                </span>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $sighting->danger_level >= 4 ? 'bg-red-500/10 text-red-400' : 'bg-yellow-500/10 text-yellow-400' }}">
                                                    Level {{ $sighting->danger_level }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm">
                                                <div class="text-white">{{ $sighting->location_name }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-8 w-8 bg-gray-700 rounded-full flex items-center justify-center">
                                                    <span class="text-sm font-medium text-gray-300">
                                                        {{ substr($sighting->user->name, 0, 1) }}
                                                    </span>
                                                </div>
                                                <div class="ml-3">
                                                    <div class="text-sm font-medium text-white">
                                                        {{ $sighting->user->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col gap-2">
                                                <a href="{{ route('admin.sightings.edit', $sighting) }}" 
                                                   class="inline-flex items-center px-3 py-1.5 border border-blue-500/20 rounded-lg text-sm font-medium text-blue-400 hover:bg-blue-500/10 transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                    </svg>
                                                    Edit
                                                </a>
                                                
                                                <button onclick="deleteSighting({{ $sighting->id }})"
                                                        class="inline-flex items-center px-3 py-1.5 border border-red-500/20 rounded-lg text-sm font-medium text-red-400 hover:bg-red-500/10 transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                    Delete
                                                </button>

                                                <button onclick="verifySighting({{ $sighting->id }})"
                                                        class="inline-flex items-center px-3 py-1.5 border border-green-500/20 rounded-lg text-sm font-medium text-green-400 hover:bg-green-500/10 transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    </svg>
                                                    Verify
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="text-gray-400 text-lg font-medium">No pending sightings to review</span>
                                                <p class="text-gray-500 mt-1">New sightings will appear here when reported</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.sighting-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateBulkActionsVisibility();
        });

        // Add event listeners to all checkboxes
        document.querySelectorAll('.sighting-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', updateBulkActionsVisibility);
        });

        function updateBulkActionsVisibility() {
            const bulkActions = document.getElementById('bulkActions');
            const selectedCount = document.querySelectorAll('.sighting-checkbox:checked').length;
            bulkActions.style.display = selectedCount > 0 ? 'flex' : 'none';
        }

        function verifyAllSelected() {
            const selectedIds = Array.from(document.querySelectorAll('.sighting-checkbox:checked'))
                .map(checkbox => checkbox.value);
            
            if (selectedIds.length === 0) {
                alert('Please select at least one sighting to verify.');
                return;
            }

            if (confirm(`Are you sure you want to verify ${selectedIds.length} selected sightings?`)) {
                fetch('/admin/verify-sightings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ ids: selectedIds })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }

        function deleteAllSelected() {
            const selectedIds = Array.from(document.querySelectorAll('.sighting-checkbox:checked'))
                .map(checkbox => checkbox.value);
            
            if (selectedIds.length === 0) {
                alert('Please select at least one sighting to delete.');
                return;
            }

            if (confirm(`Are you sure you want to delete ${selectedIds.length} selected sightings? This action cannot be undone.`)) {
                fetch('/admin/delete-sightings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ ids: selectedIds })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }

        function verifySighting(sightingId) {
            if (confirm('Are you sure you want to verify this sighting?')) {
                fetch(`/admin/verify-sighting/${sightingId}`, {
                    method: 'POST',
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
                });
            }
        }

        function deleteSighting(sightingId) {
            if (confirm('Are you sure you want to delete this sighting? This action cannot be undone.')) {
                fetch(`/admin/sightings/${sightingId}`, {
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
                });
            }
        }
    </script>
</body>
</html>