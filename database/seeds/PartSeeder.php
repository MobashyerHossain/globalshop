<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Other\Image;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $parts = array(
              //Alloy Wheels
              array(
                'name' => 'AEZ Straight',
                'buying_price' => 301.71,
                'manufacturer_id' => 20,
                'sub_category_id' => 1,
              ),

              array(
                'name' => 'AXXION AX7',
                'buying_price' => 224.85,
                'manufacturer_id' => 21,
                'sub_category_id' => 1,
              ),

              array(
                'name' => 'BBS CH-R',
                'buying_price' => 569.70,
                'manufacturer_id' => 22,
                'sub_category_id' => 1,
              ),

              //Steel Wheels
              array(
                'name' => 'Magnetto Wheels MW R1-1341',
                'buying_price' => 144.56,
                'manufacturer_id' => 23,
                'sub_category_id' => 2,
              ),

              array(
                'name' => 'Steger ST6355',
                'buying_price' => 149.22,
                'manufacturer_id' => 24,
                'sub_category_id' => 2,
              ),

              array(
                'name' => 'Magnetto Wheels MW R1-1689',
                'buying_price' => 569.70,
                'manufacturer_id' => 23,
                'sub_category_id' => 2,
              ),

              //Alluminium Wheels
              array(
                'name' => 'Wolfrace Eurosport Assassin-X',
                'buying_price' => 144.56,
                'manufacturer_id' => 25,
                'sub_category_id' => 3,
              ),

              array(
                'name' => 'ATS Temperament 5',
                'buying_price' => 149.22,
                'manufacturer_id' => 26,
                'sub_category_id' => 3,
              ),

              array(
                'name' => 'Lenso Samurai D1-R',
                'buying_price' => 569.70,
                'manufacturer_id' => 27,
                'sub_category_id' => 3,
              ),

              //Brake discs
              array(
                'name' => 'Brake Discs 345mm',
                'buying_price' => 35.50,
                'manufacturer_id' => 1,
                'sub_category_id' => 4,

              ), //BMW7series

              array(
                'name' => 'Brake Discs Rear Alex 370mm',
                'buying_price' => 67.45,
                'manufacturer_id' => 2,
                'sub_category_id' => 4,

              ), //bmw7s

              array(
                'name' => 'Brake Disc 295mm',
                'buying_price' => 41.42,
                'manufacturer_id' => 3,
                'sub_category_id' => 4,

              ), //mer_benz_e_class_cabriolet
              array(
                'name' => 'Brake Disc 310mm',
                'buying_price' => 26.03,
                'manufacturer_id' => 4,
                'sub_category_id' => 4,

              ), //audi tt

              //Brake pads
              array(
                'name' => 'Brake Pads Set disk brake Rear A8 TT',
                'buying_price' => 14.79,
                'manufacturer_id' => 4,
                'sub_category_id' => 5,

              ), //audi tt

              array(
                'name' => 'Brake Pads Set disk brake Rear A r84',
                'buying_price' => 24.85,
                'manufacturer_id' => 3,
                'sub_category_id' => 5,

              ), //audi r84s

              array(
                'name' => 'Brake Pad Set disc brake Front MB sl3',
                'buying_price' => 36.68,
                'manufacturer_id' => 3,
                'sub_category_id' => 5,

              ), //mb sl conv

              array(
                'name' => 'Brake pad Set disc brake Rear b7s',
                'buying_price' => 15.98,
                'manufacturer_id' => 3,
                'sub_category_id' => 5,

              ), //7series

              //Brake shoes
              array(
                'name' => 'Brake Shoe Set 180mm',
                'buying_price' => 20.12,
                'manufacturer_id' => 5,
                'sub_category_id' => 6,

              ), //7series

              array(
                'name' => 'Brake Shoe Set Rear Axle MB 164mm',
                'buying_price' => 15.38,
                'manufacturer_id' => 6,
                'sub_category_id' => 6,

              ), //mb e class c 2010

              array(
                'name' => 'Brake Shoe Set Rear Axle 164mm',
                'buying_price' => 21.90,
                'manufacturer_id' => 5,
                'sub_category_id' => 6,

              ), //mb s class saloon 2003

              array(
                'name' => 'Brake Shoe Set Rear Axle 161mm',
                'buying_price' => 21.30,
                'manufacturer_id' => 5,
                'sub_category_id' => 6,

              ), //audi a5

              //Air filters
              array(
                'name' => 'Air Filter a5 s9',
                'buying_price' => 18.93,
                'manufacturer_id' => 7,
                'sub_category_id' => 7,

              ), //Air Filter for AUDI A5 B9 Sportback

              array(
                'name' => 'Air Filter MB e4',
                'buying_price' => 15.98,
                'manufacturer_id' => 8,
                'sub_category_id' => 7,

              ), //Air Filter for MERCEDES-BENZ E-Class

              array(
                'name' => 'Air Filter B1 x3',
                'buying_price' => 11.84,
                'manufacturer_id' => 16,
                'sub_category_id' => 7,

              ), //BMW x3

              array(
                'name' => 'Air Filter B1 x5',
                'buying_price' => 15.38,
                'manufacturer_id' => 16,
                'sub_category_id' => 7,

              ), //bmw x5

              //Fuel filters
              array(
                'name' => 'Fuel Filter MB e5',
                'buying_price' => 14.79,
                'manufacturer_id' => 9,
                'sub_category_id' => 8,

              ), //Fuel Filter for MERCEDES-BENZ E-Class

              array(
                'name' => 'Fuel Filter A3 c',
                'buying_price' => 18.93,
                'manufacturer_id' => 17,
                'sub_category_id' => 8,

              ), //audi a3 conver

              array(
                'name' => 'Fuel Filter b7s',
                'buying_price' => 17.75,
                'manufacturer_id' => 16,
                'sub_category_id' => 8,

              ), //BMW 7 series

              array(
                'name' => 'Fuel Filter b1 7s',
                'buying_price' => 25.43,
                'manufacturer_id' => 10,
                'sub_category_id' => 8,

              ), //BMW 7 series

              array(
                'name' => 'Oil filter en 7sB',
                'buying_price' => 13.01,
                'manufacturer_id' => 7,
                'sub_category_id' => 9,

              ), //bmw 7s

              //Oil filters
              array(
                'name' => 'Oil filter en 7sB 1',
                'buying_price' => 9.47,
                'manufacturer_id' => 18,
                'sub_category_id' => 9,

              ), //bmw 7s

              array(
                'name' => 'Oil filter en E C 2',
                'buying_price' => 15.21,
                'manufacturer_id' => 16,
                'sub_category_id' => 9,

              ), //Mercedes-benz e-class saloon

              array(
                'name' => 'Oil filter en E C 1',
                'buying_price' => 14.16,
                'manufacturer_id' => 18,
                'sub_category_id' => 9,

              ), //Mercedes-benz e-class saloon

              array(
                'name' => 'Antifreeze DY 01x',
                'buying_price' => 20.12,
                'manufacturer_id' => 12,
                'sub_category_id' => 10,

              ), //lamborghini avetador

              array(
                'name' => 'Antifreeze RADICOOL NF',
                'buying_price' => 10.65,
                'manufacturer_id' => 13,
                'sub_category_id' => 10,

              ), //BMW Z4

              array(
                'name' => 'Antifreeze TL 7s1',
                'buying_price' => 7.69,
                'manufacturer_id' => 11,
                'sub_category_id' => 10,

              ), //bmw 7 s 2015-

              array(
                'name' => 'Antifreeze K2 7s',
                'buying_price' => 4.50,
                'manufacturer_id' => 13,
                'sub_category_id' => 10,

              ), //bmw 7s 2015-

              array(
                'name' => 'Total Engine Oil 5W-40 QUARTZ',
                'buying_price' => 8.87,
                'manufacturer_id' => 11,
                'sub_category_id' => 11,

              ),//Engine Oil for MERCEDES-BENZ E-Class Convertible (A207) E 400 (207.461)

              array(
                'name' => 'Dynamax Engine Oil 5W-30 PREMIUM',
                'buying_price' => 7.69,
                'manufacturer_id' => 12,
                'sub_category_id' => 11,

              ),//BMW z4

              array(
                'name' => 'Engine Oil 5W-30 PREMIUM ULTRA GMD 1',
                'buying_price' => 8.28,
                'manufacturer_id' => 12,
                'sub_category_id' => 11,

              ), //bmw 7 s 2015-

              array(
                'name' => 'Engine Oil 5W-40 GTX',
                'buying_price' => 8.52,
                'manufacturer_id' => 13,
                'sub_category_id' => 11,

              ), //bmw 7s 2015-

              array(
                'name' => 'Hydraulic Oil Dx lam6',
                'buying_price' => 8.52,
                'manufacturer_id' => 12,
                'sub_category_id' => 12,

              ), //lamborghini aventador

              array(
                'name' => 'Central Hydraulic Oil',
                'buying_price' => 10.06,
                'manufacturer_id' => 12,
                'sub_category_id' => 12,

              ), //mercedes-benz slk 55amg

              array(
                'name' => 'Hydraulic Oil MB slk9',
                'buying_price' => 9.23,
                'manufacturer_id' => 12,
                'sub_category_id' => 12,

              ), //mercedes-benz slk 55amg

              array(
                'name' => 'Hydraulic Oil AD TT R6',
                'buying_price' => 8.88,
                'manufacturer_id' => 12,
                'sub_category_id' => 12,

              ), //audi tt rs

              array(
                'name' => 'Novline MAT013 Boot Liner Tray Mat',
                'buying_price' => 2.85,
                'manufacturer_id' => 14,
                'sub_category_id' => 13,

              ),

              array(
                'name' => 'Window Regulator Left Rear Electric',
                'buying_price' => 1.66,
                'manufacturer_id' => 3,
                'sub_category_id' => 14,

              ), //BMW X3

              array(
                'name' => 'Window Regulator Right Rear Electric',
                'buying_price' => 1.60,
                'manufacturer_id' => 3,
                'sub_category_id' => 14,

              ),

              array(
                'name' => 'Floor Mat',
                'buying_price' => 2.25,
                'manufacturer_id' => 15,
                'sub_category_id' => 15,

              ),
          );

          $imagestart = (new Image)->getPartImageStartPointId();
          foreach ($parts as $part) {
            DB::table('parts')->insert([
              'name' => $part['name'],
              'buying_price' => $part['buying_price'],
              'selling_price' => $part['buying_price']*1.2,
              'max_possible_discount' => .20,
              'current_discount' => round(((rand(50,150)/10)/100), 2),
              'manufacturer_id' => $part['manufacturer_id'],
              'sub_category_id' => $part['sub_category_id'],
              'image_id' => $imagestart,
            ]);
            $imagestart++;
          }
    }
}
