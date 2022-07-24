<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Rider::factory()->create([
            'name' => 'Abc',
            'gender' => 'male',
            'dob' => '2000-01-01',
            'peraddress' => 'Dhaka',
            'preaddress' => 'Dhaka',
            'phone' => '01711111111',
            'email' => 'abc@gmail.com',
            'nid' => '58101758123',
            'dlic' => '1254891230',
            'status' => 'Approved',
            'rpoint' => '23',
            'balance' => '5000',
            'username' => 'abc',
            'password' => md5('abc'),
            'image' => 'index.png',
            'created_at' => '2022-05-23 02:24:08',
            'updated_at' => '2022-05-23 02:24:08'

        ]);
            \App\Models\Rider::factory()->create([
            'name' => 'b',
            'gender' => 'male',
            'dob' => '2000-01-01',
            'peraddress' => 'Dhaka',
            'preaddress' => 'Dhaka',
            'phone' => '01711111111',
            'email' => 'abc@gmail.com',
            'nid' => '58101758123',
            'dlic' => '1254891230',
            'status' => 'Pending',
            'rpoint' => '23',
            'balance' => '5000',
            'username' => 'abc',
            'password' => md5('abc'),
            'image' => 'index.png',
            'created_at' => '2022-03-23 02:24:08',
            'updated_at' => '2022-03-23 02:24:08'

        ]);
            \App\Models\Rider::factory()->create([
            'name' => 'c',
            'gender' => 'male',
            'dob' => '2000-01-01',
            'peraddress' => 'Dhaka',
            'preaddress' => 'Dhaka',
            'phone' => '01711111111',
            'email' => 'abc@gmail.com',
            'nid' => '58101758123',
            'dlic' => '1254891230',
            'status' => 'Pending',
            'rpoint' => '23',
            'balance' => '5000',
            'username' => 'abc',
            'password' => md5('abc'),
            'image' => 'index.png',
            'created_at' => '2022-06-23 02:24:06',
            'updated_at' => '2022-06-23 02:24:06'

        ]);
            \App\Models\Rider::factory()->create([
            'name' => 'Abc',
            'gender' => 'male',
            'dob' => '2000-01-01',
            'peraddress' => 'Dhaka',
            'preaddress' => 'Dhaka',
            'phone' => '01711111111',
            'email' => 'abc@gmail.com',
            'nid' => '58101758123',
            'dlic' => '1254891230',
            'status' => 'Pending',
            'rpoint' => '23',
            'balance' => '5000',
            'username' => 'abc',
            'password' => md5('abc'),
            'image' => 'index.png',
            'created_at' => '2022-06-23 02:24:07',
            'updated_at' => '2022-06-23 02:24:07'

        ]);
    }
}
