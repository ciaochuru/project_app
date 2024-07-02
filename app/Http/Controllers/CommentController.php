<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Project;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(Comment $comment, Project $project){
        return view('comments.create')->with(['project' => $project]);
    }
    
    public function store(CommentRequest $request, Comment $comment){
        //$inputに$requestでとってきたcommentを格納
        $input = $request['comment'];
        //コメントを保存
        $comment->fill($input)->save();
        //projects.showに戻る
        return redirect('/projects/' . $comment->project->id);
    }
}
