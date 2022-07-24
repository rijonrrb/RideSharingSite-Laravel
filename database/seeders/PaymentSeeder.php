<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \App\Models\Payment::factory()->create([
            'kilo' => '30',
            'amount' => '120',
            'created_at' => '2022-06-23 02:24:08',
            'updated_at' => '2022-06-23 02:24:08'

        ]);

    }
}
