<?php

use App\Item;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;


class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Item();
        $item->title = 'Turbina za Peugeot 307';
        $item->manufacturer_id = 3;
        $item->price = 300;
        $item->quantity = 10;
        $item->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum impedit facere voluptates tempore cumque!
                        Repellat necessitatibus odit 
                        eveniet atque culpa fugit ducimus, ea excepturi quae magni commodi? Inventore, adipisci magni?';
        $item->releaseYear = 2005;
        $item->save();

        $item2 = new Item();
        $item2->title = 'Turbina za Audi A3';
        $item2->manufacturer_id = 1;
        $item2->price = 500;
        $item2->quantity = 10;
        $item2->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum impedit facere voluptates tempore cumque!
                        Repellat necessitatibus odit 
                        eveniet atque culpa fugit ducimus, ea excepturi quae magni commodi? Inventore, adipisci magni?';
        $item2->releaseYear = 2008;
        $item2->save();

        $item3 = new Item();
        $item3->title = 'Turbina za Golf 4';
        $item3->manufacturer_id = 2;
        $item3->price = 400;
        $item3->quantity = 10;
        $item3->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum impedit facere voluptates tempore cumque!
                        Repellat necessitatibus odit 
                        eveniet atque culpa fugit ducimus, ea excepturi quae magni commodi? Inventore, adipisci magni?';
        $item3->releaseYear = 2003;
        $item3->save();
    }
}
