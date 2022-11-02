<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Referral;
use App\Models\Subscription;
use App\Models\SupportCoordination;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class HomeController extends Controller
{
    public function indexAdmin()
    {
        if(Auth::check()){
            $settings= Referral::where('status',1);
            $support= SupportCoordination::all();
            $contact= Contact::all();
            $subscription= Subscription::all();
            $contacts = Contact::paginate(config('custom.per_page'));
            $referrals=Referral::paginate(config('custom.per_page'));
            return view('admin.index', compact('settings', 'support', 'contact', 'subscription', 'contacts', 'referrals'));
        }
        return view('admin.login');
    }

    public function getLogin()
    {
        if(Auth::check()){
            return redirect('admin/index');
        }
        return view('admin.login');
    }
    public function postLogin()
    {
        $this->validate(request(),[
            'email'=>'required',
            'password'=>'required',
        ]);
//        dd(\request()->all());



        if (Auth::attempt(['email'=>request('email'),'password'=>request('password')],request()->has('remember'))){
            return redirect('admin/index');
        }
//        Session::flash('success','Invalid Credential!');
        return redirect('login')->withErrors(['Invalid Credentials!']);
    }

    public function admin()
    {
        if(Auth::check()){
            return view('admin.index');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function change_password(){
        return view('admin.change_password_form');
    }

    public function update_password(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = auth()->user();
        
        if(Hash::check($request->old_password,$user->password)){

            $user = User::findorfail($user->id);
            if($user->update(['password' => Hash::make($request->password)])){
                return redirect()->back()->with('success','Password is successfully updated.');
            }
        }
        return redirect()->back()->with('custom_error','Your old password is incorrect! Please try again.');


        


    }
}
