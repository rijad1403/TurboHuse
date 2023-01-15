<?php

use Illuminate\Database\Seeder;
use App\Manufacturer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ManufacturersTableSeeder::class,
            ItemsTableSeeder::class,
            UsersTableSeeder::class
        ]);
    }
}
