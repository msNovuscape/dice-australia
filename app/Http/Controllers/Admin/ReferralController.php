<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReferralController extends Controller
{
    protected $view='admin.referral.';
    protected $redirect='admin/referrals';
    public function index(){
        $settings=Referral::paginate(config('custom.per_page'));
       return view($this->view.'index',compact('settings'));
    }





    

    
    public function show($id){
        
        $referral=Referral::findorfail($id);
        return view($this->view.'show',compact('referral'));

    }
}
