<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'あいうえお',
            'mail' => 'aiueo@test.mail',
            'password' => bcrypt('123456'),
        ]);
    }
}
