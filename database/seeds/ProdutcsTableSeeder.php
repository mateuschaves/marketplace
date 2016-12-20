<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Product;

class ProdutcsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          $faker = Faker::create();
          foreach ( range(1, 400) as $i ) {

                  $table = Product::create([
                      'name' => $faker->name,
                      'Unitprice' => $unitprice = $faker->randomFloat(2, 1, 100),
                      'PriceOneHundred' => $unitprice*100,
                      'availability' => 1
                  ]);

          }

    }
}
