<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($project_slug) {
        
        $project = Project::where('slug', $project_slug)->first();

        return view('comments.index', ['project' => $project]);
    }

    public function store() {
        
        request()->validate([
            'content' => 'required',
        ]);
        
        $comment = Comment::create([
            'content' => request()->query('content'),
            'project_id' => request()->query('project_id'),
            'user_id' => Auth::id(),
        ]);

        if($comment) {
            return response()->json([
                'Comment has been created'
            ]);
        }

        return response()->json([
            'Unknown error'
        ]);
    }
}
