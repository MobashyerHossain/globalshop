<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Other\Image;

class PartSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = array(
            //wheels
            array(
              'name' => 'Alloy Wheel',
              'details' => 'In the automotive industry, alloy wheels are wheels that are made from an alloy of aluminium or magnesium. Alloys are mixtures of a metal and other elements',
              'category_id' => 1,
            ),
            array(
              'name' => 'Steel Wheel',
              'details' => "There are definite benefits of steel wheels - which is a good thing, considering the fact that they're standard equipment on base models of most new non-luxury passenger vehicles! First off, alloy wheels – particularly forged aluminum alloys – are more expensive than steel wheels, mainly because of differences in production techniques",
              'category_id' => 1,
            ),
            array(
              'name' => 'Aluminium Wheel',
              'details' => "Matching cast aluminium wheels in a variety of designs. Are your Audi's high-quality tyres still in good condition but you'd like to freshen up your vehicle's looks?",
              'category_id' => 1,
            ),

            //brake system
            array(
              'name' => 'Brake Disc',
              'details' => 'A disc brake is a type of brake that uses calipers to squeeze pairs of pads against a disc or "rotor" to create friction.This action retards the rotation of a shaft, such as a vehicle axle, either to reduce its rotational speed or to hold it stationary. The energy of motion is converted into waste heat which must be dispersed',
              'category_id' => 2,
            ),
            array(
              'name' => 'Brake Pad',
              'details' => 'Brake pads are a component of disc brakes used in automotive and other applications. Brake pads are steel backing plates with friction material bound to the surface that faces the disc brake rotor',
              'category_id' => 2,
            ),
            array(
              'name' => 'Brake Shoe',
              'details' => 'A brake shoe is the part of a braking system which carries the brake lining in the drum brakes used on automobiles',
              'category_id' => 2,
            ),

            //filters
            array(
              'name' => 'Air Filter',
              'details' => 'A particulate air filter is a device composed of fibrous or porous materials which removes solid particulates such as dust, pollen, mold, and bacteria from the air. Filters containing an absorbent or catalyst such as charcoal (carbon) may also remove odors and gaseous pollutants such as volatile organic compounds or ozone',
              'category_id' => 3,
            ),
            array(
              'name' => 'Fuel Filter',
              'details' => 'A fuel filter is a filter in the fuel line that screens out dirt and rust particles from the fuel, normally made into cartridges containing a filter paper. They are found in most internal combustion engines',
              'category_id' => 3,
            ),
            array(
              'name' => 'Oil Filter',
              'details' => 'An oil filter is a filter designed to remove contaminants from engine oil, transmission oil, lubricating oil, or hydraulic oil. Oil filters are used in many different types of hydraulic machinery. A chief use of the oil filter is in internal-combustion engines in on- and off-road motor vehicles, light aircraft, and various naval vessels',
              'category_id' => 3,
            ),

            //OilandFluids
            array(
              'name' => 'Antifreeze',
              'details' => 'As well as preventing water from freezing up, antifreeze raises the boiling point of engine coolant to prevent overheating',
              'category_id' => 4,
            ),
            array(
              'name' => 'Engine Oil',
              'details' => 'Engine oil is used for lubrication of internal combustion engines. The main function of motor oil is to reduce friction and wear on moving parts and to clean the engine from sludge and varnis',
              'category_id' => 4,
            ),
            array(
              'name' => 'Hydraulic oil',
              'details' => 'The function of a hydraulic fluid is to provide energy transmission through the system which enables work and motion to be accomplished',
              'category_id' => 4,
            ),

            //InteriorandComforts
            array(
              'name' => 'Boot Liner',
              'details' => 'A car boot liner is a synthetic mat designed to protect the automobile boot or trunk against damage from dirt or spills and to pad cargo against abrasion or shock',
              'category_id' => 5,
            ),
            array(
              'name' => 'Window Regulator',
              'details' => 'The mechanism that moves the window up and down is called the window regulator.The window regulator is powered by an electric motor, called window motor',
              'category_id' => 5,
            ),
            array(
              'name' => 'Floor Mats',
              'details' => 'Floor mat are used to prevent dirts from cars actual floors',
              'category_id' => 5,
            ),
        );

        $imagestart = (new Image)->getPartSubCategoryImageStartPointId();
        foreach ($subcategories as $subcategory) {
            DB::table('part_sub_categories')->insert([
                'name' => $subcategory['name'],
                'details' => $subcategory['details'],
                'category_id' => $subcategory['category_id'],
                'image_id' => $imagestart,
            ]);
            $imagestart++;
        }
    }
}
