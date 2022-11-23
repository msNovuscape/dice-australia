<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Referral;
use App\Models\ReferralService;
use Illuminate\Http\Request;
use Mail;
use PDF;

class ReferralController extends Controller
{
   public function create(){
       $services = Service::where('status',1)->get();
       return view('referral',compact('services'));
   }

   public function store(Request $request){
    $this->validate(\request(),[
        'privacy' => 'required',
     
    ]);
    if($request->is_ndis == '1'){
        $this->validate(\request(),[
                'ndis_number' => 'required',
                'ndis_expiry_date' => 'required',
                'ndis_plan' => 'required'
        ]);
    }

    $referral = new Referral();
    $referral->name = $request['name'];
    $referral->gender = $request['gender'];
    $referral->email = $request['email'];
    $referral->dob = $request['dob'];
    $referral->mobile_no = $request['mobile_no'];
    $referral->preferred_language = $request['preferred_language'];
    $referral->is_ndis = $request['is_ndis'];
    
    $referral->ndis_number = $request['ndis_number'];
    $referral->ndis_expiry_date = $request['ndis_expiry_date'];
    $referral->ndis_plan = $request['ndis_plan'];
    $referral->unit_number = $request['unit_number'];
    $referral->street_number = $request['street_number'];
    $referral->street_name = $request['street_name'];
    $referral->state_name = $request['state_name'];
    $referral->postalcode = $request['postalcode'];
    $referral->suburb = $request['suburb'];
    $referral->referrer_full_name = $request['referrer_full_name'];
    $referral->referrer_contact_no = $request['referrer_contact_no'];
    $referral->suburb = $request['suburb'];
    $referral->services_details = $request['services_details'];
    if($referral->save()){
        $services = $request['services'];
        if(!is_null($services)){
        foreach($services as $service){
            $referral_service = new ReferralService();
            $referral_service->referral_id = $referral->id;
            $referral_service->service_id = $service;
            $referral_service->save();
        }
        }

    }
    dispatch(function() use ($referral,$services) {

    $pdf = PDF::loadView('referral_mail',array(

        'referral_id' => $referral->id,

        'name' =>$referral['name'],

        'email' =>$referral['email'],

        'dob' =>$referral['dob'],

        'age' =>$referral['mobile_no'],

        'state' =>$referral['state_name'],

        'post_code' =>$referral['postalcode'],

        'gender' =>$referral['gender'],

        'suburb' =>$referral['suburb'],

        'mobile_no' =>$referral['mobile_no'],

        'preferred_language' =>\request('preferred_language'),

        'street_name' =>$referral['street_name'],

        'unit_number' =>$referral['unit_number'],

        'street_number' =>$referral['street_number'],

        'services_details' =>$referral['services_details'],

        'is_ndis' => $referral['is_ndis'],

        'ndis_number' => $referral['ndis_number'],

        'ndis_expiry_date' => $referral['ndis_expiry_date'],

        'ndis_plan' => $referral['ndis_plan'],

        'services' =>$services,

        'referrer_contact_no' =>$referral['referrer_contact_no'],

        'referrer_full_name' =>$referral['referrer_full_name'],

        'subject' => 'Referral Notice',
    ));
       \Mail::send('referral_mail', array(

       
        'name' =>$referral['name'],

        'email' =>$referral['email'],

        'dob' =>$referral['dob'],

        'age' =>$referral['mobile_no'],

        'state' =>$referral['state_name'],

        'post_code' =>$referral['postalcode'],

        'gender' =>$referral['gender'],

        'mobile_no' =>$referral['mobile_no'],

        'suburb' =>$referral['suburb'],

        'preferred_language' =>\request('preferred_language'),

        'street_name' =>$referral['street_name'],

        'unit_number' =>$referral['unit_number'],

        'street_number' =>$referral['street_number'],

        'services_details' =>$referral['services_details'],

        'is_ndis' => $referral['is_ndis'],

        'ndis_number' => $referral['ndis_number'],

        'ndis_expiry_date' => $referral['ndis_expiry_date'],

        'ndis_plan' => $referral['ndis_plan'],

        'services' =>$services,

        'referrer_contact_no' =>$referral['referrer_contact_no'],

        'referrer_full_name' =>$referral['referrer_full_name'],

        'subject' => 'Referral Notice',

       ), function($message) use ($pdf){

        $message->subject('Referral Notice');
        $message->attachData($pdf->output(), 'referral.pdf');
        $message->to('mahesh@extratechs.com.au', 'Extratech')->subject('Referral Notice');

       });
    });

    return redirect()->back()->with(['msg' => 'Successfully submitted.']);

}



}
