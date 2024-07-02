<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Project;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Comment $comment, Project $project){
        return view('comments.create')->with(['project' => $project]);
    }
    
    public function store(CommentRequest $request, Comment $comment){
        //認証中のuser_idを$userに格納
        $user = Auth::id();
        //$inputに$requestでcommentインスタンスのデータを格納  21行目と23行目が逆だとuser_idがないというエラーがでる。
        $input = $request['comment'];
        //$input[]という配列に対して、key名がuser_id、値が$user(認証中のuser_id)という連想配列で格納
        $input['user_id'] = $user;
        //コメントを保存
        $comment->fill($input)->save();
        //projects.showに戻る
        return redirect('/projects/' . $comment->project->id);
    }
}
