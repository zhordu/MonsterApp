<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\MonsterSighting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, MonsterSighting $sighting)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->monster_sighting_id = $sighting->id;
        $comment->content = $validated['content'];
        $comment->save();

        return response()->json([
            'success' => true,
            'comment' => $comment->load('user')
        ]);
    }

    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        $comment->update($validated);

        return response()->json(['success' => true]);
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->delete();

        return response()->json(['success' => true]);
    }
} 