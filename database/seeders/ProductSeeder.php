<?php

namespace Database\Seeders;

// database/seeders/ProductSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {
            Product::create([
                'name' => $faker->word . ' ' . $i,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 5, 100),
                'stock' => $faker->numberBetween(10, 200),
            ]);
        }
    }
}

