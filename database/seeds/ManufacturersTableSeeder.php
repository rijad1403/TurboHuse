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
        $manufacturer->title = "Audi";
        $manufacturer->save();

        $manufacturer2 = new Manufacturer();
        $manufacturer2->title = "Golf";
        $manufacturer2->save();

        $manufacturer3 = new Manufacturer();
        $manufacturer3->title = "Peugeot";
        $manufacturer3->save();
    }
}
