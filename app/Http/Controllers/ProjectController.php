<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index (Project $project){
        return view('projects.index')->with(['projects' => $project->getPaginate()]);
    }
    
    public function create (Project $project){
        return view('projects.create')->with(['projects' => $project->get()]);
    }
    
    public function store (Request $request, Project $project){
        $input = $request['project'];
        $project->fill($input)->save();
        return redirect('/');
    }
}
