<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Chat::factory()->create([
            'customerId' => 1,
            'riderId' => 1,
            'cmessage' => 'hi',
            'rmessage' => Null,
            'time' => '2022-06-23 02:24:08'

        ]);
    }
}
