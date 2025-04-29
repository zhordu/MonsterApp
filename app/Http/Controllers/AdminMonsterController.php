<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminMonsterController extends Controller
{
    public function index()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        $monsters = Monster::all();
        return view('admin.monsters.index', compact('monsters'));
    }

    public function create()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        return view('admin.monsters.create');
    }

    public function store(Request $request)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'danger_level' => 'required|string|in:Low,Moderate,High,Very High,Extreme',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = file_get_contents($request->file('image')->getRealPath());
        }

        Monster::create($validated);

        return redirect()->route('admin.monsterpedia')
            ->with('success', 'Monster created successfully!');
    }

    public function show(Monster $monster)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        return view('admin.monsters.show', compact('monster'));
    }

    public function edit(Monster $monster)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        return view('admin.monsters.edit', compact('monster'));
    }

    public function update(Request $request, Monster $monster)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'danger_level' => 'required|string|in:Low,Moderate,High,Very High,Extreme',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = file_get_contents($request->file('image')->getRealPath());
        }

        $monster->update($validated);

        return redirect()->route('admin.monsterpedia')
            ->with('success', 'Monster updated successfully!');
    }

    public function destroy(Monster $monster)
    {
        if (!Auth::guard('admin')->check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $monster->delete();

        return response()->json(['success' => true]);
    }
} 