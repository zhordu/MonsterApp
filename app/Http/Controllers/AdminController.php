<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Monster;
use App\Models\MonsterSighting;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(AdminLoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');
    }

    public function dashboard()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        $pendingSightings = MonsterSighting::where('verified', false)->get();
        return view('admin.dashboard', compact('pendingSightings'));
    }

    public function editSighting(MonsterSighting $sighting)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        return view('admin.sightings.edit', compact('sighting'));
    }

    public function updateSighting(Request $request, MonsterSighting $sighting)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'monster_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'danger_level' => 'required|string|in:Unknown,1,2,3,4,5',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'location_name' => 'nullable|string|max:255',
            'sighting_time' => 'nullable|date',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        // Handle image update if a new image is uploaded
        if ($request->hasFile('image')) {
            // Read file content as binary data
            $validated['image'] = file_get_contents($request->file('image')->getRealPath());
            
            // If this sighting is already verified and has a monster, update the monster's image too
            if ($sighting->verified) {
                $monster = Monster::where('name', $sighting->monster_name)->first();
                if ($monster) {
                    DB::table('monsters')
                        ->where('id', $monster->id)
                        ->update(['image_path' => $validated['image']]);
                }
            }
        } else {
            // Remove image from validated data if no new image was uploaded
            unset($validated['image']);
        }

        $sighting->update($validated);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Monster sighting updated successfully!');
    }

    public function deleteSighting(Request $request, MonsterSighting $sighting)
    {
        if (!Auth::guard('admin')->check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $sighting->delete();

        return response()->json(['success' => true]);
    }

    public function verifySighting(Request $request, MonsterSighting $sighting)
    {
        // First, mark the sighting as verified
        $sighting->verified = true;
        $sighting->save();

        // Get the monster or create it if it doesn't exist
        $monster = Monster::where('name', $sighting->monster_name)->first();
        
        if (!$monster) {
            // Create a new monster
            $monster = new Monster();
            $monster->name = $sighting->monster_name;
            $monster->category = $sighting->category;
            $monster->description = $sighting->description;
            $monster->danger_level = $sighting->danger_level;
            $monster->sightings = 1;
            $monster->lat = $sighting->lat;
            $monster->lng = $sighting->lng;
            $monster->save();
            
            // If the sighting has an image, copy it directly using a database query
            if ($sighting->image) {
                DB::table('monsters')
                    ->where('id', $monster->id)
                    ->update(['image_path' => $sighting->image]);
            }
        } else {
            // Update existing monster
            $monster->sightings += 1;
            $monster->save();
            
            // If the monster doesn't have an image and the sighting does, copy it using a database query
            if (!$monster->image_path && $sighting->image) {
                DB::table('monsters')
                    ->where('id', $monster->id)
                    ->update(['image_path' => $sighting->image]);
            }
        }
        
        // Log for debugging
        \Log::info('Monster sighting verified', [
            'sighting_id' => $sighting->id,
            'monster_id' => $monster->id,
            'sighting_image_exists' => !empty($sighting->image),
            'monster_image_exists' => !empty($monster->image_path)
        ]);

        return response()->json(['success' => true]);
    }

    public function verifySightings(Request $request)
    {
        if (!Auth::guard('admin')->check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $ids = $request->input('ids', []);
        
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No sightings selected'], 400);
        }

        $sightings = MonsterSighting::whereIn('id', $ids)->get();
        
        foreach ($sightings as $sighting) {
            $this->verifySighting($request, $sighting);
        }

        return response()->json(['success' => true]);
    }

    public function deleteSightings(Request $request)
    {
        if (!Auth::guard('admin')->check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $ids = $request->input('ids', []);
        
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No sightings selected'], 400);
        }

        MonsterSighting::whereIn('id', $ids)->delete();

        return response()->json(['success' => true]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function monsterpedia(Request $request)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        $query = Monster::query();

        // Handle search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        // Handle category filter
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $monsters = $query->paginate(9);

        return view('admin.monsterpedia', compact('monsters'));
    }
}
