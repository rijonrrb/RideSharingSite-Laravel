<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Location::factory()->create([
            'location' => 'SegunBagicha',
            'latitude' => '23.733337',
            'longitude' => '90.407513'


        ]);
        \App\Models\Location::factory()->create([
            'location' => 'AIUB',
            'latitude' => '23.822047',
            'longitude' => '90.427600'

        ]);
        \App\Models\Location::factory()->create([
            'location' => 'Khilgaon',
            'latitude' => '23.7522232',
            'longitude' => '90.421561'

        ]);
        \App\Models\Location::factory()->create([
            'location' => 'Mirpur',
            'latitude' => '23.8371883',
            'longitude' => '90.3689834'

        ]);
        \App\Models\Location::factory()->create([
            'location' => 'Uttara',
            'latitude' => '23.875033',
            'longitude' => '90.380962'

        ]);
        \App\Models\Location::factory()->create([
            'location' => 'Shanarpar',
            'latitude' => '23.688831',
            'longitude' => '90.484106'

        ]);
        \App\Models\Location::factory()->create([
            'location' => 'Motijheel',
            'latitude' => '23.7272598',
            'longitude' => '90.4211957'

        ]);
        \App\Models\Location::factory()->create([
            'location' => 'Dhanmondi',
            'latitude' => '23.7388987',
            'longitude' => '90.3801179'

        ]);
        \App\Models\Location::factory()->create([
            'location' => 'Bashundhara City Market',
            'latitude' => '23.751142',
            'longitude' => '90.390641'

        ]);
        \App\Models\Location::factory()->create([
            'location' => 'Hatirjheel',
            'latitude' => '23.773257',
            'longitude' => '90.416339',

        ]);
    }
}
