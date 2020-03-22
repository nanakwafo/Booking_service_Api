<?php

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 22/03/2020
 * Time: 02:20
 */
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Service;

class ServiceTest extends TestCase
{
    use RefreshDatabase;


    /** test */
    public function test_can_add_a_service(){

        $this->withoutExceptionHandling();

        $response = $this->post('/api/service',[
            'name'=>'newservice',
            'price'=>'10'
        ]);
        $this->assertCount(1,Service::all());
    }

    /** test */
    public function  test_can_update_a_user(){

    }

}