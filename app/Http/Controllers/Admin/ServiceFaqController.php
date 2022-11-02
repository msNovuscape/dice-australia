<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceOld;
use App\Models\ServiceFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceFaqController extends Controller
{
    protected $view= 'admin.service_faq.';
    protected $redirect = 'admin/service_faqs';


    public function index(){
        $settings = ServiceFaq::paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));
    }

    public function create(){
        $settings = Service::get();
        return view($this->view.'create',compact('settings'));
    }

    public function store(Request $request){
        $this->validate(\request(), [
            'question' =>'required|string',
            'answer'=>'required',
            'status' => 'required',

        ]);

        $requestData = $request->all();
        $setting = ServiceFaq::create($requestData);
        Session::flash('success','ServiceFAQ is created');
        return redirect($this->redirect);

    }

    public function edit($id){
        $setting = ServiceFaq::findorfail($id);
        $services = Service::all();
        return view($this->view.'edit',compact('setting'),compact('services'));
    }

    public function update(Request $request, $id){

        $setting =ServiceFaq::findorfail($id);
        $this->validate(\request(), [
            'question' =>'required|string',
            'answer'=>'required',
            'status' => 'required',

        ]);

        $requestData = $request->all();
        $setting->fill($requestData);
        $setting->save();
        Session::flash('success','CourseFAQ is Updated');
        return redirect($this->redirect);

    }
}
