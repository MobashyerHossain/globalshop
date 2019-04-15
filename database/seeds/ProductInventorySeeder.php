<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Product\Car;
use App\Models\Product\Part;

class ProductInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = Car::all();
        $parts = Part::all();

        foreach ($cars as $car) {
            DB::table('product_inventories')->insert([
                'product_type' => 'car',
                'product_id' => $car->id,
                'quantity' => rand(15,30),
                'showroom_id' => 1,
            ]);
        }

        foreach ($parts as $part) {
            DB::table('product_inventories')->insert([
                'product_type' => 'part',
                'product_id' => $part->id,
                'quantity' => rand(15,30),
                'showroom_id' => 1,
            ]);
        }
    }
}
