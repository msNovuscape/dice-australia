<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddSection;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddSectionController extends Controller
{
    protected $view = 'admin.add_section.';
    protected $redirect = 'admin/add-sections';


    public function index(){
        $settings = AddSection::orderBy('id','asc');
        if(\request('status')){
            $key = \request('status');
            $settings = $settings->where('status',$key);
        }
        $settings = $settings->paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));
    }

    public function create(){

        return view($this->view.'create');

    }

    public function store(Request $request){
        $this->validate(\request(),[
           'link'=>'required|string',
            'image'=>'required|file|mimes:jpeg,png,jpg,pdf'
        ]);

            if($request->has('image')){
                $extension = \request()->file('image')->getClientOriginalExtension();
                $image_folder_type = array_search('add_section',config('custom.image_folders'));
                $count = rand(100,999);
                $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
                $image_path1 = $out_put_path[0];
            }
        $requestData = $request->all();
        if(isset($image_path1)){
            $requestData['image'] = $image_path1;
        }

        $setting = AddSection::create($requestData);
        Session::flash('success','Section is created');
        return redirect($this->redirect);


    }

    public function edit($id){

        $setting = AddSection::findorfail($id);
        return view($this->view.'edit',compact('setting'));
    }

    public function update(Request $request , $id){
        $setting =AddSection::findorfail($id);
        $this->validate(\request(), [
            'link'=>'required|string',
            'image' => 'file|mimes:jpeg,png,jpg,pdf',
        ]);


        if($request->hasFile('image')){
            $extension = \request()->file('image')->getClientOriginalExtension();

            //
            $image_folder_type = array_search('project',config('custom.image_folders')); //for image saved in folder search project index in config folder

            $count = rand(100,999);
            $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
            $image_path1 = $out_put_path[0];
            if (is_file(public_path().'/'.$setting->image) && file_exists(public_path().'/'.$setting->image)){
                unlink(public_path().'/'.$setting->image);
            }
        }

        $requestData = $request->all();
        if(isset($image_path1)){
            $requestData['image'] = $image_path1;
        }

        $setting->fill($requestData);
        $setting->save();
        Session::flash('success','Section is Updated');
        return redirect($this->redirect);

    }

    public function delete($id){

        $setting=AddSection::findorfail($id);
        if($setting->delete()){
            if (is_file(public_path().'/'.$setting->image) && file_exists(public_path().'/'.$setting->image)){
                unlink(public_path().'/'.$setting->image);
            }
        }
        Session::flash('success','Section is deleted !');
        return redirect($this->redirect);

    }
    //
}
