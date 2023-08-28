<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Modules\UserModule\app\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::factory(200)->create();
       Vendor::factory(200)->create();
       Country::factory(15)->create();
        City::factory(15)->create();
        Address::factory(15)->create();
    }
}
