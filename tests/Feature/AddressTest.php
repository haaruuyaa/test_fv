<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddressTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_check_address_info_DHL()
    {
        $response = $this->json('POST', env('APP_URL') . 'api/address',
            ['address_1' => 'Business Office, Malcolm Long 92911 Proin Road Lake Charles Maine', 'address_2' => '', 'address_3' => ''],
            ['Content-Type' => 'application/json']);

        $response->assertSee('Business Office, Malcolm Long ');
        $response->assertSee('92911 Proin Road Lake Charles ');
        $response->assertSee('Maine ');
    }
}
