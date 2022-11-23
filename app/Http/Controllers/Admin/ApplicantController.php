<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApplicantController extends Controller
{
    protected $view='admin.applicant.';
    protected $redirect='admin/applicants';

    public function index(){
        $settings=Applicant::paginate(config('custom.per_page'));
       return view($this->view.'index',compact('settings'));
    }





    

    
    public function show($id){
        
        $applicants=Applicant::findorfail($id);
        return view($this->view.'show',compact('applicants'));

    }
}
