<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $title = str_replace('.', '', $faker->sentence(2));

            Product::create([
                'title' => $title,
                'slug' => strtolower(str_replace(' ', '-', $title)),
                'base_price' => round($faker->numberBetween(10000, 50000), -3),
                'price' => round($faker->numberBetween(50000, 100000), -3),
                'description' => $faker->paragraph,
            ]);
        }
    }
}