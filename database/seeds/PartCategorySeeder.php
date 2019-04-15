<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Other\Image;

class PartCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
            array(
              'name' => 'Wheels',
              'details' => 'A wheel is a circular component that is intended to rotate on an axle bearing. The wheel is one of the key components of the wheel and axle which is one of the six simple machines',
            ),
            
            array(
              'name' => 'Brake System',
              'details' => 'The main function of the brake system is to decelerate or decrease the speed of a vehicle. By stepping on the brake pedal, the brake pads compress against the rotor attached to the wheel, which then forces the vehicle to slow down due to friction',
            ),
            
            array(
              'name' => 'Filters',
              'details' => 'Get to know the filters in your car. Every car has four main filters: the cabin filter, oil filter, fuel filter and air filter. The function of all these filters is to enable flows and catch impurities: the dust and contaminants in the air, the impurities in the fuel or the dirt in the motor oil',
            ),
            
            array(
              'name' => 'Oil and Fluids',
              'details' => 'Your engine needs oil to keep the moving parts lubricated. To check the oil, first take your car for a short drive, then wait about five minutes so it can cool down. Under the hood, the dipstick in the oil tank should be close to the front of the engine, near you. It’s usually pretty easy to find. Pull out the dipstick, wipe it with a cloth or towel, and then dip it all the way back into the oil tank',
            ),
            
            array(
              'name' => 'Interior and Comfort',
              'details' => 'Car Interior Accessories That Add Comfort to Your Commute. Protect and accessorize your car with interior car products — from seat covers to floor mats, phone chargers to GPS mounts',
            ),
        );

        $imagestart = (new Image)->getPartCategoryImageStartPointId();
        foreach ($categories as $category) {
          DB::table('part_categories')->insert([
              'name' => $category['name'],
              'details' => $category['details'],
              'image_id' => $imagestart,
          ]);
          $imagestart++;
        }
    }
}
