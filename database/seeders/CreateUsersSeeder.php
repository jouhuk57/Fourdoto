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
               'name'=>'User',
               'email'=>'user@nicesnippets.com',
               'type'=>0,
               'gender'=>'M',
               'Mob'=>'9744460451',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Super Admin User',
               'email'=>'super-admin@nicesnippets.com',
               'type'=>1,
               'gender'=>'M',
               'Mob'=>'9744460452',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Manager User',
               'email'=>'manager@nicesnippets.com',
               'type'=> 2,
               'gender'=>'M',
               'Mob'=>'9744460453',
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}