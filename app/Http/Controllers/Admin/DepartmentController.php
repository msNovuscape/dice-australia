<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\department;
use App\Models\SubOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    protected $view='admin.department.';
    protected $redirect='admin/departments';

    public function index(){
        $settings = department::Paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));
    }

    public function create(){
        $settings=SubOffice::all();
        return view($this->view.'create',compact('settings'));
    }

    public function store(Request $request){
        $this->validate(\request(),[
            'name'=>'required|string',
            'sub_office_id'=>'required',
        ]);
        $requestData=$request->all();
        $setting=department::create($requestData);
        Session::flash('success','Department is created');
        return redirect($this->redirect);
    }

    public function edit($id){
        $settings=department::findorfail($id);
        $sub_offices=SubOffice::all();
        return view($this->view.'edit',compact('settings'),compact('sub_offices'));
    }

    public function update(Request $request ,$id){
        $setting =department::findorfail($id);

        $this->validate(\request(),[
            'name'=>'required|string',
            'sub_office_id'=>'required',
        ]);
        $requestData=$request->all();
        $setting->fill($requestData);
        $setting->save();
        Session::flash('success','Department is Updated');
        return redirect($this->redirect);


    }

    public function delete(){

    }
}
