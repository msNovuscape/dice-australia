<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactDescription;
use Illuminate\Support\Facades\Session;
use Mail;

class ContactUsController extends Controller
{
    protected $view = 'admin.contact.';
    protected $redirect = 'admin/contacts';

    public function index()
    {
        $settings = Contact::orderBy('id','DESC');
        if(\request('fullname')){
            $key = \request('fullname');
            $settings = $settings->where('fullname','like','%'.$key.'%');
        }
        if(\request('status')){
            $key = \request('status');
            $settings = $settings->where('status',$key);
        }
        $contacts = $settings->paginate(config('custom.per_page'));
        return view($this->view.'index',compact('contacts'));
    }

    public function show($id)
    {
       
        $contact = new Contact();


        $contact = $contact->findorfail($id);


        return view($this->view . 'show', compact('contact'));
    }
    public function store(Request $request){

        $this->validate(\request(),[
            'name' => 'required',
            'email' => 'required|indisposable',
            'phone' => 'required|digits:10',

        ]);


        $contact = new ContactUs();
        $contact->name = \request('name');
        $contact->email = \request('email');
        $contact->phone = \request('phone');
        $contact->query_type = \request('query_type');
        $contact->status = 1;
        $contact->email_verified_at = \request('email_verified_at');

        if($contact->save()){

            $contact_description = new ContactDescription();
            $contact_description->contact_us_id = $contact->id;
            $contact_description->contact_us_type = \request('contact_us_type');
            $contact_description->message = \request('message');
            $contact_description->save();

           \Mail::send('admin.contact.mail', array(

           'name' =>\request('name'),

           'email' =>\request('email'),

           'query_type' => (\request('query_type') == '1') ? 'Contact' : 'Quick Enquiry',

           'contact_us_type' =>(\request('contact_us_type') == '1') ? 'Academic' : 'Service',

           'phone' =>\request('phone'),

           'msg' => \request('message'),

           'subject' => 'Contact Form',

          ), function($message) use ($request){

           $subject='Contact Form';

           $message->to('info@extratechs.com.au', 'Extratech')->subject($subject);

          });

         return response()->json(['success' => 'Your query is submitted successfully.','status' =>'Ok'],200);

        }

    }

}
