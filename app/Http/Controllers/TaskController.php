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

    public function destroy($project_id, $task_id)  {
        
        $task = Task::where('project_id', $project_id)
                    ->where('id', $task_id)
                    ->first();

        $project = Project::where('id', $project_id)->first();

        if($task) {
            $task->delete();
            
            return to_route('tasks.index', ['project' => $project])->with([
                'status' => 'Task has been removed',
            ]);
        }

        return to_route('tasks.index', ['project' => $project])->with([
            'error' => 'Error when trying to remove task',
        ]);

    }
}
