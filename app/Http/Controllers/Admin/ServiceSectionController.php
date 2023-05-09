<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceSection;
use App\Models\ServiceSectionPoint;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ServiceSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $view = 'admin.service_section.';
    protected $redirect = 'admin/services/{id}/sections';

    public function index($id)
    {
        $service_name = Service::findorfail($id)->name;
        $service_section = ServiceSection::where('service_id',$id)->orderBy('order_by', 'ASC');


        // if(\request('name')){
        //     $key = \request('name');
        //     $services = $services->where('name','like','%'.$key.'%');
        // }
        // if(\request('status')){
        //     $key = \request('status');
        //     $services = $services->where('status',$key);
        // }
        $service_sections = $service_section->paginate(config('custom.per_page'));
        return view($this->view.'index',compact('service_sections','service_name','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $service_name = Service::findorfail($id)->name;
        return view($this->view.'create',compact('service_name','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {


        $this->validate(\request(),[

            'title' => 'required',
            'status' => 'required',
            'order_by' => 'required'

        ]);
        $service_section = new ServiceSection();

        $service_section->title = \request('title');
        $service_section->sub_title = \request('sub_title');
        $service_section->description = strip_tags(\request('description'));
        $service_section->sub_description = strip_tags(\request('sub_description'));
        $service_section->service_id = $id;
        $service_section->status = \request('status');
        $service_section->order_by = \request('order_by');
        // $service->image_alt = \request('image_alt');
        // $service->slug = Setting::create_slug(\request('seo_title'));


        if($request->hasFile('image')){
          $extension = \request()->file('image')->getClientOriginalExtension();
                $image_folder_type = array_search('service',config('custom.image_folders')); //for image saved in folder
                $count = rand(100,999);
                $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
                // dd($out_put_path);
                if($extension == "jpeg" || $extension == "jpg" || $extension == "png"){
                    $image_path = $out_put_path[0];
                    $service_section->image = $image_path;
//                    $setting->doc_name = $out_put_path[2];
                }
        }


        if($service_section->save()){
            $points = $request->points;
            $point_descriptions = $request->point_descriptions ?? [];
            $icons = $request->icons ?? [];

            if($points[0] != null){
            foreach($points as $key => $point){

                $service_section_point = new ServiceSectionPoint();

                $service_section_point->service_section_id = $service_section->id;
                if(array_key_exists($key,$point_descriptions)){
                $service_section_point->point_description = strip_tags($point_descriptions[$key]);
                }
                if(array_key_exists($key,$icons)){
                $extension = $icons[$key]->getClientOriginalExtension();
                $image_folder_type = array_search('service',config('custom.image_folders')); //for image saved in folder

                $count = rand(100,999);

                $out_put_path = User::save_image($icons[$key],$extension,$count,$image_folder_type);
                is_array($out_put_path) ? $service_section_point->icon = $out_put_path[0] : $service_section_point->icon = $out_put_path;
                // $service_section_point->icon = $points_descriptions[$key];
               }
                $service_section_point->point = $point;
                $service_section_point->save();
            }
            }
            Session::flash('success','Service Section has has been created!');
            return redirect('admin/services/'.$id.'/sections');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$secId)
    {


        // $service = new Service();
        // $service_section = new ServiceSection();
        $service = Service::findorfail($id);

        $service_section = ServiceSection::findorfail($secId);



        return view($this->view . 'show', compact('service','service_section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$secId)
    {
        $service = new Service();
        $service_section = new ServiceSection();
        $service = $service->findorfail($id);
        $service_section = $service_section->findorfail($secId);




        return view($this->view . 'edit', compact('service','service_section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $secId)
    {

        $this->validate(\request(),[
            'title' => 'required',
            'status' => 'required',
            'order_by' => 'required'
        ]);
        $service_section = ServiceSection::findOrFail($secId);
        $service_section->title = \request('title');
        $service_section->sub_title = \request('sub_title');
        $service_section->description = strip_tags(\request('description'));
        $service_section->sub_description = strip_tags(\request('sub_description'));
        $service_section->service_id = $id;
        $service_section->status = \request('status');
        $service_section->order_by = \request('order_by');

        if($request->hasFile('image')){
            $extension = \request()->file('image')->getClientOriginalExtension();
            $image_folder_type = array_search('service',config('custom.image_folders')); //for image saved in folder
            $count = rand(100,999);
            $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
            $image_path = $out_put_path[0];
            if (is_file('/home/ruggb895obtt/public_html/'.$service_section->image) && file_exists('/home/ruggb895obtt/public_html/'.$service_section->image)){
                unlink('/home/ruggb895obtt/public_html/'.$service_section->image);
            }
            $service_section->image = $image_path;
        }
        if($service_section->update()){
            $points = $request->points;

            $point_descriptions = $request->point_descriptions ?? [];
            $icons = $request->icons ?? [];

            if($points != null){
                $service_point = $service_section->service_section_point();
                $service_point->delete();
            foreach($points as $key => $point){

                $service_section_point = new ServiceSectionPoint();
                $service_section_point->service_section_id = $service_section->id;
                if(array_key_exists($key,$point_descriptions)){
                $service_section_point->point_description = strip_tags($point_descriptions[$key]);
                }
                if(array_key_exists($key,$icons)){
                $extension = $icons[$key]->getClientOriginalExtension();
                $image_folder_type = array_search('service',config('custom.image_folders')); //for image saved in folder

                $count = rand(100,999);

                $out_put_path = User::save_image($icons[$key],$extension,$count,$image_folder_type);
                is_array($out_put_path) ? $service_section_point->icon = $out_put_path[0] : $service_section_point->icon = $out_put_path;
                // $service_section_point->icon = $points_descriptions[$key];
               }
                $service_section_point->point = $point;
                $service_section_point->save();
            }
            }
            Session::flash('success','Service Section has been successfully updated!');
            return redirect('admin/services/'.$id.'/sections');

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

    public function service_point($service_point_id){
        if(Auth::user()){
            $setting = ServiceSectionPoint::findorfail($service_point_id);
            $setting->delete();
            return response()->json(['service_point_id' => $service_point_id]);
        }

    }
}
