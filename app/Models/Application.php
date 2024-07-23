<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Application extends Model
{
    use HasFactory;
    
    protected $fillable = [
            'project_id',
            'title',
            'explain',
            'app_url'
        ];
        
    public function project(){
        return $this->belongsTo(Project::class);
    }
    
    //ぺジネーション
    public function getPaginate(int $limit_count = 5){
        return $this->orderBy('created_at', 'desc')->paginate($limit_count);
    }
}
