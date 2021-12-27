<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
            'name'=>'OPPO A16',
            "price"=>"17999",
            "description"=>"a smartphone with 6gb ram and much more feature",
            "category"=>"mobile",
            "gallery"=>"https://www.oppo.com/in/smartphones/series-a/a16/"
            ],
            [
             'name'=>'Mi 11X Pro',
            "price"=>"36999",
            "description"=>"a smartphone with 8gb ram and much more feature",
            "category"=>"mobile",
            "gallery"=>"https://www.mi.com/in/mi-11x-pro/"
            ],
            [
                'name'=>'LENOVO',
            "price"=>"39999",
            "description"=>"a Leptop with 8gb ram and much more feature",
            "category"=>"Leptop",
            "gallery"=>"https://www.lenovo.com/in/en/laptops/thinkpad/thinkpad-x1/ThinkPad-X1-Nano/p/22TP2X1X1N1"
            ],
            [
                'name'=>'SAMSUNG Galaxy S21 5G',
            "price"=>"105000",
            "description"=>"a smartphone with 4gb ram and much more feature",
            "category"=>"mobile",
            "gallery"=>"https://www.samsung.com/in/smartphones/galaxy-s/"
            ]
        ]);
    }
}
