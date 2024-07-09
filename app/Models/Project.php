<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    
    //ぺジネーション
    public function getPaginate(int $limit_count = 5){
        return $this->orderBy('created_at', 'desc')->paginate($limit_count);
    }
    
    protected $fillable = [
            'title',
            'body',
            'user_id'
        ];
}
