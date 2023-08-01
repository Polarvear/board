<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'김길환',
                'email'=>'test7@test.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'김한길',
                'email'=>'test8@test.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'박진영',
                'email'=>'test9@test.com',
                'type'=>2,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'홍진영',
                'email'=>'test10@test.com',
                'type'=>2,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'이수만',
                'email'=>'test11@test.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'홍진영',
                'email'=>'test12@test.com',
                'type'=>1,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'김영진',
                'email'=>'test13@test.com',
                'type'=>2,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'한량',
                'email'=>'test14@test.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'동방삭',
                'email'=>'test15@test.com',
                'type'=>1,
                'password'=> bcrypt('123456'),
             ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
