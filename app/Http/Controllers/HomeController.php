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
        $services = Service::where('status',1)->get();
        $phone = Setting::where(['key' => 'phone','status' => '1'])->first();
        $email = Setting::where(['key' => 'email','status' => '1'])->first();
        $address = Setting::where(['key' => 'address','status' => '1'])->first();
        return view('contactus',compact('services','phone','email','address'));
    }

    public function accommodation_details($id){
        $accomodation = Accomodation::find($id);
        return view('accommodation',compact('accomodation'));
    }

    public function send_contact_mail(Request $request){
       $contact = new Contact();
       $service = '';
       $name = ($request['first_name'] != null) ? ($request['first_name'].' '.$request['last_name']) : $request['fullname'] ;

       $contact->fullname = $name;
       $contact->email = $request['email'];
       $contact->phone = $request['phone'];
       $contact->message = $request['message'];

       
        if($request->service_id != null){
          $service = Service::find($request['service_id'])->name ;
          $contact->service_id = $request['service_id'];
        }
        $contact->save();

        dispatch(function() use ($name, $service, $contact) {
        \Mail::send('contact_mail', array(

            'full_name' =>$name,

            'email' =>$contact['email'],

            'phone' =>$contact['phone'],

            'contact_message' =>$contact['message'],

            'service' =>$service ?? null,

           ), function($message) use ($service){

            $subject=($service!= '') ? 'Enquiry for '.$service : 'Contact/Feedback';
            $message->subject($subject);
            // $message->to('info@agilityhomecare.com.au', 'AgilityHomeCare')->subject($subject);
            $message->to('mahesh@extratechs.com.au', 'Extratech')->subject($subject);

            $message->cc('extratechweb@gmail.com', 'Extratech')->subject($subject);

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
//        dd(\request()->all());



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
        $subscription = new Subscription();
        $subscription->email = $email;
        $subscription->save();


        \Mail::send('subscribe_mail', array(


            'email' =>\request('email'),


            'subject' => 'Subscription Notice',

           ), function($message) use ($request){
            $subject = 'Subscription Notice';
            $message->subject('Subscription Notice');
            // $message->to('info@agilityhomecare.com.au', 'Qualuty Allied Health')->subject($subject);
            $message->to('extratechweb@gmail.com', 'Extratech')->subject($subject);
            // $message->cc('info@extratechs.com.au', 'Extratech')->subject('Subscription Notice');

           });
           return response()->json(['success' => 'Successfully subscribed!','status' =>'Ok'],200);
    }

    public function single_blog($slug){
        $blog = NewsAndUpdate::where(['slug' => $slug,'status' => 1])->orderby('id','asc')->first();
        // $services = Service::where('status',1)->get();
        return view('blog.single',compact('blog'));
    }

    public function save_coordination(Request $request){

        $this->validate(\request(),[
            'file' => 'required|file|max:20000|mimes:docx,pdf,jpg',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
           
        ],
        [
        'file.max' => 'The file must not be greater than 18MB',

        ]);
      
        if(!$request->is_sup_cor){
            $this->validate(\request(),[
            'sup_cor_com_name' => 'required',
            'sup_cor_email' => 'required',
            'sup_cor_com_phone' => 'required'
            ],
            [
            'sup_cor_com_name.required' => 'Support Coordinator Company name is required',
            'sup_cor_email.required' => 'Support Coordinator email is required',
            'sup_cor_com_phone.required' => 'Support Coordinator phone is required',

            ]);
        }

        if($request->is_nominee == '1'){
            $this->validate(\request(),[
                'nominee_name' => 'required',
                'nominee_email' => 'required',
                'nominee_phone' => 'required',
            ],
            [
                'nominee_name.required' => 'Nominee name is required',
                'nominee_email.required' => 'Nominee email is required',
                'nominee_phone.required' => 'Nominee phone is required',
            
            ]);
        }
        if($request->myImage != null){
            $folderPath = "signatures/";

            $base64Image = explode(";base64,", $request->myImage);
            $explodeImage = explode("image/", $base64Image[0]);
            $imageType = $explodeImage[1];
            $image_base64 = base64_decode($base64Image[1]);
            $file = $folderPath . uniqid() .'_'.$request->first_name.'_'.$request->last_name. '.'.$imageType;
            // $image_base64->store($file);

            Storage::disk('local')->put($file, $image_base64);
        }    
        
        $referral = new SupportCoordination();
        $name = ucfirst($request['first_name']) . ' '. ucfirst($request['last_name']);
        $referral->name = $name;
        $referral->email = $request['email'];
        $referral->phone = $request['phone'];
        $referral->address = $request['address'];
        $referral->ndis_number = $request['ndis_number'];
        $referral->nominee_email = $request['nominee_email'];
        $referral->nominee_name = $request['nominee_name'];
        $referral->is_sup_cor = $request['is_sup_cor'] ?? false;
        $referral->nominee_phone = $request['nominee_phone'];
        $referral->is_nominee = $request['is_nominee'];
        if(!$request->is_sup_cor){
            $referral->sup_cor_com_name = $request['sup_cor_com_name'];
            $referral->sup_cor_email = $request['sup_cor_email'];
            $referral->sup_cor_com_phone = $request['sup_cor_com_phone'];
        }
        $referral->agreement_start_date = $request['agreement_start_date'];
        if(!$request->is_further_notice){
        $referral->agreement_end_date = $request['agreement_end_date'];
        }
        $referral->agreement_signature = $file ?? null;
        $referral->dob = $request['dob'];
        if($request->hasFile('file')){
            $extension = \request()->file('file')->getClientOriginalExtension();
            $image_folder_type = array_search('ndis_plan',config('custom.image_folders')); //for image saved in folder
            $count = rand(100,999);
            $out_put_path = User::save_image(\request('file'),$extension,$count,$image_folder_type);
            
            is_array($out_put_path) ? $referral->file = $out_put_path[0] : $referral->file = $out_put_path;
        }
        $referral->save();
        dispatch(function() use ($referral,$name,$file) {
            $pdf = PDF::loadView('support_coordination_mail',array(

                'referral_id' => $referral->id,
    
                'name' =>$name,
        
                'email' =>$referral['email'],
    
                'phone' =>$referral['phone'],
        
                'dob' =>$referral['dob'],
        
                'address' =>$referral['address'],
        
                'ndis_number' =>$referral['ndis_number'],
        
                'is_nominee' =>$referral['is_nominee'],
        
                'nominee_name' =>$referral['nominee_name'],
        
                'nominee_email' =>$referral['nominee_email'],
        
                'nominee_phone' =>$referral['nominee_phone'],
        
                'sup_cor_com_name' =>$referral['sup_cor_com_name'],
        
                'is_sup_cor' => $referral['is_sup_cor'],
        
                'sup_cor_com_phone' => $referral['sup_cor_com_phone'],
        
                'sup_cor_email' => $referral['sup_cor_email'],
        
                'agreement_start_date' =>$referral['agreement_start_date'],
    
                // 'is_further_notice' => $referral['is_further_notice'],
        
                'agreement_end_date' =>$referral['agreement_end_date'],
    
                'signature' =>$file ?? null,
        
        
            ));
               \Mail::send('support_coordination_sample_mail', array(
                    
               ), function($message) use ($pdf,$referral){
                   if($referral->file != ''){
                     $file = public_path().'/'.$referral->file;
                     $message->attach($file);
                   }
                //    if($referral->agreement_signature != ''){
                //     $file = asset('storage/'.$referral->agreement_signature);
                //     // $file = public_path().'/storage/'.$referral->agreement_signature;
                //     $message->attach($file);
                //   }
                 
                $message->attachData($pdf->output(), 'support_cordination.pdf');
                $message->subject('Support Coordination Enquiry');
                // $message->to('info@agilityhomecare.com.au', 'Agility HomeCare')->subject('Support Coordination Enquiry');
                // $message->to('extratechweb@gmail.com', 'Extratech')->subject('Support Coordination Enquiry');
                $message->cc('mahesh@extratechs.com.au', 'Extratech')->subject('Support Coordination Enquiry');
        
               });
         });
     
    
           return redirect()->back()->with(['msg' => 'Successfully submitted.']);
    }


    public function audio_load(Request $request){
        return response()->json(['src' => 'https://code.responsivevoice.org/responsivevoice.js?key=gqRRrSwU' ]);
    }
}
