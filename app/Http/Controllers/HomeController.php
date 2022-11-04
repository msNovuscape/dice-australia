<?php

namespace App\Http\Controllers;

use App\Models\NewsAndUpdate;
use App\Models\Service;
use App\Models\AboutUs;
use App\Models\Accomodation;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Career;
use App\Models\NdisPricing;
use App\Models\Subscription;
use App\Models\SupportCoordination;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function index()
    {
       

        $about_us = AboutUs::where('status',1)->get();
        $testimonials = Testimonial::where('status',1)->get();
        $news_and_updates= NewsAndUpdate::where(['status'=>'1'])->orderBy('id','desc')->get();
        $sliders = Slider::where('status',1)->get();
        $services = Service::where('status',1)->orderByRaw('CONVERT(order_by, SIGNED) asc')->limit(6)->get();
        $ndis_pricing = NdisPricing::where('status',1)->first();

        $phone = Setting::where(['key' => 'phone','status' => '1'])->first();
        $email = Setting::where(['key' => 'email','status' => '1'])->first();
        $address = Setting::where(['key' => 'address','status' => '1'])->first();
        return view('welcome',compact('services','sliders','about_us','news_and_updates','testimonials','phone','email','address','ndis_pricing'));
    }

    public function service(){
        $services = Service::where('status',1)->orderByRaw('CONVERT(order_by, SIGNED) asc')->get();
        $service_limit = Service::where('status',1)->limit('8')->get();
        return view('service', compact('services','service_limit'));
    }

    public function about(){
        $about = AboutUs::where('status',1)->get();
        return view('about',compact('about'));
    }

    public function ndis(){
        return view('ndis-scheme');
    }
    public function contact(){
        // $services = Service::where('status',1)->get();
        $phone = Setting::where(['key' => 'phone','status' => '1'])->first();
        $email = Setting::where(['key' => 'email','status' => '1'])->first();
        $address = Setting::where(['key' => 'address','status' => '1'])->first();
        return view('contact',compact('phone','email','address'));
    }

    public function accommodation_details($id){
        $accomodation = Accomodation::find($id);
        return view('accommodation',compact('accomodation'));
    }

    public function send_contact_mail(Request $request){
       $contact = new Contact();
       $service = '';
       $name = ($request['firstname'] != null) ? ($request['firstname'].' '.$request['lastname']) : $request['fullname'] ;

       $contact->fullname = $name;
       $contact->email = $request['email'];
       $contact->phone = $request['phone'];
       $contact->message = $request['message'];

       
        // if($request->service_id != null){
        //   $service = Service::find($request['service_id'])->name ;
        //   $contact->service_id = $request['service_id'];
        // }
        $contact->save();

        dispatch(function() use ($name,$service, $contact) {
        \Mail::send('contact_mail', array(

            'full_name' =>$contact['fullname'],

            'email' =>$contact['email'],

            'phone' =>$contact['phone'],

            'contact_message' =>$contact['message'],

            // 'service' =>$service ?? null,

           ), function($message) use ($service){
            $subject = 'Contact/Enquiry';
            // $subject=($service!= '') ? 'Enquiry for '.$service : 'Contact/Feedback';
            $message->subject($subject);
            // $message->to('info@agilityhomecare.com.au', 'AgilityHomeCare')->subject($subject);
            $message->to('mahesh@extratechs.com.au', 'Extratech')->subject($subject);


           });
        });

        return response()->json(['success' => 'Thank you for your interest. We will get back to you soon.','status' =>'Ok'],200);

    }

    public function testimonials(){
        $testimonials = Testimonial::where('status',1)->get();
        return view('testimonial',compact('testimonials'));
    }

    public function blogs(){
        $blogs = NewsAndUpdate::where('status',1)->get();
        return view('blogs',compact('blogs'));
    }

    public function single(){
        return view('service.single');
    }

    public function career(){
        $career = Career::where(['status'=>1])->get();
        return view('career',compact('career'));
    }

    public function enquiry(){
        $services = Service::where('status',1)->orderByRaw('CONVERT(order_by, SIGNED) asc')->get();
        return view('enquiry',compact('services'));
    }

     public function coordination(){
         return view('coordination-form');
     }

    public  function gallery(){
        $gallery = Gallery::where(['status'=>1])->get();
        return view('gallery',compact('gallery'));
    }

    public function getLogin()
    {
        if(Auth::check()){
            return redirect('admin');
        }
        return view('admin.login');
    }
    public function postLogin()
    {
        $this->validate(request(),[
            'email'=>'required',
            'password'=>'required',
        ]);



        if (Auth::attempt(['email'=>request('email'),'password'=>request('password')],request()->has('remember'))){
            return redirect('admin');
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
    public function subscribe(Request $request)
    {

        $email = $request->email;
        $name = $request->name;
        $subscription = new Subscription();
        $subscription->email = $email;
        $subscription->name = $name;
        $subscription->save();


        \Mail::send('subscribe_mail', array(

            'email' =>\request('email'),

            'name' =>\request('name'),

            'subject' => 'Subscription Notice',

           ), function($message) use ($request){
               
            $subject = 'Subscription Notice';
            $message->subject('Subscription Notice');
            // $message->to('info@agilityhomecare.com.au', 'Qualuty Allied Health')->subject($subject);
            $message->to('mahesh@extratechs.com.au', 'Extratech')->subject($subject);
            // $message->cc('info@extratechs.com.au', 'Extratech')->subject('Subscription Notice');

           });
           return response()->json(['success' => 'Successfully subscribed!','status' =>'Ok'],200);
    }

    public function single_blog($slug){
        $blog = NewsAndUpdate::where(['slug' => $slug,'status' => 1])->orderby('id','asc')->first();
        // $services = Service::where('status',1)->get();
        return view('blog.single',compact('blog'));
    }
    
}
