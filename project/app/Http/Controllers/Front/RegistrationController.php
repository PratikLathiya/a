<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;
use App\registration;
use App\Mail\UserSend;
use App\Mail\EmailOTPSend;
use Mail;
use DB;
use Log;


class RegistrationController extends Controller
{
	// public function index()
	// {
	// 	return 0;
	// 	//return view('registration/step');
	// }

	public function index()
    {
		return 0;
       // return view('registration/step');
    }

	public function step1(Request $request)
	{
		$register = $request->session()->get('register');	
		return view('registration/step1',compact('register'));
	}
	
	public function poststep1(Request $request)
	{
		$validatedData = $request->validate([
		  'brand_name' => 'required',
		 ]);
  
		if(empty($request->session()->get('register'))){
			  $register = new  registration();
			  $register->brand_name = $request->brand_name;
			  $request->session()->put('register', $register);
		}else{
			$register = $request->session()->get('register');
			$register->brand_name = $request->brand_name;
			$request->session()->put('register', $register);
		}
	  return redirect()->route('registration.step2');
	}

	public function step2(Request $request)
    {
		$register = $request->session()->get('register');
        return view('registration/step2',compact('register'));
    }
	public function poststep2(Request $request)
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
			  $register = new  registration();
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
			Mail::to($request->customer_email)->send(new EmailOTPSend($emailOtp,$request->customer_name)); //mail send to user
			Log::info('Here is your OTP '.$emailOtp);
			$register = $request->session()->get('register');
			$register->emailOtp = $emailOtp;
			$request->session()->put('Emailotp', $register);
			
		  }
	
		  if(!$request->customer_number ==""){
	
	   
			  $apiKey = urlencode('+s1AuUqM+RQ-cJlGNucK22gcYsxLfxMvTf7pSyRDCC');
			  $prefix ='+91';
			  $numbers = $prefix.''.$request->customer_number;
			  $sender = urlencode('TXTLCL');
	
			  $otp = mt_rand(10000, 99999);
			  $register = $request->session()->get('register');
			  $register->MobileOtp = $otp;
			  $request->session()->put('MobileOtp', $register);
			  // dd($request->session()->get('register')->MobileOtp);
			  $message = rawurlencode('This is your message OTP:'.$otp.' -All Earthy');
			  $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
			  $ch = curl_init('https://api.textlocal.in/send/');
			  curl_setopt($ch, CURLOPT_POST, true);
			  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			  $response = curl_exec($ch);
			  curl_close($ch);
			  $response = json_decode($response);
			
	
			  if($response->status == "failure"){
				if($response->errors[0]->code == "192"){
				  return redirect()->back()->withErrors(['message' => 'Messages can only be sent between 9am to 9pm as restricted by TRAI NCCP regulation']);
					// return redirect()->route('vendor.step3')->withSuccess('Your OTP is send successfully');
	
				}else if($response->errors[0]->code == "4"){
					return redirect()->back()->withErrors(['message' => 'No recipients specified. Please Provide Valid Number']);
	
				}
				return redirect()->back()->withErrors(['failure' => 'Mobile number is invalid']);
			  }else{
	
			
				return redirect()->route('registration.step3')->withSuccess('Email OTP and Mobile OTP are sent successfully');
			  }
			}
	}

	public function step3(Request $request)
    {
		$register = $request->session()->get('register');
        return view('registration/step3',compact('register'));
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
			  $register = new  registration();
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
		
		return redirect()->route('registration.step4');
	}

	public function step4(Request $request)
    {
		$register = $request->session()->get('register');
    	return view('registration/step4',compact('register'));
	}
	public function poststep4 (Request $request)
    {
		$validatedData = $request->validate([
			'product_address' => 'required',
		  ]);
			
	
		  if(empty($request->session()->get('register'))){
			  $register = new  registration();
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
		  return redirect()->route('registration.step5');
	}

	public function step5(Request $request)
    {
		$register = $request->session()->get('register');
        return view('registration/step5',compact('register'));
	}
	
	public function poststep5 (Request $request)
    {
		$validatedData = $request->validate([
			'pancard' => 'required',
			'shop_establishment_no' => 'required',
		  ]);
		  if(empty($request->session()->get('register'))){
			  $register = new  registration();
			  
	
			  
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
		  //$email= $getdata->customer_email;
		  //$email1="pratiklathiya39@gmail.com";
		 // Mail::to($email)->send(new UserSend()); //mail send to user
		 // Mail::to($email1)->send(new AdminSend($getdata)); //mail send to Admin
		  return redirect()->route('registration.step6');
	}
	public function step6(Request $request)
    {
      //$register = $request->session()->get('register');  
      $request->session()->forget('register');
        return view('registration/success');
	}
	





	
public function step_1(Request $request)
{
	$register = $request->session()->get('register');	
	return view('registration/step1',compact('register'));
}
public function Poststep_1(Request $request )
{
	$validatedData = $request->validate([
		'brand_name' => 'required',
	   ]);

	  if(empty($request->session()->get('register'))){
			$register = new  registration();
			$register->brand_name = $request->brand_name;
			$request->session()->put('register', $register);
	  }else{
		  $register = $request->session()->get('register');
		  $register->brand_name = $request->brand_name;
		  $request->session()->put('register', $register);
	  }
	return redirect()->route('registration.step_2');
}
public function step_2(Request $request)
{
	$register = $request->session()->get('register');
    return view('registration/step2',compact('register'));
}
public function Poststep_2(Request $request)
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
		  $register = new  registration();
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
	//return 0;

	// if(!$request->customer_email ==""){
		
		
	// 	$emailOtp = mt_rand(10000, 99999);
	// 	Mail::to($request->customer_email)->send(new EmailOTPSend($emailOtp,$request->customer_name)); //mail send to user
	// 	Log::info('Here is your OTP '.$emailOtp);
	// 	$register = $request->session()->get('register');
	// 	$register->emailOtp = $emailOtp;
	// 	$request->session()->put('Emailotp', $register);
		
	//   }
	$to_name="Pratik Lathiya";
	$to_email="pratiklathiya39@gmail.com";
	$data=array("name"=>"Pratik Lathiya","body"=>"Test Email");
	Mail::send('mail.EmailOTP',$data,function($message) use($to_name,$to_email){
	  $message->to($to_email,$to_name) 
	  ->subject('Lara mail subject');
	  $message->from('pratiklathiya39@gmail.com','Test Mail');
	});
	
	
	   
		$apiKey = urlencode('+s1AuUqM+RQ-cJlGNucK22gcYsxLfxMvTf7pSyRDCC');
		$prefix ='+91';
		//$numbers = $prefix.''.$request->customer_number;
		$numbers = $prefix.''.array(9427793022);
		$sender = urlencode('TXTLCL');

		$otp = mt_rand(10000, 99999);
		$register = $request->session()->get('register');
		$register->MobileOtp = $otp;
		$request->session()->put('MobileOtp', $register);
		// dd($request->session()->get('register')->MobileOtp);
		$message = rawurlencode('This is your message OTP:'.$otp.' Testing');
		$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
		$ch = curl_init('https://api.textlocal.in/send/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response);
	  

		if($response->status == "failure"){
		  if($response->errors[0]->code == "192"){
			return redirect()->back()->withErrors(['message' => 'Messages can only be sent between 9am to 9pm as restricted by TRAI NCCP regulation']);
			  // return redirect()->route('vendor.step3')->withSuccess('Your OTP is send successfully');

		  }else if($response->errors[0]->code == "4"){
			  return redirect()->back()->withErrors(['message' => 'No recipients specified. Please Provide Valid Number']);

		  }
		  return redirect()->back()->withErrors(['failure' => 'Mobile number is invalid']);
		}else{

	  
		  return redirect()->route('registration.step3')->withSuccess('Email OTP and Mobile OTP are sent successfully');
		}
	
}
public function step_3(Request $request)
{
	$register = $request->session()->get('register');
    return view('registration/step6',compact('register'));
}
public function Poststep_3(Request $request)
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
		  $register = new  registration();
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
	
	return redirect()->route('registration.step_4');
}
public function step_4(Request $request)
{
	$register = $request->session()->get('register');
	return view('registration/step4',compact('register'));
}
public function Poststep_4(Request $request)
{
	$validatedData = $request->validate([
		'product_address' => 'required',
	  ]);
		

	  if(empty($request->session()->get('register'))){
		  $register = new  registration();
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
	return redirect()->route('registration.step_5');
}
public function step_5(Request $request)
{
	$register = $request->session()->get('register');
    return view('registration/step8',compact('register'));
}
public function Poststep_5(Request $request)
{
	$validatedData = $request->validate([
		'pancard' => 'required',
		'shop_establishment_no' => 'required',
	  ]);
	  if(empty($request->session()->get('register'))){
		  $register = new  registration();
		  

		  
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
	
	return redirect()->route('registration.step_6');
}
public function step_6(Request $request)
    {
		$request->session()->forget('register');
        return view('registration/success');
	}

}
