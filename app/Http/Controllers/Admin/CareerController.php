<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Models\Career;
use App\Models\CareerPoint;
use App\Models\AboutUsPoint;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $view = 'admin.career.';
    protected $redirect = 'admin/careers';
    public function index()
    {
        $settings = Career::orderBy('id','DESC');
        // if(\request('title1')){
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
            
            
            'title' => 'required',
            'sub_title' => 'required',
            'point_title' => 'required',
            
            'image' => 'required|file|mimes:jpeg,png,jpg',
            'points' => 'required'
        ]);

        $setting = new Career();

        $setting->title = \request('title');
        $setting->point_title = strip_tags(\request('point_title'));
        $setting->sub_title = strip_tags(\request('sub_title'));
        $setting->status = \request('status');
        $setting->keyword = strip_tags(\request('keyword'));
        $setting->seo_title = strip_tags(\request('seo_title'));
        $setting->meta_keyword = strip_tags(\request('meta_keyword'));
        $setting->seo_description = strip_tags(\request('seo_description'));
        $setting->slug = Setting::create_slug(\request('seo_title'));
        if($request->hasFile('image')){
                $extension = \request()->file('image')->getClientOriginalExtension();
                $image_folder_type = array_search('career',config('custom.image_folders')); //for image saved in folder
                $count = rand(100,999);
                $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
                if($extension == "jpeg" || $extension == "jpg" || $extension == "png"){
                    $image_path = $out_put_path[0];
                    $setting->image = $image_path;
//                    $setting->doc_name = $out_put_path[2];
                }
            }

        if($setting->save()){
            $points = $request->points;
           
            foreach($points as $point){
                $career_point = new CareerPoint();
                $career_point->career_id = $setting->id;
                $career_point->point = $point;
                $career_point->save();
            }
            Session::flash('success','Career has been created!');
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
        $about_us = Career::findorfail($id);
        return view($this->view.'show',compact('about_us'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about_us = Career::findorfail($id);
      return view($this->view.'edit',compact('about_us'));
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
        $setting=Career::findorfail($id);

        $this->validate(\request(),[
            'title' => 'required',
            'sub_title' => 'required',
            // 'image' => 'file|mimes:jpeg,png,jpg',
            'points' => 'required'
        ]);



        $setting->title = \request('title');
        $setting->point_title = strip_tags(\request('point_title'));
        $setting->sub_title = strip_tags(\request('sub_title'));
        $setting->status = \request('status');
        $setting->keyword = strip_tags(\request('keyword'));
        $setting->seo_title = strip_tags(\request('seo_title'));
        $setting->meta_keyword = strip_tags(\request('meta_keyword'));
        $setting->seo_description = strip_tags(\request('seo_description'));
        $setting->slug = Setting::create_slug(\request('seo_title'));
        if($request->hasFile('image')){
            $extension = \request()->file('image')->getClientOriginalExtension();
            $image_folder_type = array_search('career',config('custom.image_folders')); //for image saved in folder
            $count = rand(100,999);
            $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
            $image_path = $out_put_path[0];
            $setting->image = $image_path;
//                    $setting->doc_name = $out_put_path[2];
        }
//        $requestData = $request->all();
//        $setting->fill($requestData);
        if($setting->update()){
            $points = $request->points;
         
            if((!empty($points)) && ($points[0] != null)){
                $career_point = $setting->career_points();
                $career_point->delete();
                foreach($points as $point){
                    $career_point = new CareerPoint();
                    $career_point->career_id = $id;
                    $career_point->point = $point;
                    $career_point->save();
                }
            }
            Session::flash('success','Career has been Updated!');
            return redirect($this->redirect);
        }
        
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSliders(){

        $settings = Slider::where('status',1)->get();
        return SliderResource::collection($settings);
    }
}
