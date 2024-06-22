<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;
    
   //ぺジネーション
    public function getPaginate(int $limit_count = 5){
        return $this->orderBy('updated_at', 'desc')->paginate(5);
    }
    
    protected $fillable = [
            'title',
            'body',
        ];
}
