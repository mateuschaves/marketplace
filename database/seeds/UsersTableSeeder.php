<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


           User::create([
                'name' => 'Mateus henrique',
                'email' => 'mateus063@live.com',
                'password' => bcrypt('zoom4444'),
                'admin' => true
            ]);
    }
}
