<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Models\Gallery;
use App\Models\BlogPoint;
use App\Models\NewsAndUpdatePoint;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\Promise\all;

class GalleryController extends Controller
{
    protected $view = 'admin.gallery.';
    protected $redirect = 'admin/galleries';

    public function index()
    {
        $settings = Gallery::orderBy('id','DESC');

        if(\request('name')){
            $key = \request('name');
            $settings = $settings->where('title','like','%'.$key.'%');
        }
        if(\request('status')){
            $key = \request('status');
            $settings = $settings->where('status',$key);
        }
        $settings = $settings->paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));
    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(Request $request)
    {       
        
   
            $this->validate(\request(), [
             
                'seo_title' => 'nullable',
                'seo_description' => 'nullable',
               
                'keyword' => 'required',
                'meta-keyword' => 'nullable',
                'status' => 'required',
                'image' => 'required|file|mimes:jpeg,png,jpg,pdf'
            ]);
            if($request->hasFile('image')){
                $extension = \request()->file('image')->getClientOriginalExtension();
                $image_folder_type = array_search('gallery',config('custom.image_folders')); //for image saved in folder
                $count = rand(100,999);
                $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
                $image_path1 = $out_put_path[0];
            }

        $requestData = $request->all();
        if(isset($image_path1)){
            $requestData['image'] = $image_path1;
        }

        $requestData['slug'] = Setting::create_slug($requestData['keyword']);
        $setting = Gallery::create($requestData);
        
        Session::flash('success','Gallery successfully created');
        return redirect($this->redirect);
    }

    public function show($id)
    {
        $setting =Gallery::findorfail($id);
        return view($this->view.'show',compact('setting'));
    }

    public function edit($id){
        $setting =Gallery::findorfail($id);
        return view($this->view.'edit',compact('setting'));
    }

    public function update(Request $request, $id){

//        dd(\request()->all());
        $setting =Gallery::findorfail($id);
        $this->validate(\request(), [
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'keyword' => 'required',
            'meta-keyword' => 'nullable',
            'status' => 'required',
        ]);

        if(\request('image')){
            $this->validate(\request(),[
                'image' => 'file|mimes:jpeg,png,jpg,pdf'
            ]);
            if($request->hasFile('image')){
                $extension = \request()->file('image')->getClientOriginalExtension();
                $image_folder_type = array_search('gallery',config('custom.image_folders')); //for image saved in folder
                $count = rand(100,999);
                $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
                $image_path1 = $out_put_path[0];
                if (is_file(public_path().'/'.$setting->image) && file_exists(public_path().'/'.$setting->image)){
                    unlink(public_path().'/'.$setting->image);
                }
            }
        }


        $requestData = $request->all();
        $requestData['slug'] = Setting::create_slug($requestData['keyword']);
        if(isset($image_path1)){
            $requestData['image'] = $image_path1;
        }
        $setting->fill($requestData);
        $setting->save();
        
        Session::flash('success','Gallery succesffuly updated.');
        return redirect($this->redirect);

    }

    public function delete($id){
        $setting=Gallery::findorfail($id);
        
        if($setting->delete()){
            if (is_file(public_path().'/'.$setting->image) && file_exists(public_path().'/'.$setting->image)){
                unlink(public_path().'/'.$setting->image);
            }
        }
        Session::flash('success','Gallery is deleted !');
        return redirect($this->redirect);
    }

    // public function blog_point($blog_point_id)
    // {
    //     if(Auth::user()){
    //         $setting = BlogPoint::findorfail($blog_point_id);
    //         $setting->delete();
    //         return response()->json(['blog_point_id' => $blog_point_id]);
    //     }

    // }

}
