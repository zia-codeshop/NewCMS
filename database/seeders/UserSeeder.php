<?php

namespace Database\Seeders;

use App\Models\client;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [

            [

                'name'=>'Admin',

                'email'=>'superadmin@gmail.com',

                'is_admin'=>'1',

                'password'=> Hash::make('password'),

            ],

            [

                'name'=>'User',

                'email'=>'user@gmail.com',

                'is_admin'=>'0',

                'password'=> Hash::make('password'),

            ],

        ];

        foreach ($user as $key => $value) {

            User::create($value);

        }
    }
}
