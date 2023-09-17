<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories =[
            ['id'=>1, 'name'=>'Digital Camera', 'description'=>'', 'image_path'=>''],
            ['id'=>2, 'name'=>'Watches', 'description'=>'', 'image_path'=>''],
            ['id'=>3, 'name'=>'Bags', 'description'=>'fashion and different', 'image_path'=>''],
            ['id'=>4, 'name'=>'Food', 'description'=>'Fast food and public', 'image_path'=>''],
            ['id'=>5, 'name'=>'Electronics', 'description'=>'all electronics', 'image_path'=>''],
            ['id'=>6, 'name'=>'Makeup', 'description'=>'makeup and body mist', 'image_path'=>'']
        ];

        //create using query builder
        DB::table('categories')->insertOrIgnore($categories);

        //to excute in php === php artisan db:seed
        //create use eloquent
        for ($i=1; $i <25 ; $i++) { 
            Product::create(
                
                ['name'=>'product' .$i,
                'description'=>'product description '. $i,
                'image_path'=>'image path product'.$i,
                'quantity'=>rand(1,50),
                'price'=>rand(10,100),
                'category_id'=>rand(1,6)
                ]
            );
        }


    }
}
