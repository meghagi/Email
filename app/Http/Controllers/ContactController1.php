<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Fsacontact;
class ContactController1 extends Controller
{
    //
    public function index()
    {
        return view('email.ContactForm');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);
  
        $mailData= Contact::create($request->all());
        $recipientEmail= $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');


        // Mail::to('meghagangwal1201@gmail.com','gangwalpradeepkumar@gmail.com')->send(new ContactMail($mailData));
        // dd("Email send successfully");
        
        $mailData1=[
            $recipientEmail

        ];
         Mail::to($mailData1)->send(new ContactMail($mailData));
       // dd("Email send successfully");
        return redirect()->back()
                         ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }
public function dynamic_contact(Request $request, $id)
{
    //print_r($request->all());
        $contact=Contact::find($id);
    return view('email.ContactForm1',compact('contact'));
}
 public function savedynamic(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject1' => 'required',
            'message' => 'required'
        ]);
        print_r($request->all());
        $contact=new Contact();
    //    $abc= $contact->name=$request['name'];
    //     $contact->email=$request['email'];
    //     $contact->phone=$request['phone'];
    //     $contact->subject=$request['subject1'];
    //     $contact->message=$request['message'];
        $mailData= Contact::create($request->all());

        // Mail::to('meghagangwal1201@gmail.com','gangwalpradeepkumar@gmail.com')->send(new ContactMail($mailData));
        // dd("Email send successfully");
        $recipientEmail= $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

       // Mail::to($recipientEmail)->send(new ContactMail($subject, $message));
        $mailData1=[
        //    'meghagangwal1201@gmail.com','gangwalpradeepkumar@gmail.com'
        $recipientEmail

         ];
         Mail::to($recipientEmail)->send(new ContactMail($mailData1));
        //  Mail::to($mailData1)->send(new ContactMail($abc));
       // dd("Email send successfully");
        return redirect()->back()
                         ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
                         $contact->save();
    }
    public function index1()
    {
        return view('email.fsalistcontact');
    }
  
    public function store1(Request $request)
    {
        $request->validate([
            'nameofunits' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            
            'Address' => 'required',
            'District'=>'required',
            'message' => 'required'
        ]);
  
        $mailData= Fsacontact::create($request->all());
        $nameofunits=$request->input('nameofunits');
        $recipientEmail= $request->input('email');
        $Address = $request->input('Address');
        $District = $request->input('District');
        $message = $request->input('message');



        // Mail::to('meghagangwal1201@gmail.com','gangwalpradeepkumar@gmail.com')->send(new ContactMail($mailData));
        // dd("Email send successfully");
        
        $mailData1=[
            $recipientEmail

        ];
         Mail::to($mailData1)->send(new ContactMail($mailData));
       // dd("Email send successfully");
        return redirect()->back()
                         ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }


}
 

