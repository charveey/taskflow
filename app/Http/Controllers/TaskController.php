<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    public function index($project_slug) {

        $project = Project::where('slug', $project_slug)->first();

        return view('tasks.index', ['project' => $project]);
    }

    public function store() {

        request()->validate([
            'title' => 'required',
            'assign_to' => 'required',
            'priority' => 'required',
        ]);

        $baseSlug = Str::slug(request()->title);
        $slug = $baseSlug;
        $count = 1;
        while(Project::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }

        Task::create([
            'title' => request()->title,
            'slug' => $slug,
            'description' => request()->description,
            'priority' => request()->priority,
            'status' => 'todo',
            'project_id' => request()->project,
            'user_id' => request()->assign_to,
        ]);

        return response()->json([
            'status' => 'task created successfully'
        ]);
        
    }
}
