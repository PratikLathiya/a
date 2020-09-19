<?php

namespace App\Http\Controllers;

use App\VendorData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
//use Mail;
use Twilio\Rest\Client;
use App\Mail\UserSend;
use App\Mail\AdminSend;
use App\Mail\EmailOTPSend;
use App\Mail\UserRequest;

use Mail;
use DB;
use Log;
class VendorDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('first');
    }

    
   
    /**
     * Show the form for creating a new resource.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $email=$request->customer_email;
      // $email1="pratik-703c65@inbox.mailtrap.io";

      // $vendor->save();
      //     Mail::to($email)->send(new UserSend()); //mail send to user
      //     Mail::to($email1)->send(new AdminSend($vendor)); //mail send to Admin

        return redirect('ninth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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


    public function step1(Request $request)
    {
      
      $register = $request->session()->get('register');
        return view('third',compact('register'));
    }
    
    public function poststep1 (Request $request)
    {
      $validatedData = $request->validate([
        'brand_name' => 'required',
       ]);

      if(empty($request->session()->get('register'))){
            $register = new  VendorData();
            $register->brand_name = $request->brand_name;
            $request->session()->put('register', $register);
      }else{
          $register = $request->session()->get('register');
          $register->brand_name = $request->brand_name;
          $request->session()->put('register', $register);
      }
    return redirect()->route('vendor.step2');
    }






    public function step2(Request $request)
    {
        $register = $request->session()->get('register');       
        return view('fourth',compact('register'));
    }

    public function poststep2 (Request $request)
    {
      $validatedData = Validator::make($request->all(),[
        'customer_name' => 'required',
        'customer_email' => 'required|unique:vendor_data',
        'customer_number' => 'required',
      ]);

      if ($validatedData->fails()){
        return redirect()->back()->withErrors($validatedData->errors());
      }  
    
      if(empty($request->session()->get('register'))){
          $register = new  VendorData();
          $register->customer_name = $request->customer_name;
          $register->customer_email = $request->customer_email;
          $register->customer_number = $request->customer_number;
          $request->session()->put('register', $register);
      }else{
          $register = $request->session()->get('register');
          $register->customer_name = $request->customer_name;
          $register->customer_email = $request->customer_email;
          $register->customer_number = $request->customer_number;
          $request->session()->put('register', $register);
      }



      if(!$request->customer_email ==""){

        $emailOtp = mt_rand(10000, 99999);
        //$request->customer_email="pratiklathiya39@gmail.com";
        Mail::to($request->customer_email)->send(new EmailOTPSend($emailOtp,$request->customer_name)); //mail send to user
        Log::info('Here is your OTP '.$emailOtp);
        $register = $request->session()->get('register');
        $register->emailOtp = $emailOtp;
        $request->session()->put('Emailotp', $register);
        
      }

      if(!$request->customer_number ==""){

          $apiKey = urlencode('+s1AuUqM+RQ-nc1FodhjFURZMRqphI8XdgXAyGvbJL');
          $prefix ='+91';
          //$number = $prefix.''.array(9427793022);
          $numbers = $prefix.''.$request->customer_number;
          $sender = urlencode('TXTLCL');
    
          $otp = mt_rand(10000, 99999);
          $register = $request->session()->get('register');
          $register->MobileOtp = $otp;
          $request->session()->put('MobileOtp', $register);
          // dd($request->session()->get('register')->MobileOtp);
          $message = rawurlencode('This is your message OTP:'.$otp.'Testing');
          $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
          $ch = curl_init('https://api.textlocal.in/send/');
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($ch);
          curl_close($ch);
          $response = json_decode($response);
          return redirect()->route('vendor.step3')->withSuccess('Email OTP and Mobile OTP are sent successfully');
      }
    }
    public function step3(Request $request)
    {
          
      // $request->session()->forget('register');
        $register = $request->session()->get('register');   
        return view('fifth',compact('register'));
    }
    public function poststep3 (Request $request)
    {
        $validatedData = $request->validate([
          'email_otp' => 'required|unique:vendor_data',
          'mobile_otp' => 'required|unique:vendor_data',
         
        ]);
      //Email otp process after verification
      $register = $request->session()->get('register');   
        
      if($request->email_otp == $request->session()->get('register')->emailOtp){
        if(empty($request->session()->get('register'))){
            $register = new  VendorData();
            $register->email_otp = $request->email_otp;
            // $register->mobile_otp = $request->mobile_otp;
            $request->session()->put('register', $register);
        }else{
            $register = $request->session()->get('register');
            $register->email_otp = $request->email_otp;
            // $register->mobile_otp = $request->mobile_otp;
            $request->session()->put('register', $register);
        }
      }
      
      if($request->email_otp != $request->session()->get('register')->emailOtp){
        return redirect()->back()->with('error', 'Email Otp is invalid. Please Enter valid OTP');
      }
     

      //mobile otp process after verification

      if($request->mobile_otp == $request->session()->get('register')->MobileOtp){
          if(empty($request->session()->get('register'))){
            $register = new  VendorData();
            $register->mobile_otp = $request->mobile_otp;
            $request->session()->put('register', $register);
        }else{
            $register = $request->session()->get('register');
            $register->mobile_otp = $request->mobile_otp;
            $request->session()->put('register', $register);
          }
      } 
    
      if($request->mobile_otp != $request->session()->get('register')->MobileOtp){
        return redirect()->back()->with('error', 'Mobile Otp is invalid. Please Enter valid OTP');
      }
      
      return redirect()->route('vendor.step4');
    }

   
    public function step4(Request $request)
    {
    

        $register = $request->session()->get('register'); 
       
        return view('sixth',compact('register'));
    }
    public function poststep4 (Request $request)
    {
    
      $validatedData = $request->validate([
        'product_address' => 'required',
      ]);
        

      if(empty($request->session()->get('register'))){
          $register = new  VendorData();
          $register->product_address = $request->product_address;
          if(isset($request->instagram_url)){
            $register->instagram_url = $request->instagram_url;
          }
          if(isset($request->website_url)){
            $register->website_url = $request->website_url;
          }
          /** upload pics */
          if($images = $request->file('upload_pics')){
            
            foreach($images as $file){
              $name= time().'.'.$file->getClientOriginalName();
              $file->move(public_path().'/uploads',$name);
              $data[] = $name; 
            }
         $register->product_image = implode(',',$data) ;

         }
            /** end upload pics */
          $array =  implode(',',$request->cat);
          $register->product_category = $array ;
          $request->session()->put('register', $register);
      }else{
          $register = $request->session()->get('register');
          $register->product_address = $request->product_address;

          /**addtional fields */
          if(isset($request->instagram_url)){
            $register->instagram_url = $request->instagram_url;
          }
          if(isset($request->website_url)){
            $register->website_url = $request->website_url;
          }
          /** upload pics */
          if($images = $request->file('upload_pics')){
            
            foreach($images as $file){
              $name= time().'.'.$file->getClientOriginalName();
              $file->move(public_path().'/uploads',$name);
              $data[] = $name; 
            }
         $register->product_image = implode(',',$data) ;

         }
            /** end upload pics */
         /**end additional fields */
          $array =  implode(',',$request->cat);
          $register->product_category = $array ;
          $request->session()->put('register', $register);
      }
      // dd($register);
      return redirect()->route('vendor.step5');
    }



    public function step5(Request $request)
    {
        $register = $request->session()->get('register');       
        return view('seventh',compact('register'));
    }

    public function poststep5 (Request $request)
    {
      
      $validatedData = $request->validate([
        'pancard' => 'required',
        'shop_establishment_no' => 'required',
      ]);
      if(empty($request->session()->get('register'))){
          $register = new  VendorData();
          

          
          $register->pancard_number = $request->pancard;
      
          if($files = $request->file('gst_certi')){
            foreach($files as $file){
              $name= time().'.'.$file->getClientOriginalName();
              $file->move(public_path().'/uploads',$name);
              $data[] = $name; 
           
            }
         }
            $register->gst_registration = implode(',',$data) ;

            if($files = $request->file('adhaarcard_no')){
              foreach($files as $file){
                $name1= time().'.'.$file->getClientOriginalName();
                $file->move(public_path().'/uploads',$name1);
                $array_addhar[] = $name1; 
        
              }
             
           }
           $register->adhaar_card=  implode(',',$array_addhar);

          $register->shop_establishment_no = $request->shop_establishment_no;
          $request->session()->put('register', $register);

      }else{
          $register = $request->session()->get('register');

          $register->pancard_number = $request->pancard;
          if($files = $request->file('gst_certi')){
            foreach($files as $file){
              $name= time().'.'.$file->getClientOriginalName();
              $file->move(public_path().'/uploads',$name);
              $data[] = $name; 
      
            }
           
         }
          $register->gst_registration = implode(',',$data) ;
       
          if($files = $request->file('adhaarcard_no')){
            foreach($files as $file){
              $name1= time().'.'.$file->getClientOriginalName();
              $file->move(public_path().'/uploads',$name1);
              $array_addhar[] = $name1; 
      
            }
           
         }

            $register->adhaar_card=  implode(',',$array_addhar);
         
    
          $register->shop_establishment_no = $request->shop_establishment_no;
          $request->session()->put('register', $register);
      }
      unset($register['emailOtp']);
      unset($register['MobileOtp']);
      $register->save();
      $getdata = $request->session()->get('register');
     // $email= $getdata->customer_email;
     // $email1="4066b1d6f3f748dfa193@mailspons.com";
      //Mail::to($email)->send(new UserSend()); //mail send to user
     // Mail::to($email1)->send(new AdminSend($getdata)); //mail send to Admin
      return redirect()->route('vendor.step6');
    }



    public function step6(Request $request)
    {
      //$register = $request->session()->get('register');  
      $request->session()->forget('register');
        return view('ninth');
    }


}

