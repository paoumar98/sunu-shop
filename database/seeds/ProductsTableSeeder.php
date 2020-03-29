<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 20; $i++)
        {
            Product::create([
                'name'=>$faker->sentence(2),
                'price'=>2000,
                'description'=>$faker->text,
                'image'=>'https://via.placeholder.com/200x250'
            ]);
        }

    }
}
