<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\Testimonial as Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class TestimonialController extends Controller
{

    protected $view = 'admin.testimonial.';
    protected $redirect = 'admin/testimonials';

    public function index()
    {
        $settings = Testimonial::paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));
    }

    public function create()
    {
        return view($this->view.'create');
    }

    public function store(Request $request)
    {
        $this->validate(\request(),[
            
            'heading' =>'required',
            // 'title' =>'required',
            'image' =>'required|file|mimes:jpeg,png,jpg,pdf',
            'review' =>'required',
            'author_name' =>'required',
            'author_designation' =>'required',
            'status' =>'required',
           
        ]);

        if(\request('image')){
            if($request->hasFile('image')){
                $extension = \request()->file('image')->getClientOriginalExtension();
                $image_folder_type = array_search('testimonial',config('custom.image_folders')); //for image saved in folder
                $count = rand(100,999);
                $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
                $image_path1 = $out_put_path[0];
            }
        }
        $requestData = $request->all();
        if(isset($image_path1)){
            $requestData['image'] = $image_path1;
        }
        $requestData['review'] = strip_tags($request['review']);
        Setting::create($requestData);
        Session::flash('success','Testimonial is created!');
        return redirect($this->redirect);
    }

    public function edit($id){
        $setting = Testimonial::findorfail($id);
        return view($this->view.'edit',compact('setting'));
    }

    public function update(Request $request , $id){

        $setting = Testimonial::findorfail($id);

        $this->validate(\request(),[
            // 'heading' =>'required',
            // 'title' =>'required',
//            'image' =>'required|file|mimes:jpeg,png,jpg,pdf',
            'review' =>'required',
            'author_name' =>'required',
            'author_designation' =>'required',
            'status' =>'required',
        ]);

        if(\request('image')){
            if($request->hasFile('image')){
                $extension = \request()->file('image')->getClientOriginalExtension();
                $image_folder_type = array_search('testimonial',config('custom.image_folders')); //for image saved in folder
                $count = rand(100,999);
                $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
                $image_path1 = $out_put_path[0];
            }
        }
        $requestData = $request->all();
        if(isset($image_path1)){
            $requestData['image'] = $image_path1;
        }
        $requestData['review'] = strip_tags($request['review']);
        $setting->fill($requestData);
       $setting->save();
        Session::flash('success','Testimonial is Updated!');
        return redirect($this->redirect);



    }
}
