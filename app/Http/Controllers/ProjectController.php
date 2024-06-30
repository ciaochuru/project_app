<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index (Project $project){
        return view('projects.index')->with(['projects' => $project->getPaginate()]);
    }
    
    public function create (Project $project){
        return view('projects.create')->with(['project' => $project->get()]);
    }
    
    public function store (ProjectRequest $request, Project $project){
        //ログインしているユーザーのidを取得
        $user = Auth::id();
        
        $input = $request['project'];
        //$inputという配列に対してuser_idというkeyで$userという値を挿入する
        $input['user_id'] = $user;
        $project->fill($input)->save();//fillは配列でしか使えない,モデルでfillableをかいておく
        return redirect('/');
    }
    
    public function edit(){
        
    }
    
    public function show (Project $project){
        return view('projects.show')->with(['project' => $project]);
    }
    
    public function delete (Project $project){
        $project->delete();
        return redirect('/');
    }
    
    public function search(ProjectRequest $request){
        //テーブルからすべてのレコードを取得
        $projects = Project::query();
        
        //nameがkeywordの要素を取得して$keywordに代入
        $keyword = $request->input('keyword');
        
        //$keywordが空でない場合、検索を実行
        if(!empty($keyword)){
            $posts = Project::where('title', 'LIKE', "%${keyword}%")
                            ->orWhere('body', 'LIKE', "%${keyword}%")
                            ->orderBy('created_at', 'DESC')->paginate(5)
                            ->appends(['keyword' => $keyword]);//paginateをするときはappends()でリクエストパラメータで送られてきたデータを取得する
        }else{
            $posts = $projects->orderBy('created_at', 'DESC')->paginate(5);
        }
        
        //検索を実行して、viewに検索データを渡し表示
        return view('projects.index')->with(['projects' => $posts]);
    }
}
