<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Other\Image;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = array(
           array(
              'name' => 'BMW X3 2018 xDrive30i',
              'buying_price' => 43600,
              'model_id' => 1,
            ),
            array(
              'name' => 'BMW X3 2018 M40i nomenclature',
              'buying_price' => 54000,
              'model_id' => 1,
            ),
            array(
              'name' => 'BMW X3 2016 sDrive28i',
              'buying_price' => 23000,
              'model_id' => 1,
            ),
            array(
              'name' => 'BMW X5 2018',
              'buying_price' => 60000,
              'model_id' => 2,
            ),
            array(
              'name' => 'BMW X5 2017 sDrive35i',
              'buying_price' => 56600,
              'model_id' => 2,
            ),
            array(
              'name' => 'BMW X5 2015 sdrive35i',
              'buying_price' => 30000,
              'model_id' => 2,
            ),
            array(
              'name' => 'BMW i8 2017 base',
              'buying_price' => 143400,
              'model_id' => 3,
            ),
            array(
              'name' => 'BMW i8 2016',
              'buying_price' => 75000,
              'model_id' => 3,
            ),
            array(
              'name' => 'BMW i8 2015',
              'buying_price' => 70000,
              'model_id' => 3,
            ),
            array(
              'name' => 'BMW Z4 2007 3.0i',
              'buying_price' => 15000,
              'model_id' => 4,
            ),
            array(
              'name' => 'BMW Z4 s 2016',
              'buying_price' => 40000,
              'model_id' => 4,
            ),
            array(
              'name' => 'BMW Z4 s 2012',
              'buying_price' => 22000,
              'model_id' => 4,
            ),
            array(
              'name' => 'BMW 2017 740e',
              'buying_price' => 89000,
              'model_id' => 5,
            ),
            array(
              'name' => 'BMW 740i 2015',
              'buying_price' => 33000,
              'model_id' => 5,
            ),
            array(
              'name' => 'BMW 750i 2017',
              'buying_price' => 95000,
              'model_id' => 5,
            ),
            array(
              'name' => 'Lamborghini Aventador LP740-4S 2017',
              'buying_price' => 400000,
              'model_id' => 6,
            ),
            array(
              'name' => 'Lamborghini Aventador LP700-4 2015',
              'buying_price' => 330000,
              'model_id' => 6,
            ),
            array(
              'name' => 'Lamborghini Aventador LP700-4 2012',
              'buying_price' => 265000,
              'model_id' => 6,
            ),
            array(
              'name' => 'Lamborghini Centenario 2016',
              'buying_price' => 1900000,
              'model_id' => 7,
            ),
            array(
              'name' => 'Lamborghini Veneno 2017',
              'buying_price' => 4500000,
              'model_id' => 8,
            ),
            array(
              'name' => 'Lamborghini Gallardo 2014',
              'buying_price' => 170000,
              'model_id' => 9,
            ),
            array(
              'name' => 'Lamborghini Gallardo 2012',
              'buying_price' => 135000,
              'model_id' => 9,
            ),
            array(
              'name' => 'Lamborghini Gallardo 2011',
              'buying_price' => 110000,
              'model_id' => 9,
            ),
            array(
              'name' => 'Lamborghini Reventón 2007',
              'buying_price' => 1500000,
              'model_id' => 10,
            ),
            array(
              'name' => 'Lamborghini Reventón 2008',
              'buying_price' => 1500000,
              'model_id' => 10,
            ),
            array(
              'name' => 'Lamborghini Reventón 2009',
              'buying_price' => 1500000,
              'model_id' => 10,
            ),
            array(
              'name' => 'Audi RS 5 2.9T 2018',
              'buying_price' => 70000,
              'model_id' => 11,
            ),
            array(
              'name' => 'Audi RS 5 4.2 2015',
              'buying_price' => 50000,
              'model_id' => 11,
            ),
            array(
              'name' => 'Audi RS 5 4.2 2014',
              'buying_price' => 40000,
              'model_id' => 11,
            ),
            array(
              'name' => 'Audi R8 5.2 2018',
              'buying_price' => 175000,
              'model_id' => 12,
            ),
            array(
              'name' => 'Audi R8 5.2 2017',
              'buying_price' => 163000,
              'model_id' => 12,
            ),
            array(
              'name' => 'Audi R8 4.2 2015',
              'buying_price' => 95000,
              'model_id' => 12,
            ),
            array(
              'name' => 'Audi TT RS 2.5 2018',
              'buying_price' => 65000,
              'model_id' => 13,
            ),
            array(
              'name' => 'Audi TT RS 2.5 2013',
              'buying_price' => 4000,
              'model_id' => 13,
            ),
            array(
              'name' => 'Audi TT RS Base 2012',
              'buying_price' => 35000,
              'model_id' => 13,
            ),
            array(
              'name' => 'Audi S5 3.0T 2018',
              'buying_price' => 63000,
              'model_id' => 14,
            ),
            array(
              'name' => 'Audi S5 3.0T 2017',
              'buying_price' => 61000,
              'model_id' => 14,
            ),
            array(
              'name' => 'Audi S5 3.0T 2016',
              'buying_price' => 45000,
              'model_id' => 14,
            ),
            array(
              'name' => 'Audi RS7 2018',
              'buying_price' => 115000,
              'model_id' => 15,
            ),
            array(
              'name' => 'Audi RS7 Prestige 2017',
              'buying_price' => 115000,
              'model_id' => 15,
            ),
            array(
              'name' => 'Audi RS7 Prestige 2015',
              'buying_price' => 70000,
              'model_id' => 15,
            ),
            array(
              'name' => 'Mercedes-Benz S-Class Base 2018',
              'buying_price' => 93000,
              'model_id' => 16,
            ),
            array(
              'name' => 'Mercedes-Benz S-Class Cabriolet 2018',
              'buying_price' => 140000,
              'model_id' => 16,
            ),
            array(
              'name' => 'Mercedes-Benz S-Class Cabriolet 2017',
              'buying_price' => 135000,
              'model_id' => 16,
            ),
            array(
              'name' => 'Mercedes-Benz SLC 300 Base 2019',
              'buying_price' => 50000,
              'model_id' => 17,
            ),
            array(
              'name' => 'Mercedes-Benz SLC 300 Base 2018',
              'buying_price' => 49000,
              'model_id' => 17,
            ),
            array(
              'name' => 'Mercedes-Benz SLC 300 Base 2017',
              'buying_price' => 48000,
              'model_id' => 17,
            ),
            array(
              'name' => 'Mercedes-Benz E 400 Cabriolet 2018',
              'buying_price' => 66300,
              'model_id' => 18,
            ),
            array(
              'name' => 'Mercedes-Benz E 400 MATIC Cabriolet 2018',
              'buying_price' => 68800,
              'model_id' => 18,
            ),
            array(
              'name' => 'Mercedes-Benz E-Class Base 2018',
              'buying_price' => 55500,
              'model_id' => 18,
            ),
            array(
              'name' => 'The Mercedes-Benz SL-Class base 2016',
              'buying_price' => 45000,
              'model_id' => 19,
            ),
            array(
              'name' => 'The Mercedes-Benz SL-Class base 2015',
              'buying_price' => 40000,
              'model_id' => 19,
            ),
            array(
              'name' => 'The Mercedes-Benz SL-Class Base 2014',
              'buying_price' => 47000,
              'model_id' => 19,
            ),
            array(
              'name' => 'Mercedes-Benz Mercedes-AMG GT Base 2018',
              'buying_price' => 112000,
              'model_id' => 20,
            ),
            array(
              'name' => 'Mercedes-Benz Mercedes-AMG GT C Roadster 2018',
              'buying_price' => 146000,
              'model_id' => 20,
            ),
            array(
              'name' => 'Mercedes-Benz Mercedes-AMG GT C Roadster 2017',
              'buying_price' => 140000,
              'model_id' => 20,
            ),
        );

        $imagestart = (new Image)->getCarImageStartPointId();
        foreach ($cars as $car) {
            DB::table('cars')->insert([
                'name' => $car['name'],
                'buying_price' => $car['buying_price'],
                'selling_price' => $car['buying_price']*1.2,
                'max_possible_discount' => .20,
                'current_discount' => round(((rand(50,150)/10)/100), 2),
                'model_id' => $car['model_id'],
                'image_id' => $imagestart,
            ]);
            $imagestart++;
        }
    }
}
