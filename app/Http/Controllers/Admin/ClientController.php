<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Client as Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    protected $view = 'admin.client.';
    protected $redirect = 'admin/clients';

    public function index()
    {
        $settings = Setting::paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));
    }

    public function create()
    {
        return view($this->view.'create');
    }

    public function store(Request $request)
    {
        $this->validate(\request(),[
            'logo' =>'required|file|mimes:jpeg,png,jpg,pdf',
            'link' =>'required',
            'status' =>'required',
        ]);

        if(\request('logo')){
            if($request->hasFile('logo')){
                $extension = \request()->file('logo')->getClientOriginalExtension();
                $image_folder_type = array_search('client',config('custom.image_folders')); //for image saved in folder
                $count = rand(100,999);
                $out_put_path = User::save_image(\request('logo'),$extension,$count,$image_folder_type);
                $image_path1 = $out_put_path[0];
            }
        }
        $requestData = $request->all();
        if(isset($image_path1)){
            $requestData['logo'] = $image_path1;
        }

        Setting::create($requestData);
        Session::flash('success','Testimonial is created!');
        return redirect($this->redirect);
    }
    public function edit($id){
       $setting= Client::findorfail($id);
       return view($this->view.'edit',compact('setting'));
    }

    public function update(Request $request ,$id){
        $setting = Client::findorfail($id);
        $this->validate(\request(),[
            'logo' =>'file|mimes:jpeg,png,jpg,pdf',
            'link' =>'required',
            'status' =>'required',
        ]);

        if(\request('logo')){
            if($request->hasFile('logo')){
                $extension = \request()->file('logo')->getClientOriginalExtension();
                $image_folder_type = array_search('client',config('custom.image_folders')); //for image saved in folder
                $count = rand(100,999);
                $out_put_path = User::save_image(\request('logo'),$extension,$count,$image_folder_type);
                $image_path1 = $out_put_path[0];
            }
        }
        $requestData = $request->all();
        if(isset($image_path1)){
            $requestData['logo'] = $image_path1;
        }

        $setting->fill($requestData);
        $setting->save();
        Session::flash('success','Testimonial is Updated!');
        return redirect($this->redirect);

    }


}
