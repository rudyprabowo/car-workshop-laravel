<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{

    protected $user;

    public function __construct()
    {
        // $this->middleware('auth:api');
        // $this->user = $this->guard()->user();
        
        $this->user = Auth::user();
        $this->user = auth()->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //GET
    public function index()
    {
        // return Service::all();
        return $this->user;


        // if ($this->user->account == "customer" || $this->user->account == "mechanic") {
        //     // $services = $this->user->services()->get(['id', 'car_name', 'car_plate_number', 'car_in_workshop', 'service_status', 'customer_id', 'mechanic_id']);
        //     $services = $this->user->services()->get();
        //     return response()->json($services->toArray());
        // } else {
        //     $services = Service::all();
        //     return response()->json($services->toArray());
        // }

        // $services = $this->user->services->get();
        // $services = $this->user->services()->get();
        // $services = $this->user->services();
        // return $this->user->account; //untuk keluarkan value account dari login user
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //PUSH
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'car_name' => 'required|string',
            'car_plate_number' => 'required|string',
            // 'car_in_workshop' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        $service = new Service();
        $service->car_name = $request->car_name;
        $service->car_plate_number = $request->car_plate_number;
        $service->car_in_workshop = $request->car_in_workshop;
        $service->service_status = $request->service_status;
        $service->customer_id = $request->customer_id;
        $service->mechanic_id = $request->mechanic_id;

        if ($this->user->serviceUsers()->save($service)) {
            return response()->json([
                'status' => true,
                'service' => $service
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Oops, New service could not be save.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    //GET by Id
    public function show(Service $service)
    {
        return $service;
        // return '$service';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    //PUT
    public function update(Request $request, Service $service)
    {
        $validator = Validator::make($request->all(), [
            'car_name' => 'required|string',
            'car_plate_number' => 'required|string',
            // 'car_in_workshop' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        $service->car_name = $request->car_name;
        $service->car_plate_number = $request->car_plate_number;
        $service->car_in_workshop = $request->car_in_workshop;
        $service->service_status = $request->service_status;
        $service->customer_id = $request->customer_id;
        $service->mechanic_id = $request->mechanic_id;

        if ($this->user->serviceUsers()->save($service)) {
            return response()->json([
                'status' => true,
                'service' => $service
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Oops, New service could not be updated.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    //DELETE
    public function destroy(Service $service)
    {
        if ($service->delete()) {
            return response()->json([
                'status' => true,
                'message' => 'Service has been deleted.',
                'service' => $service
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Oops, service could not be deleted.'
            ]);
        }
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
