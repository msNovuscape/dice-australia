<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Accomodation;
use Illuminate\Http\Request;
use App\Models\NdisPricing;

class ServiceController extends Controller
{
    public function single_service($slug){
        $service = Service::where(['slug' => $slug,'status' => 1])->orderby('order_by','asc')->first();
        $services = Service::where('status',1)->get();
        $ndis_pricing = NdisPricing::where('status',1)->first();
        // $accomodations = Accomodation::where('status',1)->get();
        return view('services.single',compact('service','services','ndis_pricing'));
    }
}
