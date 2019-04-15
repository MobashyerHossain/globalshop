<?php

namespace Tests\Browser;

use App\Models\MultiAuth\Consumer;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                    ->click('#loginbutton > button')
                    ->type('logemail', 'jokerjamil007@gmail.com')
                    ->type('logpassword', '741852')
                    ->press('Login')
                    ->assertPathIs('/');
        });
    }
}
