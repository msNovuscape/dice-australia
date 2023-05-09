<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $view = 'admin.slider.';
    protected $redirect = 'admin/sliders';
    public function index()
    {
        $settings = Slider::orderBy('id','DESC');
        if(\request('title1')){
            $key = \request('title1');
            $settings = $settings->where('title1','like','%'.$key.'%');
        }
        if(\request('status')){
            $key = \request('status');
            $settings = $settings->where('status',$key);
        }
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
            'title1' => 'required',
            'button_name' => 'required',
            // 'title2' => 'required',
            // 'description' => 'required',
            'image' => 'required|file|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);

        $setting = new Slider();

        $setting->title1 = \request('title1');
        $setting->title2 = \request('title2');
        $setting->description = \request('description');
        $setting->status = \request('status');
        $setting->button_name = \request('button_name');
        $setting->link = \request('link');
        $setting->image_alt = \request('image_alt');
        if($request->hasFile('image')){
                $extension = \request()->file('image')->getClientOriginalExtension();
                $image_folder_type = array_search('slider',config('custom.image_folders')); //for image saved in folder
                $count = rand(100,999);
                $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
                if($extension == "jpeg" || $extension == "jpg" || $extension == "png"){
                    $image_path = $out_put_path[0];
                    $setting->image = $image_path;
//                    $setting->doc_name = $out_put_path[2];
                }
            }

        $setting->save();
        Session::flash('success','Slider has been created!');
        return redirect($this->redirect);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Slider::findorfail($id);
      return view($this->view.'edit',compact('setting'));
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
        $setting=Slider::findorfail($id);

        $this->validate(\request(),[
            'title1' => 'required',
            // 'title1' => 'required',
            // 'title2' => 'required',
            // 'description' => 'required',
            'image' => 'file|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);



        $setting->title1 = \request('title1');
        $setting->title2 = \request('title2');
        $setting->description = \request('description');
        $setting->status = \request('status');
        $setting->button_name = \request('button_name');
        $setting->link = \request('link');
        $setting->image_alt = \request('image_alt');
        if($request->hasFile('image')){
            $extension = \request()->file('image')->getClientOriginalExtension();
            $image_folder_type = array_search('slider',config('custom.image_folders')); //for image saved in folder
            $count = rand(100,999);
            $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);

            $image_path = $out_put_path[0];
            if (is_file(public_path().'/'.$setting->image) && file_exists(public_path().'/'.$setting->image)){
                unlink(public_path().'/'.$setting->image);
            }
            if(isset($image_path)){
                $setting->image = $image_path;

            }

//                    $setting->doc_name = $out_put_path[2];
        }
//        $requestData = $request->all();
//        $setting->fill($requestData);
        $setting->update();
        Session::flash('success','Slider has been Updated!');
      return redirect($this->redirect);
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::findorfail($id);
        if (is_file(public_path().'/'.$slider->image) && file_exists(public_path().'/'.$slider->image)){
            unlink(public_path().'/'.$slider->image);
        }
        $slider->delete();
        Session::flash('success','Slider has been sucessfully deleted!');
        return redirect($this->redirect);
    }

    public function getSliders(){

        $settings = Slider::where('status',1)->get();
        // return SliderResource::collection($settings);
    }
}
