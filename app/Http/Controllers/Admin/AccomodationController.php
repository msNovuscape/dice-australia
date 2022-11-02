<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accomodation;
use App\Models\BlogPoint;
use App\Models\NewsAndUpdatePoint;
use App\Models\Setting;
use App\Models\User;
use App\Models\AccomodationFeature;
use App\Models\AccomodationInformation;
use App\Models\AccomodationSliderTitle;
use App\Models\AccomodationImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use function GuzzleHttp\Promise\all;

class AccomodationController extends Controller
{
    protected $view = 'admin.accomodation.';
    protected $redirect = 'admin/accomodations';

    public function index()
    {
        $settings = Accomodation::orderBy('id','DESC');

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
                'title' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'status' => 'required',
                'images' => 'required',
                'slider_image' => 'required|file|mimes:jpeg,png,jpg'
            ]);
            
        if($request->has('slider_image')){
            
            $extension = \request()->file('slider_image')->getClientOriginalExtension();
            $image_folder_type = array_search('accomodation',config('custom.image_folders')); //for image saved in folder
            $count = rand(100,999);
            $out_put_path = User::save_image(\request()->file('slider_image'),$extension,$count,$image_folder_type);
            $image_path1 = $out_put_path[0];
        }
    
        $requestData = $request->all();
        if(isset($image_path1)){
            $requestData['slider_image'] = $image_path1;
        }
      

        // $requestData['slug'] = Setting::create_slug($requestData['keyword']);
        $accomodation = Accomodation::create($requestData);

        if($request->hasFile('images')){
            foreach($request->file('images') as $imagefile) {
            $extension = $imagefile->getClientOriginalExtension();
            $image_folder_type = array_search('accomodation',config('custom.image_folders')); //for image saved in folder
            $count = rand(100,999);
            $out_put_path = User::save_image($imagefile,$extension,$count,$image_folder_type);
            $image_path1 = $out_put_path[0];
            $accomodation_image = new AccomodationImage();
            $accomodation_image->accomodation_id = $accomodation->id;
            $accomodation_image->image = $image_path1;
            $accomodation_image->save();
            
            }
            
        }
        if(\request('feature_name')){
            foreach (\request('feature_name') as $index => $value){
                $setting_point = new AccomodationFeature();
                $setting_point->accomodation_id = $accomodation->id;
                $setting_point->feature_name = $value;
                $setting_point->save();
            }
        }
        if(\request('information_name')){
            foreach (\request('information_name') as $index => $value){
                $setting_point = new AccomodationInformation();
                $setting_point->accomodation_id = $accomodation->id;
                $setting_point->information_name = $value;
                $setting_point->save();
            }
        }
        if(\request('title_name')){
            foreach (\request('title_name') as $index => $value){
                $setting_point = new AccomodationSliderTitle();
                $setting_point->accomodation_id = $accomodation->id;
                $setting_point->title_name = $value;
                $setting_point->save();
            }
        }
        Session::flash('success','Accomodation successfully created');
        return redirect($this->redirect);
    }

    public function show($id)
    {
        $setting =Accomodation::findorfail($id);
        return view($this->view.'show',compact('setting'));
    }

    public function edit($id){
        $setting =Accomodation::findorfail($id);
        return view($this->view.'edit',compact('setting'));
    }

    public function update(Request $request, $id){

//        dd(\request()->all());
        $setting =Accomodation::findorfail($id);
            $this->validate(\request(), [
                'title' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'status' => 'required'
                // 'images' => 'required',
                // 'slider_image' => 'required|file|mimes:jpeg,png,jpg'
            ]);

        if(\request('slider_image')){
            $this->validate(\request(),[
                'image' => 'file|mimes:jpeg,png,jpg'
            ]);
            if($request->hasFile('slider_image')){
                $extension = $request->file('slider_image')->getClientOriginalExtension();
                $image_folder_type = array_search('accomodation',config('custom.image_folders')); //for image saved in folder
                $count = rand(100,999);
                $out_put_path = User::save_image($request->file('slider_image'),$extension,$count,$image_folder_type);
                $image_path1 = $out_put_path[0];
                if (is_file(public_path().'/'.$setting->slider_image) && file_exists(public_path().'/'.$setting->slider_image)){
                    unlink(public_path().'/'.$setting->slider_image);
                }
            }
        }


        $requestData = $request->all();
        // $requestData['slug'] = Setting::create_slug($requestData['keyword']);
        if(isset($image_path1)){
            $requestData['slider_image'] = $image_path1;
        }
        $setting->fill($requestData);
        if($setting->save()){

            if($request->hasFile('images')){
                
                $accommodation_image = $setting->accommodation_images();
                $accommodation_image->delete();
                foreach($request->file('images') as $imagefile) {
                $extension = $imagefile->getClientOriginalExtension();
                $image_folder_type = array_search('accomodation',config('custom.image_folders')); //for image saved in folder
                $count = rand(100,999);
                $out_put_path = User::save_image($imagefile,$extension,$count,$image_folder_type);
                $image_path1 = $out_put_path[0];
                // if (is_file(public_path().'/'.$setting->slider_image) && file_exists(public_path().'/'.$setting->slider_image)){
                //     unlink(public_path().'/'.$setting->slider_image);
                // }
                $accomodation_image = new AccomodationImage();
                $accomodation_image->accomodation_id = $id;
                $accomodation_image->image = $image_path1;
                $accomodation_image->save();
                
                }
                
            }
           
            if(\request('feature_name') ){
                $accommodation_feature = $setting->accommodation_features();
                $accommodation_feature->delete();
                    foreach (\request('feature_name') as $index => $value){
                        $setting_point = new AccomodationFeature();
                        $setting_point->accomodation_id = $id;
                        $setting_point->feature_name = $value;
                        $setting_point->save();
                    }
            }

            if(\request('information_name') ){
                $accommodation_information = $setting->accommodation_informations();
                $accommodation_information->delete();
                    foreach (\request('information_name') as $index => $value){
                        $setting_point = new AccomodationInformation();
                        $setting_point->accomodation_id = $id;
                        $setting_point->information_name = $value;
                        $setting_point->save();
                    }
            }

            if(\request('title_name') ){
                $accommodation_title = $setting->accommodation_slider_titles();
                $accommodation_title->delete();
                    foreach (\request('title_name') as $index => $value){
                        $setting_point = new AccomodationSlidertitle();
                        $setting_point->accomodation_id = $id;
                        $setting_point->title_name = $value;
                        $setting_point->save();
                    }
            }
                
        }

        Session::flash('success','Accomodation succesffuly edited.');
        return redirect($this->redirect);

    }

    public function delete($id){
        $setting=Accomodation::findorfail($id);
        // if($setting->accommodation_features->count() > 0){
        //     $setting->accommodation_features()->delete();
        // }
        // if($setting->accommodation_informations->count() > 0){
        //     $setting->accommodation_informations()->delete();
        // }
        // if($setting->accommodation_slider_titles->count() > 0){
        //     $setting->accommodation_informations()->delete();
        // }
        if($setting->delete()){
            if (is_file(public_path().'/'.$setting->slider_image) && file_exists(public_path().'/'.$setting->slider_image)){
                unlink(public_path().'/'.$setting->slider_image);
            }
        }
        Session::flash('success','Accomodation successfully is deleted !');
        return redirect($this->redirect);
    }

    public function points_remove($id)
    {
        if(Auth::user()){
            $setting = AccomodationFeature::findorfail($id);
            $setting->delete();
            return response()->json(['point_id' => $id]);
        }

    }
    public function information_points_remove($id)
    {
        if(Auth::user()){
            $setting = AccomodationInformation::findorfail($id);
            $setting->delete();
            return response()->json(['point_id' => $id]);
        }

    }
    public function slider_points_remove($id)
    {
        if(Auth::user()){
            $setting = AccomodationSliderTitle::findorfail($id);
            $setting->delete();
            return response()->json(['point_id' => $id]);
        }

    }

}
