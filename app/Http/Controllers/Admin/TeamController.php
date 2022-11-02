<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    //

    protected $view = 'admin.team.';
    protected $return = 'admin/teams';

    public function index(){
        $settings = Team::paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));
    }

    public function create(){
        return view($this->view.'create');
    }

    public function edit($id){
        $team = Team::findorfail($id);
        return view($this->view.'edit',compact('team'));
    }

    public function store(Request $request){
        //dd($request);
        $this->validate(\request(),[
            'team_name'=>'required',
            'designation'=>'required',
            
            'status'=>'required'
        ]);

        $requestData =  $request->all();
        if($request->hasFile('image')){
            $extension = \request()->file('image')->getClientOriginalExtension();
            $image_folder_type = array_search('team',config('custom.image_folders')); //for image saved in folder
            $count = rand(100,999);
            $out_put_path = User::save_image(\request('image'),$extension,$count,$image_folder_type);
            $image_path1 = $out_put_path[0];
        }
        if(isset($image_path1)){
            $requestData['image'] = $image_path1;
        }

        Team::create($requestData);
        Session::flash('success','Team is created');
        return redirect($this->return);

    }

    public function update(Request $request ,$id){
        //dd($request);
        $setting = Team::findorfail($id);

        $this->validate(\request(),[
            'team_name'=>'required',
            'designation'=>'required',
            'status'=>'required',
            'image' => 'file|mimes:jpeg,png,jpg'
        ]);
        if($request->hasFile('image')){
            $extension = \request()->file('image')->getClientOriginalExtension();
            $image_folder_type = array_search('team',config('custom.image_folders')); //for image saved in folder
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
        Session::flash('success','Team is Updated');
        return redirect($this->return);


    }

}
