<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\ContactDescription;
use App\Models\PersonalDetail;
use Illuminate\Support\Facades\Session;
use Mail;

class EnrollmentController extends Controller
{
    protected $view = 'admin.enrollment.';
    protected $redirect = 'admin/enrollments';

    public function index()
    {
        $personal_details = PersonalDetail::paginate(config('custom.per_page'));
        return view($this->view.'index',compact('personal_details'));
    }

    public function show($id)
    {
       
        $personal_detail = new PersonalDetail();


        $personal_detail = $personal_detail->findorfail($id);


        return view($this->view . 'show', compact('personal_detail'));
    }
   
       
}
