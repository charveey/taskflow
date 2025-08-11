<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index() {
        return view('projects.index');
    }

    public function show($slug) {
        // slug is unique value
        $project = Project::where('slug', $slug)->first();

        return view('projects.show', ['project' => $project]);
    }

    public function store() {
        
        request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $baseSlug = Str::slug(request()->title);
        $slug = $baseSlug;
        $count = 1;
        while(Project::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }

        $project = Project::create([
            'title' => request()->title,
            'slug' => $slug,
            'description' => request()->description,
            'start_date' => request()->start_date,
            'deadline' => request()->deadline,
        ]);

        ProjectUser::create([
            'project_id' => $project->id,
            'user_id' => Auth::id(),
            'authority' => 'admin',
        ]);

        return response()->json([
            'status' => 'Project Created Successfully',
        ]);
    }
    
    public function users($slug) {
        // slug is unique value
        $project = Project::where('slug', $slug)->first();

        return view('projects.users', ['project' => $project]);
    }

    public function addUser() {

        $project_id = request()->query('project_id');
        $user_id = request()->query('user_id');

        if(auth()->user()->getAuthority($project_id) != 'admin') {
            abort(403);
        }

        $alreadyAdded = ProjectUser::where('project_id', $project_id)
                            ->where('user_id', $user_id)
                            ->exists();

        $project = Project::where('id', $project_id)->first();

        if(!$alreadyAdded) {
            ProjectUser::create([
                'project_id' => $project_id,
                'user_id' => $user_id,
                'authority' => 'user',
            ]);

            return to_route('projects.users', ['project' => $project])
                    ->with(['status' => 'user has been added successfully']);
        }

        return to_route('projects.users', ['project' => $project])
                    ->with(['error' => 'user already added to project']);
    }

    public function removeUser($project_id, $user_id) {

        if(auth()->user()->getAuthority($project_id) != 'admin') {
            abort(403);
        }

        $record = ProjectUser::where('project_id', $project_id)
                            ->where('user_id', $user_id)
                            ->first();

        $project = Project::where('id', $project_id)->first();

        if($record && Auth::id() != $user_id) {
            $record->delete();

            return to_route('projects.users', ['project' => $project])
                    ->with(['status' => 'user has been removed']);
        }

        return to_route('projects.users', ['project' => $project])
                    ->with(['error' => 'could not remove user']);
    }

    public function chartData($project_id) {

        $tasks = Task::with('user')
                    ->select('user_id', \DB::raw('count(*) as total'))
                    ->where('project_id', $project_id)
                    ->groupBy('user_id')
                    ->get();

        return response()->json([
            'tasks' => $tasks
        ]);

    }

}