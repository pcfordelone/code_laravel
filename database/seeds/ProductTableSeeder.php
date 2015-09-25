<?php

use \Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use FRD\Product;
use Faker\Factory as Faker;


class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->truncate();

        $faker = Faker::create();

        foreach (range(1, 15) as $i) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->sentence(10),
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 3000)
            ]);
        }
    }
}