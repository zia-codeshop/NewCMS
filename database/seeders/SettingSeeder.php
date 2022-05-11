<?php

namespace Database\Seeders;


use App\Models\SiteInformation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = [

            [

                'agency_name'=>'Ghani Construction',

                'agency_youtube'=>'favicon-32x32.png',

                'agency_instagram'=>'login-image.jpg',


            ],



        ];

        foreach ($setting as $key => $value) {

            SiteInformation::create($value);

        }
    }
}
