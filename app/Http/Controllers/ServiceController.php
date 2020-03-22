<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Service;
use App\Http\Resources\Service as ServiceResource;
use Log;
class ServiceController extends Controller
{

    public function getAllService ()
    {
        return ServiceResource::collection (Service::all ());
    }

    public function paginateAllService ()
    {

        return ServiceResource::collection (Service::simplepaginate (2));
    }

    public function store (StoreServiceRequest $request)
    {
        
        try {
            $service = Service::create ($request->toArray ());
        } catch (\Exception $exception) {
            return response ()->json (['exception' => $exception->getMessage ()]);
        }
        if ( $service )
            return new ServiceResource($service);

    }

    public function update ($id, UpdateServiceRequest $request)
    {
        try {
            $service = Service::findorfail ($id)->update ($request->toArray ());

        } catch (\Exception $exception) {
            return response ()->json (['exception' => $exception->getMessage ()]);
        }


        if ( $service ) {
            return new ServiceResource(Service::find ($service));
        }


    }

    public function show ($id)
    {

        return new ServiceResource(Service::findOrFail ($id));
    }

    public function destroy ($id)
    {
        return new ServiceResource(Service::findOrFail ($id)->delete ());
    }
}
