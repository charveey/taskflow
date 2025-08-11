<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index($project_slug) {

        $project = Project::where('slug', $project_slug)->first();

        return view('board.index', ['project' => $project]);
    }

    public function getTasks() {

        $project_id = request()->query('project_id');

        $tasks = Task::with('user')->where('project_id', $project_id)
                ->orderBy('updated_at', 'asc')
                ->get();

        return response()->json([
            'tasks' => $tasks
        ]);
       
    }

    public function updateStatus() {

        $task_id = request()->query('task_id');
        $new_status = request()->query('status');

        $task = Task::findOrFail($task_id);

        if($task) {
            $task->update([
                'status' => $new_status,
            ]);
        }

        return response()->json([
            'task id' => request()->query('task_id'),
            'new status' => request()->query('status'),
        ]);
    }
}
