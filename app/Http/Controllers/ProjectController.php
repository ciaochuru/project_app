<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index (Project $project){
        return view('projects.index')->with(['projects' => $project->getPaginate()]);
    }
    
    public function create (Project $project, Tag $tag){
        return view('projects.create')->with(['projects' => $project->get(), 'tags' => $tag->get()]);
    }
    
    public function store (ProjectRequest $request, Project $project){
        //ログインしているユーザーのidを取得
        $user = Auth::id();
        
        $input_project = $request['project'];
        $input_tags = $request->tags_array;//tags_arrayはviewで指定したname属性
        
        //$inputという配列に対してuser_idというkeyで$userという値を挿入する
        $input_project['user_id'] = $user;
        //プロジェクトのtitle,bodyを保存
        $project->fill($input_project)->save();//fillは配列でしか使えない,モデルでfillableをかいておく
        //タグの保存
        $project->tags()->attach($input_tags);
        return redirect('/');
    }
    
    public function edit(Project $project){
        return view('projects.edit')->with(['project' => $project]);
    }
    
    public function update(ProjectRequest $request, Project $project){
        $input = $request['project'];
        $project->fill($input)->save();
        return redirect('/projects/' . $project->id);
    }
    
    public function show (Project $project){
        return view('projects.show')->with(['project' => $project, 'comments' => $project->comments]);
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
