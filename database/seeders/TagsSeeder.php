<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
        'tag_name' => '日常',
        ]);
        
        DB::table('tags')->insert([
        'tag_name' => 'アニメ・マンガ',
        ]);
        
        DB::table('tags')->insert([
        'tag_name' => 'ゲーム',
        ]);
        
        DB::table('tags')->insert([
        'tag_name' => '音楽',
        ]);
    }
}
