<?php

use App\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturer = new Manufacturer();
        $manufacturer->title = "Alfa Romeo";
        $manufacturer->save();

        $manufacturer = new Manufacturer();
        $manufacturer->title = "Aston Martin";
        $manufacturer->save();

        $manufacturer = new Manufacturer();
        $manufacturer->title = "Audi";
        $manufacturer->save();

        $manufacturer = new Manufacturer();
        $manufacturer->title = "Aston Martin";
        $manufacturer->save();

        $manufacturer = new Manufacturer();
        $manufacturer->title = "Austin/Mini";
        $manufacturer->save();

        $manufacturer = new Manufacturer();
        $manufacturer->title = "Bentley";
        $manufacturer->save();

        $manufacturer = new Manufacturer();
        $manufacturer->title = "BMW";
        $manufacturer->save();
    }
}
