<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function list(Application $app) {
        return view('applications.list')->with(['apps' => $app->getPaginate()]);
    }
    
    public function create(Request $request) {
        return view('applications.create');
    }
}
