<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            //Admin Roles
            array(
                array(
                  'work_as' => 'admin',
                  'title' => 'super admin',
                  'details' => 'can do pretty much everyone',
                  'salary' => 1000000,
                ),

                array(
                  'work_as' => 'admin',
                  'title' => 'loan handler admin',
                  'details' => 'handles and processes all kinds of loan related work',
                  'salary' => 800000,
                ),

                array(
                  'work_as' => 'admin',
                  'title' => 'showroom handler admin',
                  'details' => 'adds and removes new showrooms and adds its manager',
                  'salary' => 600000,
                ),
            ),

            //ShowroomSatff Roles
            array(
                array(
                  'work_as' => 'showroom staff',
                  'title' => 'showroom manager',
                  'details' => 'handles everything in the showroom',
                  'salary' => 1000000,
                ),

                array(
                  'work_as' => 'showroom staff',
                  'title' => 'sales manager',
                  'details' => 'adds and removes new products',
                  'salary' => 800000,
                ),

                array(
                  'work_as' => 'showroom staff',
                  'title' => 'showroom accountant',
                  'details' => 'can view the overall sale off the showroom',
                  'salary' => 700000,
                ),
            ),
        );

        foreach ($roles as $rolex) {
          foreach ($rolex as $role) {
              DB::table('roles')->insert([
                'work_as' => $role['work_as'],
                'title' => $role['title'],
                'details' => $role['details'],
                'salary' => $role['salary'],
              ]);
          }            
        }
    }
}
