<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
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

        $service = Service::simplepaginate (2);

        return ServiceResource::collection ($service);
    }

    public function store (StoreServiceRequest $request)
    {
        try {
            $service = Service::create ($request->toArray());
        } catch (\Exception $exception) {
            return response ()->json (['exception' => $exception->getMessage()]);
        }
        if ( $service )
            return new ServiceResource($service);

    }

    public function update ($id,Request $request)
    {
        try{
            $service = Service::findorfail($id)->update($request->toArray());

        }catch(\Exception $exception){
             return response()->json(['exception' => $exception->getMessage()]);
        }


        if($service){
            return  new ServiceResource(Service::find($service));
        }



    }

    public function show ($id)
    {

        return new ServiceResource(Service::findOrFail ($id));
    }

    public function destroy ($id)
    {
        return new ServiceResource(Service::findOrFail ($id));
    }
}
