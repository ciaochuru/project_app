<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Application extends Model
{
    use HasFactory;
    
    protected $fillable = [
            'explain',
            'app_url'
        ];
    
    //ぺジネーション
    public function getPaginate(int $limit_count = 5){
        return $this->orderBy('created_at', 'desc')->paginate($limit_count);
    }
}
