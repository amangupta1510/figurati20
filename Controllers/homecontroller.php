<?php

namespace App\Http\Controllers;
use Validator;
use Response;
use File;
use Auth;
use Storage;
use PDF;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\SendMaildmca;
use App\Mail\SendMailCareers;
use App\Mail\SendMailpassword;
use DB;
use App\admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class homecontroller extends Controller
{   
	
    public function index()
    {  
        return view('index');  
    }
     public function contact_us()
    {  
        return view('contact_us');
    }
     public function events()
    {  
        return view('events');
    }
     public function about_us()
    {  
        return view('about_us');
    }
     public function faq()
    {  
        return view('faq');
    }
     public function career()
    {  
        return view('career');
    }
    public function description()
    {  
        return view('description');
    }
     public function light_beer()
    {  
        return view('light_beer');
    }
     public function strong_beer()
    {  
        return view('strong_beer');
    }
     public function extra_strong_beer()
    {  
        return view('extra_strong_beer');
    }
    public function DMCA()
    {  
        return view('DMCA');
    }
    public function thank_you()
    {  
        return view('thank_you');
    }
    public function enquiry(Request $request)
    {  
        $data =  array('name' => $request->name,'subject' => $request->subject,'email' => $request->email,'body' => $request->body);
        Mail::to('secretarial@figurati20.com')->send(new SendMail($data));
        return redirect()->route('thank_you');
    }
    public function dmca_submit(Request $request)
    {  
        $data =  array('name' => $request->name,'subject' => $request->subject,'email' => $request->email,'body' => $request->body);
        Mail::to('secretarial@figurati20.com')->send(new SendMaildmca($data));
        return redirect()->route('thank_you');
    }
    public function career_enquiry(Request $request)
    {  
        $data =  array('first_name' => $request->first_name,'last_name' => $request->last_name,'contact' => $request->contact,'email' => $request->email,'link' => $request->link,'interest' => $request->interest,'location' => $request->location);
        Mail::to('secretarial@figurati20.com')->send(new SendMailCareers($data));
        return redirect()->route('thank_you');
    }

    public function otpcheck(Request $request){
           $count = 0;
           $where=['username'=>$request->email,'mobile'=>$request->mobile,'otp'=>$request->otp,'verified'=>'false','active'=>0];
           $count = admin::where($where)->count();
           if ($count>0) {
              $co = admin::where($where)->get();
              foreach ($co as $c) {
                $admin = admin::find($c->id);
               $admin->verified = 'true';
               $admin->active = 1;
               $admin->save();
               return response()->json($admin);
              }
           }
           else{
              $validator = Validator::make ( Input::all (), ['otp' => 'email'] );
               return Response::json ( ['error' => $validator->errors()->all()] );
           }


   }
   public function forgotpassword(Request $request){
           $otp = rand(100000, 999999);
           $count = 0;
           $where=['username'=>$request->username,'active'=>1];
           $count = admin::where($where)->count();
           if ($count>0) {
              $co = admin::where($where)->get();
              foreach ($co as $c) {
                $admin = admin::find($c->id);
                $admin->otp = $otp;
                $data =  array('username' => $admin->username,'name' => $admin->name,'otp' => $otp);
              Mail::to($admin->email)->send(new SendMailpassword($data));
               $admin->save();
               return response()->json('done');
              }
           }
           else{
              $validator = Validator::make ( Input::all (), ['otp' => 'email'] );
               return Response::json ( ['errors' => $validator->errors()->all()] );
           }
    }
   public function forgotpasswordchange(Request $request){
    $otp = rand(100000, 999999);
           $count = 0;
           $where=['username'=>$request->username,'otp'=>$request->otp,'active'=>1];
           $count = admin::where($where)->count();
           if ($count>0) {
              $co = admin::where($where)->get();
              foreach ($co as $c) {
                $admin = admin::find($c->id);
                $admin->password = Hash::make($request->new_password);
                $admin->otp = $otp;
               $admin->save();
               return response()->json('done');
              }
           }
           else{
    
               return Response::json ( ['errors' => 'wrong password'] );
           }
   }
}
