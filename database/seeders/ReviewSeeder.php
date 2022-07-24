<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Review::factory()->create([
            'From' => 'Customer_2',
            'To' => 'Rider_1',
            'ride_id' => '4',

            'message' => 'hola'

            


        ]);
        //$table->timestamps();
    }
}
