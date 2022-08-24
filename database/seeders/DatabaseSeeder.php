<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Pantera',
            'email' => 'pantera@gmail.com',
            'password' => Hash::make('123'),
            'role'=> 1
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role'=> 10
        ]);

        foreach (range(1, 10) as $_) {
            DB::table('restaurants')->insert([
                'name' => $faker->company(),
                'address' => $faker->streetAddress(),
                'code' => $faker->randomFloat(),
            ]);
        }

       $meniu = ['Breakfast', 'Lunch', 'Dinner'];
       foreach (range(1, 3) as $key => $_) {
            DB::table('menius')->insert([
                'name' => $meniu[$key],
                'restaurant_id' => rand (1, 11),
             
            ]);
        }
        


        $dishes = ['Yorkshire Pudding', 'Fish and Chips', 'English Pancakes', 'Shepherd Pie', 'Black Pudding', 'Trifle', 'Full English Breakfast', 'Toad in the Hole', 'Steak and Kidney Pie', 'Scotch Egg', 'Lancashire Hot Pot'];
        foreach (range(1, 11) as $key => $_) {
            DB::table('dishes')->insert([
                'name' => $dishes[$key],
                'about' => $faker->text($maxNbChars = 200),
                'photo'=> $faker->imageUrl($width = 640, $height = 480)
            ]);
        }
    }
    }
