<?php

use Illuminate\Database\Seeder;
use App\Order;
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          $faker = Faker::create();

          $random = rand(1,2);

          if($random == 1)
          {
              $typeOrder = "Unitaria";

          }else if($random == 2){

              $typeOrder = "Centro";

          }

          foreach (range(1, 600) as $i ) {
                  $table = Order::create([
                        'amount' => $faker->numberBetween(1,200),
                        'idProdutos' => $faker->numberBetween(1,400),
                        'price' => $faker->numberBetween(1,100),
                        'idUsers' => $faker->numberBetween(1, 401),
                        'typeOrder' => $typeOrder,
                        'deliveryDate' => $faker->dateTime($min = 'now', $timezone = date_default_timezone_get()),
                        'status' => 'Disponível'
                  ]);
          }
    }
}
