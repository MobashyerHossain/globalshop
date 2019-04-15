<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Other\Image;
use App\Models\Product\Car;

class ExtraCarImage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $extracarimages = array(
          array(
              'storage/images/products/car/BMW X3 2018 xDrive30i 1.jpg',
              'storage/images/products/car/BMW X3 2018 xDrive30i 2.jpg',
              'storage/images/products/car/BMW X3 2018 xDrive30i 3.jpg',
            ),
            array(
              'storage/images/products/car/BMW X3 2018 M40i nomenclature 1.jpg',
              'storage/images/products/car/BMW X3 2018 M40i nomenclature 2.jpg',
              'storage/images/products/car/BMW X3 2018 M40i nomenclature 3.jpg',
            ),
            array(
              'storage/images/products/car/BMW X3 2016 sDrive28i 1.jpg',
              'storage/images/products/car/BMW X3 2016 sDrive28i 2.jpg',
              'storage/images/products/car/BMW X3 2016 sDrive28i 3.jpg',
            ),
            array(
              'storage/images/products/car/BMW X5 2018 1.jpg',
              'storage/images/products/car/BMW X5 2018 2.jpg',
              'storage/images/products/car/BMW X5 2018 3.jpg',
            ),
            array(
              'storage/images/products/car/BMW X5 2017 sDrive35i 1.jpg',
              'storage/images/products/car/BMW X5 2017 sDrive35i 2.jpg',
              'storage/images/products/car/BMW X5 2017 sDrive35i 3.jpg',
            ),
            array(
              'storage/images/products/car/BMW X5 2015 sdrive35i 1.png',
              'storage/images/products/car/BMW X5 2015 sdrive35i 2.jpg',
              'storage/images/products/car/BMW X5 2015 sdrive35i 3.jpg',
            ),
            array(
              'storage/images/products/car/BMW i8 2017 base 1.jpg',
              'storage/images/products/car/BMW i8 2017 base 2.jpeg',
              'storage/images/products/car/BMW i8 2017 base 3.png',
            ),
            array(
              'storage/images/products/car/BMW i8 2016 1.jpg',
              'storage/images/products/car/BMW i8 2016 2.jpg',
              'storage/images/products/car/BMW i8 2016 3.jpg',
            ),
            array(
              'storage/images/products/car/BMW i8 2015 1.jpg',
              'storage/images/products/car/BMW i8 2015 2.jpg',
              'storage/images/products/car/BMW i8 2015 3.jpg',
            ),
            array(
              'storage/images/products/car/BMW Z4 2007 3.0i 1.jpg',
              'storage/images/products/car/BMW Z4 2007 3.0i 2.jpg',
              'storage/images/products/car/BMW Z4 2007 3.0i 3.jpg',
            ),
            array(
              'storage/images/products/car/BMW Z4 s 2016 1.jpg',
              'storage/images/products/car/BMW Z4 s 2016 2.jpg',
              'storage/images/products/car/BMW Z4 s 2016 3.png',
            ),
            array(
              'storage/images/products/car/BMW Z4 s 2012 1.jpg',
              'storage/images/products/car/BMW Z4 s 2012 2.jpg',
              'storage/images/products/car/BMW Z4 s 2012 3.jpg',
            ),
            array(
              'storage/images/products/car/BMW 2017 740e 1.jpg',
              'storage/images/products/car/BMW 2017 740e 2.jpg',
              'storage/images/products/car/BMW 2017 740e 3.jpg',
            ),
            array(
              'storage/images/products/car/BMW 740i 2015 1.jpg',
              'storage/images/products/car/BMW 740i 2015 2.jpg',
              'storage/images/products/car/BMW 740i 2015 3.jpeg',
            ),
            array(
              'storage/images/products/car/BMW 750i 2017 1.jpg',
              'storage/images/products/car/BMW 750i 2017 2.jpg',
              'storage/images/products/car/BMW 750i 2017 3.jpg',
            ),
            array(
              'storage/images/products/car/Lamborghini Aventador LP740-4S 2017 1.jpg',
              'storage/images/products/car/Lamborghini Aventador LP740-4S 2017 2.jpg',
              'storage/images/products/car/Lamborghini Aventador LP740-4S 2017 3.jpg',
            ),
            array(
              'storage/images/products/car/Lamborghini Aventador LP700-4 2015 1.jpg',
              'storage/images/products/car/Lamborghini Aventador LP700-4 2015 2.jpg',
              'storage/images/products/car/Lamborghini Aventador LP700-4 2015 3.jpg',
            ),
            array(
              'storage/images/products/car/Lamborghini Aventador LP700-4 2012 1.jpg',
              'storage/images/products/car/Lamborghini Aventador LP700-4 2012 2.jpg',
              'storage/images/products/car/Lamborghini Aventador LP700-4 2012 3.jpg',
            ),
            array(
              'storage/images/products/car/Lamborghini Centenario 2016 1.jpg',
              'storage/images/products/car/Lamborghini Centenario 2016 2.jpg',
              'storage/images/products/car/Lamborghini Centenario 2016 3.jpg',
            ),
            array(
              'storage/images/products/car/Lamborghini Veneno 2017 1.jpg',
              'storage/images/products/car/Lamborghini Veneno 2017 2.jpg',
              'storage/images/products/car/Lamborghini Veneno 2017 3.jpg',
            ),
            array(
              'storage/images/products/car/Lamborghini Gallardo 2014 1.jpg',
              'storage/images/products/car/Lamborghini Gallardo 2014 2.jpeg',
              'storage/images/products/car/Lamborghini Gallardo 2014 3.jpg',
            ),
            array(
              'storage/images/products/car/Lamborghini Gallardo 2012 1.jpg',
              'storage/images/products/car/Lamborghini Gallardo 2012 2.jpg',
              'storage/images/products/car/Lamborghini Gallardo 2012 3.jpg',
            ),
            array(
              'storage/images/products/car/Lamborghini Gallardo 2011 1.jpg',
              'storage/images/products/car/Lamborghini Gallardo 2011 2.jpg',
              'storage/images/products/car/Lamborghini Gallardo 2011 3.jpg',
            ),
            array(
              'storage/images/products/car/Lamborghini Reventón 2007 1.jpg',
              'storage/images/products/car/Lamborghini Reventón 2007 2.jpg',
              'storage/images/products/car/Lamborghini Reventón 2007 3.jpg',
            ),
            array(
              'storage/images/products/car/Lamborghini Reventón 2008 1.jpg',
              'storage/images/products/car/Lamborghini Reventón 2008 2.jpg',
              'storage/images/products/car/Lamborghini Reventón 2008 3.jpg',
            ),
            array(
              'storage/images/products/car/Lamborghini Reventón 2009 1.jpg',
              'storage/images/products/car/Lamborghini Reventón 2009 2.jpg',
              'storage/images/products/car/Lamborghini Reventón 2009 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi RS 5 2.9T 2018 1.jpg',
              'storage/images/products/car/Audi RS 5 2.9T 2018 2.jpg',
              'storage/images/products/car/Audi RS 5 2.9T 2018 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi RS 5 4.2 2015 1.jpg',
              'storage/images/products/car/Audi RS 5 4.2 2015 2.jpg',
              'storage/images/products/car/Audi RS 5 4.2 2015 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi RS 5 4.2 2014 1.jpg',
              'storage/images/products/car/Audi RS 5 4.2 2014 2.jpg',
              'storage/images/products/car/Audi RS 5 4.2 2014 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi R8 5.2 2018 1.jpg',
              'storage/images/products/car/Audi R8 5.2 2018 2.jpg',
              'storage/images/products/car/Audi R8 5.2 2018 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi R8 5.2 2017 1.jpg',
              'storage/images/products/car/Audi R8 5.2 2017 2.jpg',
              'storage/images/products/car/Audi R8 5.2 2017 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi R8 4.2 2015 1.jpg',
              'storage/images/products/car/Audi R8 4.2 2015 2.jpg',
              'storage/images/products/car/Audi R8 4.2 2015 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi TT RS 2.5 2018 1.jpg',
              'storage/images/products/car/Audi TT RS 2.5 2018 2.jpg',
              'storage/images/products/car/Audi TT RS 2.5 2018 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi TT RS 2.5 2013 1.jpg',
              'storage/images/products/car/Audi TT RS 2.5 2013 2.jpg',
              'storage/images/products/car/Audi TT RS 2.5 2013 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi TT RS Base 2012 1.jpg',
              'storage/images/products/car/Audi TT RS Base 2012 2.jpg',
              'storage/images/products/car/Audi TT RS Base 2012 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi S5 3.0T 2018 1.jpg',
              'storage/images/products/car/Audi S5 3.0T 2018 2.jpg',
              'storage/images/products/car/Audi S5 3.0T 2018 3.jpeg',
            ),
            array(
              'storage/images/products/car/Audi S5 3.0T 2017 1.jpg',
              'storage/images/products/car/Audi S5 3.0T 2017 2.png',
              'storage/images/products/car/Audi S5 3.0T 2017 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi S5 3.0T 2016 1.jpg',
              'storage/images/products/car/Audi S5 3.0T 2016 2.jpg',
              'storage/images/products/car/Audi S5 3.0T 2016 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi RS7 2018 1.jpg',
              'storage/images/products/car/Audi RS7 2018 2.jpg',
              'storage/images/products/car/Audi RS7 2018 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi RS7 Prestige 2017 1.jpg',
              'storage/images/products/car/Audi RS7 Prestige 2017 2.jpg',
              'storage/images/products/car/Audi RS7 Prestige 2017 3.jpg',
            ),
            array(
              'storage/images/products/car/Audi RS7 Prestige 2015 1.jpg',
              'storage/images/products/car/Audi RS7 Prestige 2015 2.jpg',
              'storage/images/products/car/Audi RS7 Prestige 2015 3.jpg',
            ),
            array(
              'storage/images/products/car/Mercedes-Benz S-Class Base 2018 1.jpg',
              'storage/images/products/car/Mercedes-Benz S-Class Base 2018 2.jpg',
              'storage/images/products/car/Mercedes-Benz S-Class Base 2018 3.jpg',
            ),
            array(
              'storage/images/products/car/Mercedes-Benz S-Class Cabriolet 2018 1.jpg',
              'storage/images/products/car/Mercedes-Benz S-Class Cabriolet 2018 2.jpeg',
              'storage/images/products/car/Mercedes-Benz S-Class Cabriolet 2018 3.jpg',
            ),
            array(
              'storage/images/products/car/Mercedes-Benz S-Class Cabriolet 2017 1.jpg',
              'storage/images/products/car/Mercedes-Benz S-Class Cabriolet 2017 2.jpg',
              'storage/images/products/car/Mercedes-Benz S-Class Cabriolet 2017 3.jpg',
            ),
            array(
              'storage/images/products/car/Mercedes-Benz SLC 300 Base 2019 1.jpg',
              'storage/images/products/car/Mercedes-Benz SLC 300 Base 2019 2.jpg',
              'storage/images/products/car/Mercedes-Benz SLC 300 Base 2019 3.png',
            ),
            array(
              'storage/images/products/car/Mercedes-Benz SLC 300 Base 2018 1.jpg',
              'storage/images/products/car/Mercedes-Benz SLC 300 Base 2018 2.jpg',
              'storage/images/products/car/Mercedes-Benz SLC 300 Base 2018 3.jpg',
            ),
            array(
              'storage/images/products/car/Mercedes-Benz SLC 300 Base 2017 1.png',
              'storage/images/products/car/Mercedes-Benz SLC 300 Base 2017 2.jpg',
              'storage/images/products/car/Mercedes-Benz SLC 300 Base 2017 3.jpg',
            ),
            array(
              'storage/images/products/car/Mercedes-Benz E 400 Cabriolet 2018 1.jpg',
              'storage/images/products/car/Mercedes-Benz E 400 Cabriolet 2018 2.jpg',
              'storage/images/products/car/Mercedes-Benz E 400 Cabriolet 2018 3.jpg',
            ),
            array(
              'storage/images/products/car/Mercedes-Benz E 400 MATIC Cabriolet 2018 1.jpg',
              'storage/images/products/car/Mercedes-Benz E 400 MATIC Cabriolet 2018 2.jpg',
              'storage/images/products/car/Mercedes-Benz E 400 MATIC Cabriolet 2018 3.jpg',
            ),
            array(
              'storage/images/products/car/Mercedes-Benz E-Class Base 2018 1.jpg',
              'storage/images/products/car/Mercedes-Benz E-Class Base 2018 2.jpg',
              'storage/images/products/car/Mercedes-Benz E-Class Base 2018 3.jpg',
            ),
            array(
              'storage/images/products/car/The Mercedes-Benz SL-Class base 2016 1.png',
              'storage/images/products/car/The Mercedes-Benz SL-Class base 2016 2.jpg',
              'storage/images/products/car/The Mercedes-Benz SL-Class base 2016 3.png',
            ),
            array(
              'storage/images/products/car/The Mercedes-Benz SL-Class base 2015 1.jpg',
              'storage/images/products/car/The Mercedes-Benz SL-Class base 2015 2.jpg',
              'storage/images/products/car/The Mercedes-Benz SL-Class base 2015 3.jpg',
            ),
            array(
              'storage/images/products/car/The Mercedes-Benz SL-Class Base 2014 1.jpg',
              'storage/images/products/car/The Mercedes-Benz SL-Class Base 2014 2.png',
              'storage/images/products/car/The Mercedes-Benz SL-Class Base 2014 3.jpg',
            ),
            array(
              'storage/images/products/car/Mercedes-Benz Mercedes-AMG GT Base 2018 1.jpg',
              'storage/images/products/car/Mercedes-Benz Mercedes-AMG GT Base 2018 2.jpg',
              'storage/images/products/car/Mercedes-Benz Mercedes-AMG GT Base 2018 3.jpg',
            ),
            array(
              'storage/images/products/car/Mercedes-Benz Mercedes-AMG GT C Roadster 2018 1.jpg',
              'storage/images/products/car/Mercedes-Benz Mercedes-AMG GT C Roadster 2018 2.jpg',
              'storage/images/products/car/Mercedes-Benz Mercedes-AMG GT C Roadster 2018 3.jpg',
            ),
            array(
              'storage/images/products/car/Mercedes-Benz Mercedes-AMG GT C Roadster 2017 1.jpg',
              'storage/images/products/car/Mercedes-Benz Mercedes-AMG GT C Roadster 2017 2.jpg',
              'storage/images/products/car/Mercedes-Benz Mercedes-AMG GT C Roadster 2017 3.jpg',
            ),
        );

        foreach ($extracarimages as $extras) {
          foreach ($extras as $extra) {
            DB::table('images')->insert([
                'image_type' => 'extra_car_images',
                'uri' => $extra,
            ]);
          }
        }

        $extrastart = (new Image)->getExtraCarImageStartPointId();
        $cars = Car::all();

        foreach ($cars as $car) {
          for ($i=0; $i < 3; $i++) {
            DB::table('more_images')->insert([
                'product_type' => 'car',
                'product_id' => $car->id,
                'image_id' => $extrastart,
            ]);
            $extrastart++;
          }
        }
    }
}
