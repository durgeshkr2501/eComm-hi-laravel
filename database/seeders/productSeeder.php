<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        product::truncate();
        DB::table('products')->insert([
            [
                'name' => 'OPPO A12',
                "price" => "9490",
                "description" => "OPPO A12 (Black,32GB) (3GB RAM)",
                "category" => "mobile",
                "gallery" => "Oppo a12-mobile-phone-large-1.jpg"
            ],
            [
                'name' => 'OPPO A53',
                "price" => "14490",
                "description" => "OPPO A53 (Electric Black,64GB)(4GB RAM)",
                "category" => "mobile",
                "gallery" => "Oppo-A53-4GB .jpg"
            ],
            [
                'name' => 'OPPO K5',
                "price" => "19999",
                "description" => "OPPO K5 (8GB RAM + 128GB)",
                "category" => "mobile",
                "gallery" => "oppo-k5-8gb-ram-256g.jpg"
            ],
            
            [
                'name' => 'Mi 11X Pro',
                "price" => "34800",
                "description" => "Mi 11X Pro 5G (Lunar White,128GB)(8GB RAM)",
                "category" => "mobile",
                "gallery" => "mi-11-1.jpg"
            ],
            [
                'name' => 'LENOVO',
                "price" => "39999",
                "description" => "a Leptop with 8gb ram and much more feature",
                "category" => "Leptop",
                "gallery" => "ThinkBook-14-Gen-2-Intel-1.jpg"
            ],
            [
                'name' => 'SAMSUNG Galaxy S21 5G',
                "price" => "105000",
                "description" => "a smartphone with 4gb ram and much more feature",
                "category" => "mobile",
                "gallery" => "samsung-galaxy-1.jpg"
            ],
            [
                'name' => 'Realme TV 32inch',
                "price" => "16999",
                "description" => "realme 80 cm (32inch)HD Ready LED Smart Android TV",
                "category" => "tv",
                "gallery" => "Realme TV 32inch-1.jpg"
            ],
            [
                'name' => 'LG Refrigerator',
                "price" => "45490",
                "description" => "LG 420 L Frost Free Double Door 5 Star Refrigerator",
                "category" => "Refrigerato",
                "gallery" => "LG-Refrigerator1200Wx1200H.jpg"
            ],
            [
                'name' => 'Realme TV 43inch',
                "price" => "105000",
                "description" => "realme 108 cm (43inch) Ultra HD (4K) LED Smart Android TV with Handsfree Voice Search and Dolby Vision $ Atoms (RMV2004)",
                "category" => "tv",
                "gallery" => "Realme Tv 43inch.jpg"
            ],
            [
                'name' => 'Realme 5pro',
                "price" => "15999",
                "description" => "realme 5 pro (Chroma White, 64 GB)(6GB RAm)",
                "category" => "mobile",
                "gallery" => "Realme 5pro.jpg"
            ],
        ]);
    }
}
