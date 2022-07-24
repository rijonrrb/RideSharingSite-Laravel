<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\customerRating::factory()->create([

            'point' => 50,
            'amount' => 5

        ]);
        \App\Models\customerRating::factory()->create([
            'point' => 100,
            'amount' => 15

        ]);
        \App\Models\customerRating::factory()->create([
            'point' => 150,
            'amount' => 20

        ]);
        \App\Models\customerRating::factory()->create([
            'point' => 200,
            'amount' => 40

        ]);
    }
}
