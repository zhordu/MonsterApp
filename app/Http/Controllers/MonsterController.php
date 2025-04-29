<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MonsterController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input('category');
        $search = $request->input('search');

        $query = Monster::query();

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $monsters = $query->paginate(8);

        return view('monsterpedia', compact('monsters'));
    }

    public function create()
    {
        return view('monsters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'danger_level' => 'required|string|max:255',
            'sightings' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $monster = new Monster();
        $monster->name = $request->name;
        $monster->category = $request->category;
        $monster->description = $request->description;
        $monster->danger_level = $request->danger_level;
        $monster->sightings = $request->sightings;
        $monster->lat = $request->lat;
        $monster->lng = $request->lng;

        if ($request->hasFile('image')) {
            // Read file content as binary data
            $monster->image_path = file_get_contents($request->file('image')->getRealPath());
        }

        $monster->save();

        return redirect()->route('monsterpedia')->with('success', 'Monster created successfully!');
    }

    public function show(Monster $monster)
    {
        return view('monsters.show', compact('monster'));
    }

    public function edit(Monster $monster)
    {
        return view('monsters.edit', compact('monster'));
    }

    public function update(Request $request, Monster $monster)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'danger_level' => 'required|string|max:255',
            'sightings' => 'required|integer',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $monster->name = $request->name;
        $monster->category = $request->category;
        $monster->description = $request->description;
        $monster->danger_level = $request->danger_level;
        $monster->sightings = $request->sightings;
        $monster->lat = $request->lat;
        $monster->lng = $request->lng;

        if ($request->hasFile('image')) {
            // Read file content as binary data
            $monster->image_path = file_get_contents($request->file('image')->getRealPath());
        }

        $monster->save();

        return redirect()->route('monsterpedia')->with('success', 'Monster updated successfully!');
    }

    public function destroy(Monster $monster)
    {
        $monster->delete();

        return redirect()->route('monsterpedia')->with('success', 'Monster deleted successfully!');
    }

    // Add a new method to serve the image from the database
    public function getImage(Monster $monster)
    {
        if (!$monster->image_path) {
            abort(404);
        }
        
        // Try to detect the MIME type
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($monster->image_path);
        
        return response($monster->image_path)
            ->header('Content-Type', $mimeType);
    }

    public function getLocations()
{
    $monsters = Monster::whereNotNull('lat')
                    ->whereNotNull('lng')
                    ->get(['id', 'name', 'category', 'description', 'danger_level', 'sightings', 'lat', 'lng']);
    
    return response()->json($monsters);
}
}