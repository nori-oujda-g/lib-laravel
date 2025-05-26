<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory(200)->create();
        // DB::table('customers')->insert([
        //     'name' => Str::random(20),
        //     'email' => Str::random(20) . '@gmail.com',
        //     // 'password'=>Hash::make('psswd'),
        //     'bio' => Str::random(255),
        // ]);
    }
}
