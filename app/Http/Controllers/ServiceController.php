<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Resources\Service as ServiceResource;

class ServiceController extends Controller
{
    private $service;

    public function __construct ()
    {
        $this->service = new Service();
    }

    
    public function index ()
    {
       
        $service = Service::simplepaginate(2);

        return ServiceResource::collection ($service);
    }

    public function store (Request $request)
    {
      
        $service=$request->isMethod('put')? Service::findOrFail($request->service_id):$this->service;
        
        $service->lastname=$request->lastname;
        if( $service->save()){
            return new ServiceResource($service);
        }
    }

    public function show ($id)
    {
    
        return new ServiceResource(Service::findOrFail($id));
    }

    public function destroy ($id)
    {
        return new ServiceResource(Service::findOrFail($id));
    }
}
