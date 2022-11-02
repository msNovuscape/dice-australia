<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SeoTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SeoTitleController extends Controller
{
    protected $view = 'admin.seo_title.';
    protected $redirect = 'admin/seo_titles';

    public function index(){
        $settings = SeoTitle::paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));

    }
    public function create(){
        return view($this->view.'create');
    }

    public function store(Request $request){

      $this->validate(\request(),[
          'seo_type'=>'required',
          'status' => 'required'
      ]);
      $requestData = $request->all();
      $setting = SeoTitle::create($requestData);

        Session::flash('success','SEO Type is created');
        return redirect($this->redirect);
    }

    public function edit($id){
        $setting = SeoTitle::findorfail($id);
        return view($this->view.'edit',compact('setting'));
    }

    public function update(Request $request ,$id){
        $setting = SeoTitle::findorfail($id);

        $this->validate(\request(),[
            'seo_type'=>'required',
            'status' => 'required'
        ]);
        $requestData = $request->all();
        $setting->fill($requestData);
        $setting->save();

        Session::flash('success','Seo Title is Updated');
        return redirect($this->redirect);
    }

    public function delete($id){

        $setting=SeoTitle::findorfail($id);
            $setting->delete();
        Session::flash('success','Seo Title is deleted !');
        return redirect($this->redirect);

    }
    //
}
