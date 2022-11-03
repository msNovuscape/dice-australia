<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NdisPricing;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class NdisPricingController extends Controller
{
    protected $view = 'admin.ndis_pricing.';
    protected $redirect = 'admin/ndis_pricing';
    public function index()
    {
        $settings = NdisPricing::orderBy('id','DESC');
        // if(\request('title')){
        //     $key = \request('title1');
        //     $settings = $settings->where('title1','like','%'.$key.'%');
        // }
        // if(\request('status')){
        //     $key = \request('status');
        //     $settings = $settings->where('status',$key);
        // }
        $settings = $settings->paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));
    }

    public function create()
    {
        return view($this->view.'create');
    }

    public function store(Request $request)
    {       
        
   
            $this->validate(\request(), [
             
                'title' => 'required',
                'sub_title' => 'required',
                'description' => 'required',
                'status' => 'required',
                'button' => 'required',
                'link' => 'required',
                'image' => 'required|file|mimes:jpeg,png,jpg,pdf'
            ]);
            if($request->hasFile('image')){
                $extension = \request()->file('image')->getClientOriginalExtension();
                $image_folder_type = array_search('ndis_pricing',config('custom.image_folders')); //for image saved in folder
                $count = rand(100,999);
                $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
                $image_path1 = $out_put_path[0];
            }

        $requestData = $request->all();
        if(isset($image_path1)){
            $requestData['image'] = $image_path1;
        }

        // $requestData['slug'] = Setting::create_slug($requestData['keyword']);
        $setting = NdisPricing::create($requestData);
        
        Session::flash('success','Ndis Pricing successfully created');
        return redirect($this->redirect);
    }

    public function edit($id)
    {
        $setting = NdisPricing::findorfail($id);
      return view($this->view.'edit',compact('setting'));
    }

    public function update(Request $request, $id){

                $setting =NdisPricing::findorfail($id);
                $this->validate(\request(), [
                    'title' => 'required',
                    'sub_title' => 'required',
                    'description' => 'required',
                    'status' => 'required',
                    'button' => 'required',
                    'link' => 'required',
                    'image' => 'file|mimes:jpeg,png,jpg,pdf'
                ]);
        
                if(\request('image')){
                    $this->validate(\request(),[
                        'image' => 'file|mimes:jpeg,png,jpg,pdf'
                    ]);
                    if($request->hasFile('image')){
                        $extension = \request()->file('image')->getClientOriginalExtension();
                        $image_folder_type = array_search('ndis_pricing',config('custom.image_folders')); //for image saved in folder
                        $count = rand(100,999);
                        $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
                        $image_path1 = $out_put_path[0];
                        if (is_file(public_path().'/'.$setting->image) && file_exists(public_path().'/'.$setting->image)){
                            unlink(public_path().'/'.$setting->image);
                        }
                    }
                }
        
        
                $requestData = $request->all();
                // $requestData['slug'] = Setting::create_slug($requestData['keyword']);
                if(isset($image_path1)){
                    $requestData['image'] = $image_path1;
                }
                $setting->fill($requestData);
                $setting->save();
                
                Session::flash('success','Ndis Pricing succesffuly updated.');
                return redirect($this->redirect);
        
            }
        
            public function delete($id){
                $setting=NdisPricing::findorfail($id);
                
                if($setting->delete()){
                    if (is_file(public_path().'/'.$setting->image) && file_exists(public_path().'/'.$setting->image)){
                        unlink(public_path().'/'.$setting->image);
                    }
                }
                Session::flash('success','Ndis Pricing is deleted !');
                return redirect($this->redirect);
            }
}
