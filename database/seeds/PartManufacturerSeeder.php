<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Other\Image;

class PartManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partmanufacturers = array(
            array(
              'name' => 'JP Group',
              'details' => 'JP GROUP is one of the well reputed automobile parts manufacturing company.JP GROUP was founded in 1975 by Johannes Pedersen – thus the "JP".'
            ),

            array(
              'name' => 'TRW',
              'details' => 'TRW Automotive is an American global supplier of automotive systems, modules, and components to automotive original equipment manufacturers. TRW formally stood for "Thompson Ramo Wooldridge"; it was formed when Thompson Products merged with Ramo-Wooldridge in 1958',
            ),

            array(
              'name' => 'RIDEX',
              'details' => 'RIDEX is german based auto parts manufacturing company. The products manufactured by RIDEX are made exclusively from premium materials. Their tag line is "RIDEX: Low cost and durable car parts, available to everyone."',
            ),

            array(
              'name' => 'ABS',
              'details' => 'ABS Automotive is an American based auto parts manufacturing company. "ABS" stands for Americans Best Service. Their mission is simple "The Best Work, At A Fair Price".',
            ),

            array(
              'name' => 'TOMEX',
              'details' => 'TOMEX Hamulce is a leading European supplier of brake blocks and shoes. More than 4.5 million car and truck brake blocks are manufactured by Tomex annually',
            ),

            array(
              'name' => 'MAPCO',
              'details' => 'MAPCO products have been sold with enormous success in Germany since 1977. Over the last 30 years millions of MAPCO products have been fitted to a multitude of different vehicle applications',
            ),

            array(
              'name' => 'MANN FILTER',
              'details' => 'MANN FILTER is a part of the "Mann+Hummel Group" which is a German manufacturing company and leading global filtration specialist. This division produce only filters of automobiles'
            ),

            array(
              'name' => 'FILTERS purflux',
              'details' => 'The automotive component company of CIR Group, has designed the oil filter module for the new Maserati Levante, unveiled at the recent New York International Auto Show',
            ),

            array(
              'name' => 'TRUCKTEC',
              'details' => 'TRUCKTEC is a German Automotive company is the best-known German brands since 1989',
            ),

            array(
              'name' => 'BOSCH',
              'details' => 'Bosch is an American based Auto parts manufacturing Company.',
            ),

            array(
              'name' => 'TOTAL',
              'details' => 'Total S.A. is a French multinational integrated oil and gas company and one of the seven "Supermajor" oil companies in the world. Its businesses cover the entire oil and gas chain, from crude oil and natural gas exploration etc.',
              'logo' => '51',
            ),

            array(
              'name' => 'DYNAMAX',
              'details' => ' The DYNAMAX brand’s uniqueness is underscored by having been honored at the prestigious Reddot Desing Award, an event held every year at Desing Zentrum Nordrhein Westfalen in Germany since 1954',
            ),

            array(
              'name' => 'Castrol',
              'details' => 'Castrol is a British global brand of industrial and automotive lubricants offering a wide range of oils, greases and similar products for most lubrication applications. Founded by Charles Wakefield in 9 march 1899.',
            ),
            array(
              'name' => 'Novline',
              'details' => 'NOVLINE group deals with the development, production, and realization of products for the car accessories industry',
            ),

            array(
              'name' => 'KSTOOLS',
              'details' => 'The founding shareholders, Peter Kühne and Stephan Schott left their then successful positions in sales, became self-employed and lay down the foundations for today’s business. As a matter of priority, they concentrated on the best-known product markets for sanitary tools',
            ),

            array(
              'name' => 'Febi',
              'details' => 'Febi Bilstein is European Automotive company. After the company was founded in 1844, the first few decades in the history of febi bilstein were marked by trade in procured and custom-made metal products',
            ),

            array(
              'name' => 'Borsehung',
              'details' => 'Borsehung GmbH is a professional supplier of spare parts for European style vehicles with a focus on Volkswagen Group.',
            ),

            array(
              'name' => 'UFI',
              'details' => 'UFI is an Italian company. Founded in 1971, UFI is a global leader in filtration technology.',
            ),

            array(
              'name' => 'VAICO',
              'details' => 'VAICO is a brand of VIEROL AG, headquarters in Oldenburg, Germany. VIEROL AG is a successful international specialist for electronic components and engine management in the automotive sector.',
            ),

            array(
              'name' => 'AEZ',
              'details' => 'AEZ makes quality assurance a high priority. All AEZ wheels undergo numerous tests and are rigorously examined and certified by German TUVs. AEZ’s logistics all over germany have around 900.000 alloy wheels in stock, ensuring prompt delivery and availability.',
            ),

            array(
              'name' => 'AXXION',
              'details' => 'With AXXION, we bring rim design to the next level – with passion for detail, masterful technical refinement and breathtaking constructions. With AXXION, we want to differenciate ourselves from the competitors and offer you a rim that provides you and your car the greatest possible individuality.',
            ),

            array(
              'name' => 'BBS',
              'details' => 'Premium German alloy wheel manufacturer BBS has won a legal battle against Vannetukku, one of Finland’s largest tyre and wheel web shop, who sell alloy wheels under the 885 brand.',
            ),

            array(
              'name' => 'Steger',
              'details' => 'Premium German steel wheel manufacturer BBS has won a legal battle against Vannetukku, one of Finland’s largest tyre and wheel web shop.',
            ),

            array(
              'name' => 'Magnetto',
              'details' => 'MW is the steel wheel market leader for all vehicle types. Each model is designed, tested and manufactured with the guarantee of top safety standards.',
            ),

            array(
              'name' => 'Wolfrace',
              'details' => 'Wolfrace Alloy and Aluminium Wheels Supplier - the UKs best known alloy wheel brand established 1971. Alloy wheels supplier for cars, vans and 4x4 vehicles',
            ),

            array(
              'name' => 'ATS',
              'details' => 'Motorsport technology from ATS Now motorsport fans can experience the design and technology of ATS DTM wheels on their own vehicle: as GRID cast wheel.',
            ),

            array(
              'name' => 'Lenso',
              'details' => 'Lenso wheels pursue new levels of unrestrained style and swagger every year. They produce a range of wheels designed to meet the growing demands of wheels.',
            ),

        );

        $logostart = (new Image)->getPartManufacturerLogoStartPointId();
        if($logostart == 4){
            foreach ($partmanufacturers as $partmanufacturer) {
              DB::table('part_manufacturers')->insert([
                  'name' => $partmanufacturer['name'],
                  'details' => $partmanufacturer['details'],
              ]);
            }
        }
        else{
            foreach ($partmanufacturers as $partmanufacturer) {
              DB::table('part_manufacturers')->insert([
                  'name' => $partmanufacturer['name'],
                  'details' => $partmanufacturer['details'],
                  'logo' => $logostart,
              ]);
              $logostart++;
            }
        }
    }
}
