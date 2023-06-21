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
               'name'=>'kang',
               'email'=>'test1@test.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'gong',
                'email'=>'test2@test.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'kim',
                'email'=>'test3@test.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'hong',
                'email'=>'test4@test.com',
                'type'=>2,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'park',
                'email'=>'test5@test.com',
                'type'=>2,
                'password'=> bcrypt('123456'),
             ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
