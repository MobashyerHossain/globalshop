<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Other\Image;

class CarMakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carmakers = array(
            array(
              'name' => 'BMW',
              'details' => 'BMW (Bayerische Motoren Werke/Bavarian Motor Works) is a German multinational company which currently produces luxury automobiles',
            ),
            array(
              'name' => 'Lamborghini',
              'details' => 'Automobili Lamborghini S.p.A. is an Italian brand and manufacturer of luxury sports cars and SUVs. The company is owned by the Volkswagen Group through its subsidiary Audi',
            ),
            array(
              'name' => 'Audi',
              'details' => 'Audi AG is a German automobile manufacturer that designs, engineers, produces, markets and distributes luxury vehicles. Audi is a member of the Volkswagen Group',
            ),
            array(
              'name' => 'Mercedes-Benz',
              'details' => 'Mercedes-Benz (German: [mɛʁˈtseːdəsˌbɛnts]) is a global automobile marque and a division of the German company Daimler AG. The brand is known for luxury vehicles, buses, coaches, and lorries. The headquarters is in Stuttgart, Baden-Württemberg',
            ),
        );

        $logostart = (new Image)->getCarMakerLogoStartPointId();
        foreach ($carmakers as $carmaker) {
            DB::table('car_makers')->insert([
                'name' => $carmaker['name'],
                'details' => $carmaker['details'],
                'logo' => $logostart,
            ]);
            $logostart++;
        }
    }
}
