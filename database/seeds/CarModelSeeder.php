<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Other\Image;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carmodels = array(
            array(  //BMW models
                array(
                  'name' => 'BMW X3',
                  'details' => 'The BMW X3 is a compact luxury crossover SUV manufactured by German automaker BMW',
                  'Year_from_to' => '2003-present',
                  'maker_id' => 1,
                ),

                array(
                  'name' => 'BMW X5',
                  'details' => "The BMW X5 is a mid-size luxury SUV produced by BMW. It was BMW's first SUV and it also featured all-wheel drive and was available with either manual or automatic transmission",
                  'Year_from_to' => '1999-present',
                  'maker_id' => 1,
                ),

                array(
                  'name' => 'BMW i8',
                  'details' => 'The BMW i8 is a plug-in hybrid sports car developed by BMW',
                  'Year_from_to' => '2014-present',
                  'maker_id' => 1,
                ),

                array(
                  'name' => 'BMW Z4',
                  'details' => 'The first-generation BMW Z4 was known as the E85 in roadster form and E86 in coupé form.',
                  'Year_from_to' => '2006-2008',
                  'maker_id' => 1,
                ),

                array(
                  'name' => 'BMW 7 series',
                  'details' => "The BMW 7 Series is a full-sized luxury saloon produced by BMW. The 7 Series is BMW's flagship car and is only available as a sedan",
                  'Year_from_to' => '1977-present',
                  'maker_id' => 1,
                ),
            ),

            array(  //Lamborghini models
                array(
                  'name' => 'Lamborghini Aventador',
                  'details' => 'The Lamborghini Aventador is a mid-engined sports car produced by the Italian automotive manufacturer Lamborghini',
                  'Year_from_to' => '2011-present',
                  'maker_id' => 2,
                ),

                array(
                  'name' => 'Lamborghini Centenario',
                  'details' => 'The Lamborghini Centenario is a limited edition sports car based on the Lamborghini Aventador',
                  'Year_from_to' => '2016-2017',
                  'maker_id' => 2,
                ),

                array(
                  'name' => 'Lamborghini Veneno',
                  'details' => 'The Lamborghini Veneno is a limited production sports car based on the Lamborghini Aventador and was built to celebrate Lamborghini’s 50th anniversary',
                  'Year_from_to' => '2013-2014',
                  'maker_id' => 2,
                ),

                array(
                  'name' => 'Lamborghini Gallardo',
                  'details' => "The Lamborghini Gallardo is a sports car built by the Italian manufacturer Lamborghini. It is Lamborghini's best-selling model",
                  'Year_from_to' => '2003-2014',
                  'maker_id' => 2,
                ),

                array(
                  'name' => 'Lamborghini Reventón',
                  'details' => 'The Lamborghini Reventón is a mid-engine sports car.It was the most expensive Lamborghini road car until the Lamborghini Sesto Elemento',
                  'Year_from_to' => '2007-2009',
                  'maker_id' => 2,
                ),
            ),

            array(  //Audi models
                array(
                  'name' => 'Audi RS5',
                  'details' => "It's a sport car from Audi 5 series.",
                  'Year_from_to' => '2010-2015',
                  'maker_id' => 3,
                ),

                array(
                  'name' => 'Audi R8 4S',
                  'details' => "The Audi R8 is a mid-engine, 2-seater sports car, which uses Audi's trademark quattro permanent all-wheel drive system. Audi R8 4S is the latest version of R8",
                  'Year_from_to' => '2006-present',
                  'maker_id' => 3,
                ),

                array(
                  'name' => 'Audi TT RS 8S',
                  'details' => "Audi TT RS 8S is the current model of Audi TT, which has a 2-door compact sports car marketed by Volkswagen Group subsidiary Audi",
                  'Year_from_to' => '1998-present',
                  'maker_id' => 3,
                ),

                array(
                  'name' => 'Audi S5 B9',
                  'details' => "the Audi S5 (B9) is the high-performance variant of Audi's A5",
                  'Year_from_to' => '2007-present',
                  'maker_id' => 3,
                ),

                array(
                  'name' => 'Audi RS7 C7',
                  'details' => "Audi RS7 (C7) is the high-performance variant of Audi A7",
                  'Year_from_to' => '2013-present',
                  'maker_id' => 3,
                ),
            ),

            array(  //Mercedes-Benz models
                array(
                  'name' => 'Mercedes-Benz S-Class Cabriolet',
                  'details' => "Mercedes-Benz S-Class Cabriolet is from s-class. Its convertable with two door luxury car",
                  'Year_from_to' => '2015-present',
                  'maker_id' => 4,
                ),

                array(
                  'name' => 'Mercedes-Benz SLC',
                  'details' => "The Mercedes-Benz SLC-Class is a compact luxury roadster manufactured by Daimler-Benz in three generations",
                  'Year_from_to' => '1996-present',
                  'maker_id' => 4,
                ),

                array(
                  'name' => 'Mercedes-Benz E-Class Cabriolet',
                  'details' => "Mercedes-Benz E-Class Cabriolet is a convertible version of E-class",
                  'Year_from_to' => '2009-present',
                  'maker_id' => 4,
                ),

                array(
                  'name' => 'Mercedes-Benz SL',
                  'details' => "The Mercedes-Benz SL-Class is a grand touring car manufactured by Mercedes since 1954",
                  'Year_from_to' => '1954-present',
                  'maker_id' => 4,
                ),

                array(
                  'name' => 'Mercedes-Benz Mercedes-AMG GT C Roadster',
                  'details' => "The GT C is a performance orientated variant of the Mercedes-AMG GT",
                  'Year_from_to' => '2017-present',
                  'maker_id' => 4,
                ),
            ),
        );

        $imagestart = (new Image)->getCarModelImageStartPointId();
        foreach ($carmodels as $carmodel) {
            foreach ($carmodel as $model) {
                DB::table('car_models')->insert([
                    'name' => $model['name'],
                    'details' => $model['details'],
                    'Year_from_to' => $model['Year_from_to'],
                    'maker_id' => $model['maker_id'],
                    'image_id' => $imagestart,
                ]);
                $imagestart++;
            }
        }
    }
}
