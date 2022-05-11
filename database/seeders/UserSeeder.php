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

                'name'=>'admin',

                'email'=>'admin@admin.com',

                'is_admin'=>'1',

                'password'=> Hash::make('12345678'),

            ],

            [

                'name'=>'user',

                'email'=>'user@user.com',

                'is_admin'=>'0',

                'password'=> Hash::make('12345678'),

            ],

        ];

        foreach ($user as $key => $value) {

            User::create($value);

        }
    }
}
