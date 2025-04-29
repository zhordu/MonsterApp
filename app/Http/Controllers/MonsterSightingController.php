<?php

namespace App\Http\Controllers;

use App\Models\MonsterSighting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonsterSightingController extends Controller
{

    public function index()
    {
        $monsterSightings = MonsterSighting::with(['user', 'comments.user'])->latest()->paginate(10);
        return view('community-reports', compact('monsterSightings'));
    }
    /**
     * Display a listing of monster locations.
     */
    public function getLocations()
    {
        $sightings = MonsterSighting::select('id', 'monster_name', 'category', 'description', 'danger_level', 'lat', 'lng', 'location_name', 'sighting_time', 'verified', 'user_id', 'image')
            ->with('user:id,name')
            ->get()
            ->map(function ($sighting) {
                return [
                    'id' => $sighting->id,
                    'monster_name' => $sighting->monster_name,
                    'category' => $sighting->category,
                    'description' => $sighting->description,
                    'danger_level' => $sighting->danger_level,
                    'lat' => $sighting->lat,
                    'lng' => $sighting->lng,
                    'location_name' => $sighting->location_name,
                    'sighting_time' => $sighting->sighting_time,
                    'verified' => $sighting->verified,
                    'user_name' => $sighting->user ? $sighting->user->name : 'Anonymous',
                    'has_image' => !is_null($sighting->image)
                ];
            });
        return response()->json($sightings);
    }
    
    /**
     * Store a newly created monster sighting.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'monster_name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'required|string',
            'danger_level' => 'required|string|in:Unknown,1,2,3,4,5',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'location_name' => 'nullable|string|max:255',
            'sighting_time' => 'nullable|date',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);
        
        // Add user_id to the validated data
        $validated['user_id'] = Auth::id();
        
        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Read file content as binary data
            $validated['image'] = file_get_contents($request->file('image')->getRealPath());
        }
        
        // Create the sighting
        MonsterSighting::create($validated);
        
        return redirect()->route('interactiveMap')
            ->with('success', 'Monster sighting reported successfully!');
    }

    /**
     * Show the form for editing the specified monster sighting.
     */
    public function edit(MonsterSighting $sighting)
    {
        // Check if the authenticated user owns this sighting
        if ($sighting->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return view('monster-sightings.edit', compact('sighting'));
    }

    /**
     * Update the specified monster sighting.
     */
    public function update(Request $request, MonsterSighting $sighting)
    {
        try {
            // Check if the authenticated user owns this sighting
            if ($sighting->user_id !== Auth::id()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            $validated = $request->validate([
                'monster_name' => 'required|string|max:255',
                'category' => 'nullable|string|max:255',
                'description' => 'required|string',
                'danger_level' => 'required|integer|min:1|max:5',
                'lat' => 'required|numeric',
                'lng' => 'required|numeric',
                'location_name' => 'nullable|string|max:255',
                'sighting_time' => 'nullable|date',
            ]);

            $sighting->update($validated);

            return response()->json(['success' => true]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'messages' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update sighting',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified monster sighting.
     */
    public function destroy(MonsterSighting $sighting)
    {
        // Check if the authenticated user owns this sighting
        if ($sighting->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $sighting->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Serve the monster sighting image.
     */
    public function getImage(MonsterSighting $sighting)
    {
        if (!$sighting->image) {
            abort(404);
        }
        
        // Try to detect the MIME type
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($sighting->image);
        
        return response($sighting->image)
            ->header('Content-Type', $mimeType);
    }

    /**
     * Find which page a specific sighting is on.
     */
    public function findSightingPage($id)
    {
        // Get the sighting
        $sighting = MonsterSighting::find($id);
        
        if (!$sighting) {
            return response()->json(['error' => 'Sighting not found'], 404);
        }
        
        // Get all sightings ordered by latest first (same as in index method)
        $sightings = MonsterSighting::latest();
        
        // Get the position of this sighting in the collection
        $position = $sightings->where('created_at', '>=', $sighting->created_at)
                             ->where('id', '!=', $sighting->id)
                             ->count() + 1;
        
        // Calculate which page this sighting would be on (assuming 10 per page)
        $page = ceil($position / 10);
        
        return response()->json(['page' => $page]);
    }
}