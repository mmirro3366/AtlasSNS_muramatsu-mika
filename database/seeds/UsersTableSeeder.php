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
            'mail' => 'a@test.mail',
            'password' => bcrypt('123123123'),
        ]);
        DB::table('users')->insert([
            'username' => 'かきくけこ',
            'mail' => 'ka@test.mail',
            'password' => bcrypt('123123123'),
        ]);
        DB::table('users')->insert([
            'username' => 'さしすせそ',
            'mail' => 'sa@test.mail',
            'password' => bcrypt('123123123'),
        ]);
        DB::table('users')->insert([
            'username' => 'たちつてと',
            'mail' => 'ta@test.mail',
            'password' => bcrypt('123123123'),
        ]);
    }
}
