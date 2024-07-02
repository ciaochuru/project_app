<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    public function project(){
        return $this->belongsTo(Project::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    protected $fillable = [
            'comment',
            'project_id',
            'user_id'
        ];
}
