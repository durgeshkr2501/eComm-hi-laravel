<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        DB::table('users')->insert([[
            'name'=> 'Durgesh',
            'email'=>'durgesh@gmail.com',
            'password'=>Hash::make('password'),
        ],
        [
            'name'=> 'Pappu',
            'email'=>'pappu@gmail.com',
            'password'=>Hash::make('password'),
        ]]);
    }
}
