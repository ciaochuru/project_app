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
    
    public function show (Project $project){
        return view('projects.show')->with(['project' => $project]);
    }
    
    public function delete (Project $project){
        $project->delete();
        return redirect('/');
    }
    
    public function search(Request $request){
        //テーブルからすべてのレコードを取得
        $projects = Project::query();
        
        //nameがkeywordの要素を取得して$keywordに代入
        $keyword = $request->input('keyword');
        
        //$keywordが空でない場合、検索を実行
        if(!empty($keyword)){
            $posts = Project::where('title', 'LIKE', "%${keyword}%")
                            ->orWhere('body', 'LIKE', "%${keyword}%")->paginate(5);
        }else{
            $posts = $projects->orderBy('created_at', 'DESC')->paginate(5);
        }
        
        //検索を実行して、viewに検索データを渡し表示
        return view('projects.index')->with(['projects' => $posts]);
    }
}
