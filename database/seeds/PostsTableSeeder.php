<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('posts')->insert([
        'user_id' => '1',
        'post' => 'おはよう',
        'created_at' => now(),
        'updated_at' => now()
        ]);
        DB::table('posts')->insert([
        'user_id' => '2',
        'post' => 'こんにちは',
        'created_at' => now(),
        'updated_at' => now()
        ]);
        DB::table('posts')->insert([
        'user_id' => '3',
        'post' => 'こんばんは',
        'created_at' => now(),
        'updated_at' => now()
        ]);
        DB::table('posts')->insert([
        'user_id' => '4',
        'post' => 'さようなら',
        'created_at' => now(),
        'updated_at' => now()
        ]);
    }
}
