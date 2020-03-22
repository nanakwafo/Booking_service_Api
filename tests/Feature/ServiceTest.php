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
use App\Http\Resources\Service as ServiceResource;

class ServiceTest extends TestCase
{
    use RefreshDatabase;


    /** test */
    public function test_can_add_a_service ()
    {

        $this->withoutExceptionHandling ();

        $response = $this->post ('/api/service', [
            'name'  => 'newservice',
            'price' => '10'
        ]);
        $response->assertStatus (201);

        $this->assertCount (1, Service::all ());
    }

    /** test */
    public function test_can_update_a_service ()
    {
        $this->withoutExceptionHandling ();
        $this->post ('/api/service', [
            'name'  => 'newservice',
            'price' => '10'
        ]);
        $service =Service::first();
        $response =$this->patch('/api/service/'.$service->id,[
            'name'  => 'secondservice',
            'price' => '30'
        ]);

        $response->assertStatus(200);
        $this->assertEquals('secondservice',Service::first()->name);
        $this->assertEquals('30',Service::first()->price);

    }

    /** test */
    public function test_can_delete_a_service ()
    {
        $this->withoutExceptionHandling ();
        $this->post ('/api/service/', [
            'name'  => 'newservice',
            'price' => '10'
        ]);
        $service = Service::first();

        $response =$this->delete('/api/service/'.$service->id);

        $response->assertStatus(200);

        $this->assertCount(0,Service::all());

    }

    /** test */
    public function  test_can_show_service(){
        $this->withoutExceptionHandling ();
        $this->post ('/api/service/', [
            'name'  => 'newservice',
            'price' => '10'
        ]);

        $service =Service::first();

        $this->assertEquals($service,Service::findorfail(1));
    

    /** test */
    public function test_can_show_all_service(){
        $this->withoutExceptionHandling ();
        $this->post ('/api/service/', [
            'name'  => 'newservice',
            'price' => '10'
        ]);
        $allservive =$this->get('/api/services/');

        $allservive->assertStatus(200);


      //  $this->assertInstanceof(Service::all ()->json(),$allservive);
    }

}