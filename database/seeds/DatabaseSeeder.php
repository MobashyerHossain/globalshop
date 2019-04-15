<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call([
            'DefaultSeeder',
            'ImageSeeder',
            'ConsumerSeeder',
            'PartManufacturerSeeder',
            'PartCategorySeeder',
            'PartSubCategorySeeder',
            'PartSeeder',
            'CarMakerSeeder',
            'CarModelSeeder',
            'CarSeeder',
            'ShowRoomSeeder',
            'ProductInventorySeeder',
            'RoleSeeder',
            'AdminSeeder',
            'ShowRoomStaffSeeder',
            'ProductDetailSeeder',
            'ExtraCarImage',
        ]);
    }
}
