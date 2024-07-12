<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Project;

class ApplicationController extends Controller
{
    public function list(Application $app) {
        return view('applications.list')->with(['apps' => $app->getPaginate()]);
    }
    
    public function create(Project $project) {
        return view('applications.create')->with(['project' => $project]);
    }
    
    public function store(Request $request, Application $app) {
        $input = $request['app'];
        $app->fill($input)->save();
        return redirect(route('apps.list'));
    }
    
    public function show(Application $app){
        return view('applications.show')->with(['app' => $app]);
    }
}
