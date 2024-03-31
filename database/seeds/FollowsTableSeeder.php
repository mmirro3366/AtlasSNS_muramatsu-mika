<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $following_data = [
        ['user_id' => 1, 'following_id' => 2], //ID: 1はID: 3をフォローしてる
        ['user_id' => 1, 'following_id' => 3],
        ['user_id' => 1, 'following_id' => 4],
        ['user_id' => 2, 'following_id' => 1],
        ['user_id' => 2, 'following_id' => 3],
        ['user_id' => 3, 'following_id' => 2],
        ['user_id' => 3, 'following_id' => 4],
        ['user_id' => 4, 'following_id' => 1],
    ];

    }
}
