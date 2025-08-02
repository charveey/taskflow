<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index() {
        return view('projects.index');
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

        
        return response()->json([
            'status' => 'Project Created Successfully',
        ]);
    }
}