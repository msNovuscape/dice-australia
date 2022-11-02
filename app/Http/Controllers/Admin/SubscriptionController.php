<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{
    protected $view='admin.subscription.';
    protected $redirect='admin/subscriptions';

    public function index(){
        $subscriptions=Subscription::paginate(config('custom.per_page'));
        return view($this->view.'index',compact('subscriptions'));
    }

    public function show($id){

        $subscription = new Subscription();
        $subscription = $subscription->findorfail($id);
        return view($this->view . 'show', compact('subscription'));

    }


    




    

    public function delete($id){
        $setting=Placement::findorfail($id);
        if($setting->delete()){
            if (is_file(public_path().'/'.$setting->image) && file_exists(public_path().'/'.$setting->image)){
                unlink(public_path().'/'.$setting->image);
            }
        }
        Session::flash('success','Placement is deleted !');
        return redirect($this->redirect);

    }
    //
}
