<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServicePoint;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $view = 'admin.service.';
    protected $redirect = 'admin/services';

    public function index()
    {
        $services = Service::orderBy('order_by','ASC');

        if(\request('name')){
            $key = \request('name');
            $services = $services->where('name','like','%'.$key.'%');
        }
        if(\request('status')){
            $key = \request('status');
            $services = $services->where('status',$key);
        }
        $services = $services->paginate(config('custom.per_page'));
        return view($this->view.'index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate(\request(),[
            'name' => 'required',
            'seo_title' => 'required',
            'short_description' => 'required',
            'keywords'=>'required',
            'icon' => 'file|mimes:jpeg,png,jpg,svg,'
        ]);
        $service = new Service();
        $service->name = \request('name');
        // $service->image = \request('image');
        // $service->image_title = \request('image_title');
        // $service->top_description = \request('top_description');
        // $service->image_description = \request('image_description');
        // $service->bottom_description = \request('bottom_description');
        $service->seo_description = strip_tags(\request('seo_description'));
        $service->seo_title = \request('seo_title');
        $service->keywords = \request('keywords');
        // $service->icon = \request('icon');
        $service->meta_keywords = strip_tags(\request('meta_keywords'));
        $service->short_description = strip_tags(\request('short_description'));
        // $service->point_title = \request('point_title');
        // $service->description_title = \request('description_title');
        $service->status = \request('status');
        $service->order_by = \request('order_by');
        // $service->image_alt = \request('image_alt');
        $service->slug = Setting::create_slug(\request('seo_title'));


        if($request->hasFile('icon')){
            $extension = \request()->file('icon')->getClientOriginalExtension();
            $image_folder_type = array_search('service',config('custom.image_folders')); //for image saved in folder
            
            $count = rand(100,999);
            
            $out_put_path = User::save_image(\request('icon'),$extension,$count,$image_folder_type);
            is_array($out_put_path) ? $service->icon = $out_put_path[0] : $service->icon = $out_put_path;
        }


        if($service->save()){
            // $points = $request->points;
            // foreach($points as $point){
            //     $service_point = new ServicePoint();
            //     $service_point->service_id = $service->id;
            //     $service_point->point = $point;
            //     $service_point->save();
            // }
            Session::flash('success','Service has been created!');
            return redirect($this->redirect);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = new Service();


        $service = $service->findorfail($id);


        return view($this->view . 'show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = new Service();


        $service = $service->findorfail($id);


        return view($this->view . 'edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(\request(),[

            'name' => 'required',
            'short_description' => 'required',
            'seo_title' => 'required',
            'keywords'=>'required',

        ]);
        $service = new Service();
        $service = $service->findorfail($id);
        $service->name = \request('name');
        $service->short_description = \request('short_description');
        $service->seo_description = \request('seo_description');
        $service->seo_title = \request('seo_title');
        $service->keywords = \request('keywords');
      
        $service->meta_keywords = \request('meta_keywords');
        $service->status = \request('status');
        $service->order_by = \request('order_by');
        $service->slug = Setting::create_slug(\request('seo_title'));

        if($request->hasFile('icon')){

            $extension = \request()->file('icon')->getClientOriginalExtension();

            $image_folder_type = array_search('service',config('custom.image_folders')); //for image saved in folder
            $count = rand(100,999);
            $out_put_path = User::save_image(\request('icon'),$extension,$count,$image_folder_type);
            

            if (is_file(public_path().'/'.$service->icon) && file_exists(public_path().'/'.$service->icon)){
                unlink(public_path().'/'.$service->icon);
            }
           is_array($out_put_path) ? $service->icon = $out_put_path[0] : $service->icon = $out_put_path;
            
            
        }
        if($service->update()){
            Session::flash('success','Service has been successfully updated!');
            return redirect($this->redirect);
            // $service_point = $service->service_point();
            // $service_point->delete();
            // $points = $request->points;
            // foreach($points as $point){
            //     $service_point = new ServicePoint();
            //     $service_point->service_id = $service->id;
            //     $service_point->point = $point;
            //     $service_point->save();
            

            

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $setting=Service::findorfail($id);
        if (is_file(public_path().'/'.$setting->icon) && file_exists(public_path().'/'.$setting->icon)){
            unlink(public_path().'/'.$setting->icon);
        }
        $setting->delete();
        Session::flash('success','Service has been sucessfully deleted!');
        return redirect($this->redirect);
        //dd("here");
    }


    public function service_point($service_point_id){
        if(Auth::user()){
            $setting = ServicePoint::findorfail($service_point_id);
            $setting->delete();
            return response()->json(['service_point_id' => $service_point_id]);
        }

    }
}
