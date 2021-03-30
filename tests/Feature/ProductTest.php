<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{

    public function test_add_new_product()
    {
        $arrayData = [
            "product_name" => "1234567890-UK6",
            "product_qty" => 6,
            "product_price" => "1.00"
        ];

        $response = $this->json('POST',env('APP_URL').'api/product',$arrayData,['Content-Type' => 'application/json']);

        for($i=0;$i < $arrayData['product_qty'];$i++)
        {
            $this->add_items();
        }

        $response->assertStatus(200);
    }

    public function test_get_all_products()
    {
        $response = $this->json('GET',env('APP_URL').'api/product');

        $response->assertStatus(200);
    }

    public function test_get_all_item()
    {
        $response = $this->json('GET',env('APP_URL').'api/item');

        $response->assertStatus(200);
    }

    public function add_items()
    {
        $this->json('POST',env('APP_URL').'api/item',['product_id' => 1],['Content-Type' => 'application/json']);
    }


    public function test_create_order_less_than_stock()
    {
        for($i=0;$i<5;$i++)
        {
            $this->create_order();
        }

    }


    public function create_order()
    {
        $response = $this->json('POST',env('URL').'api/order',[
            'user' => 'user '.random_int(0,9),
            'product_id' => 1,
            'qty' => 1
        ],[
            'Content-Type' => 'application/json'
        ]);

        $response->assertStatus(200);
    }


}
