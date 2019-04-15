<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultimages = array(
            'storage/images/default/default_profile_pic.png',
            'storage/images/default/default_car.jpg',
            'storage/images/default/default_part.jpg',
            'storage/images/default/default_image.jpg',
        );

        foreach ($defaultimages as $image) {
          DB::table('images')->insert([
              'image_type' => 'default',
              'uri' => $image,
          ]);
        }
    }
}
