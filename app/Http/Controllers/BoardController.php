<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index($project_slug) {

        $project = Project::where('slug', $project_slug)->first();

        return view('board.index', ['project' => $project]);
    }
}
