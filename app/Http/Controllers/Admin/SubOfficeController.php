<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubOffice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubOfficeController extends Controller
{
    protected $view='admin.sub_office.';
    protected $redirect='admin/sub_offices';
    public function index(){
        $settings = SubOffice::paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));
    }

    public function create(){

        return view($this->view.'create');
    }

    public function store(Request $request){

            $this->validate(\request(),[
                'name'=>'required|string',
                'image' => 'required|file|mimes:jpeg,png,jpg,pdf',
                'email'=>'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'contact_no'=>'required'
            ]);

                if($request->hasFile('image')){
                    $extension = \request()->file('image')->getClientOriginalExtension();
                    $image_folder_type = array_search('sub_office',config('custom.image_folders')); //for image saved in folder
                    $count = rand(100,999);
                    $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
                    $image_path1 = $out_put_path[0];
                }
       $requestData=$request->all();
        if(isset($image_path1)){
            $requestData['image'] = $image_path1;
        }
       $setting= SubOffice::create($requestData);
       Session::flash('success','Blog is created');
       return redirect($this->redirect);

    }

    public function edit($id){
        $setting=SubOffice::findorfail($id);
        return view($this->view.'edit',compact('setting'));
    }

    public function update(Request $request , $id){
            $setting= SubOffice::findorfail($id);

                $this->validate(\request(),[
                    'name'=>'required|string',
                     'image' => 'file|mimes:jpeg,png,jpg,pdf',
                    'email'=>'required',
                    'contact_no'=>'required',
                    'latitude' => 'required',
                    'longitude' => 'required'
                ]);

                if($request->hasFile('image')){
                    $extension = \request()->file('image')->getClientOriginalExtension();
                    $image_folder_type = array_search('sub_office',config('custom.image_folders')); //for image saved in folder
                    $count = rand(100,999);
                    $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
                    $image_path1 = $out_put_path[0];
                }

        $requestData= $request->all();
        if(isset($image_path1)){
            $requestData['image'] = $image_path1;
        }
        $setting->fill($requestData);
        $setting->save();
        Session::flash('success','Suboffice is Updated');
        return redirect($this->redirect);


    }

    public function delete($id){

        $setting=SubOffice::findorfail($id);
        $setting->delete();
        Session::flash('success','Suboffice is deleted !');
        return redirect($this->redirect);

    }
}
