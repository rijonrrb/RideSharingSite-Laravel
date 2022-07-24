<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rider;
use App\Models\Ride;

class RiderController extends Controller
{


    public function riderCreateSubmit(Request $request){

        $validate = $request->validate([
              "fname"=>'required|max:20',
              "gender"=>"required",
              'dob'=>'required|date',
              "peraddress"=>"required",
              "preaddress"=>"required",
              'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
              'email'=>'required|email',
              'nid'=>'required|numeric|digits:10',
              'dlic'=>'required|numeric|digits:10',
              'username'=>'required|min:5',
              'password'=>'required|min:8|max:15|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{5,20}$/',
              
          ],
          ['fname.required'=>"The Full Name field is required.",
          'fname.max'=>"The Full Name field is access max 20 alphabet.",
          'peraddress.required'=>"The Permanent Address field is required.",
          'preaddress.required'=>"The Present Address field is required.",
          'password.regex'=>"Please use atleast 1 uppercase, 1 lowercase, 1 special charactee, 1 number",
          'phone.regex'=>"Please use number or valid phone format",
          'nid.digits'=>"Please input your accurate 10 digit NID number",
          'dlic.digits'=>"Please input your accurate 10 digit Driving license number",
          'nid.required'=>"The NID NO. field is required.",
          'dlic.required'=>"The DRIVING LICENSE field is required."]
      );
      $status = "pending";
      $balance = 0;
      $rpoint = 0;
      $pass=$request->password;
      $cpass=$request->cpassword;

      if ($cpass == $pass)  
      {
  
      $userCheck = Rider::where('username',$request->username)->first();
      if($userCheck){
  
          return redirect()->back()->with('failed', 'Username already exist');
      }
      else{
        $image = $request->file('image')->getClientOriginalName();
        
        
        //$image = $request->image;
        //$nameImage = $image->getClientOriginalName();
  
        $rider = new Rider();
          $rider->name = $request->fname;
          $rider->gender = $request->gender;
          $rider->dob = $request->dob;
          $rider->peraddress = $request->peraddress;
          $rider->preaddress = $request->preaddress;
          $rider->phone = $request->digit.$request->phone;
          $rider->email = $request->email;
          $rider->nid = $request->nid;
          $rider->dlic = $request->dlic;
          $rider->status = $status;
          $rider->rpoint = $rpoint;
          $rider->balance = $balance;
          $rider->username = $request->username;
          $rider->password = md5($request->password);
          $rider->image = $image;
          $result = $rider->save();
          if($result){
              $folder = $request->file('image')->move(public_path('img').'/',$image);
              return redirect()->route('riderLogin');
          }
          else{
              return redirect()->back()->with('failed', 'Registration Failed');
          }
      }
  
      }
      else{
        return redirect()->back()->with('failed', 'Confirm Password doesnt match with password');
    }
    }


    public function riderLoginSubmit(Request $request){
        $validate = $request->validate([
            'username'=>'required|min:8|max:15',
            'password'=>'required|min:8|max:15|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{5,20}$/'
        ],
        ['password.regex'=>"Please use atleast 1 uppercase, 1 lowercase, 1 special charactee, 1 number"]
    );
    $loginCheck = Rider::where('username',$request->username)->where('password',md5($request->password))->first();

    if($loginCheck){
        if($loginCheck->status == "Approved")
        {
            $request->session()->put('id',$loginCheck->id);
            $request->session()->put('name',$loginCheck->name);
            $request->session()->put('gender',$loginCheck->gender);
            $request->session()->put('dob',$loginCheck->dob);
            $request->session()->put('phone',$loginCheck->phone);
            $request->session()->put('email',$loginCheck->email);
            $request->session()->put('peraddress',$loginCheck->peraddress);
            $request->session()->put('preaddress',$loginCheck->preaddress);
            $request->session()->put('nid',$loginCheck->nid);
            $request->session()->put('dlic',$loginCheck->dlic);
            $request->session()->put('username',$loginCheck->username);
            $request->session()->put('password',$loginCheck->password);
            $request->session()->put('image',$loginCheck->image);
            return  redirect()->route('riderDash');
        }
        else{
            return redirect()->back()->with('failed', 'Your Registered id is in observation, Please wait for Admins approval');
        }
    }
    else{
        return redirect()->back()->with('failed', 'Invalid username or password');
    }
    }

    public function logout(){
        session()->forget('id');
        session()->forget('name');
        session()->forget('gender');
        session()->forget('dob');
        session()->forget('phone');
        session()->forget('email');
        session()->forget('peraddress');
        session()->forget('preaddress');
        session()->forget('nid');
        session()->forget('dlic');
        session()->forget('username');
        session()->forget('password');
        session()->forget('image');
        return redirect()->route('riderLogin');
    }


    public function riderProfEdit(Request $request){
        $validate = $request->validate([
            "fname"=>'required|max:20',
            "gender"=>"required",
            'dob'=>'required|date',
            "peraddress"=>"required",
            "preaddress"=>"required",
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:14',
            'email'=>'required|email',
            'nid'=>'required|numeric|digits:10',
            'dlic'=>'required|numeric|digits:10',
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg'
            
        ],
        ['fname.required'=>"The Full Name field is required.",
        'fname.max'=>"The Full Name field is access max 20 alphabet.",
        'peraddress.required'=>"The Permanent Address field is required.",
        'preaddress.required'=>"The Present Address field is required.",
        'password.regex'=>"Please use atleast 1 uppercase, 1 lowercase, 1 special charactee, 1 number",
        'phone.regex'=>"Please use number or valid phone format",
        'phone.max'=>"The Phone Number must be 11 digits without country code.",
        'nid.digits'=>"Please input your accurate 10 digit NID number",
        'dlic.digits'=>"Please input your accurate 10 digit Driving license number",
        'nid.required'=>"The NID NO. field is required.",
        'dlic.required'=>"The DRIVING LICENSE field is required."]
     );
 if($request->hasfile('image')){
    $image = $request->file('image')->getClientOriginalName();
    $folder = $request->file('image')->move(public_path('img').'/',$image);
 }
 else{
     $nameImage = $request->session()->get('image');
 }
 
     $user = Rider::where('username',$request->session()->get('username'))->first();
     $user->name = $request->fname;
     $request->session()->put('name',$request->fname);
     $user->gender = $request->gender;
     $request->session()->put('gender',$request->gender);
     $user->dob = $request->dob;
     $request->session()->put('dob',$request->dob);
     $user->peraddress = $request->peraddress;
     $request->session()->put('peraddress',$request->peraddress);
     $user->preaddress = $request->preaddress;
     $request->session()->put('preaddress',$request->preaddress);
     $user->phone = $request->phone;
     $request->session()->put('phone',$request->phone);
     $user->email = $request->email;
     $request->session()->put('email',$request->email);
     $user->nid = $request->nid;
     $request->session()->put('nid',$request->nid);
     $user->dlic = $request->dlic;
     $request->session()->put('dlic',$request->dlic);
     $user->image = $image;
     $request->session()->put('image',$image);
 
     $result = $user->save();
     if($result){
 
        return redirect()->back()->with('success', 'Successfully Profile Updated');
    }
    else{
        return redirect()->back()->with('failed', 'Failure in Profile Updating');
     }
 
     }

    public function riderchangePass(Request $request){

        $validate = $request->validate([
            "password"=>'required|min:8|max:15|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{5,20}$/',
            'npassword'=>'required|min:8|max:15|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{5,20}$/',
            'cnpassword'=>'required|min:8|max:15|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{5,20}$/'
        ],
        ['password.regex'=>"Please use atleast 1 uppercase, 1 lowercase, 1 special character, 1 number",
        'npassword.regex'=>"Please use atleast 1 uppercase, 1 lowercase, 1 special character, 1 number",
        'cnpassword.regex'=>"Please use atleast 1 uppercase, 1 lowercase, 1 special character, 1 number",
        'npassword.required'=>"The new password field is required.",
        'cnpassword.required'=>"The repeated new password field is required."
        ]
    );

    $pass=$request->npassword;
    $rpass=$request->cnpassword;

    if ($rpass == $pass)  
    {

    $user = Rider::where('username',$request->session()->get('username'))->where('password',md5($request->password))->first();

    if($user){

            $user->password = md5($request->npassword);
            session()->put('password',md5($request->npassword));
            $result = $user->save();
            if($result){
            return redirect()->back()->with('success', 'Password Successfully Updated');
            }
            else{
                return redirect()->back()->with('failed', 'Failure in Password Updating');
            }

    }
    else{
        return redirect()->back()->with('failed', 'Password Field Fill With Wrong User Password');
    }
    }
    else{
        return redirect()->back()->with('failed', 'Repeated New Password does not match with New Password');
    }
   }

   public function cashout(Request $request){
    $validate = $request->validate([
        'amount'=>'required|regex:/^\+?[1-9]\d*$/',  
        'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:14',
    ]
   );
   $rider = Rider::where('id',session()->get('id'))->first();
   if($request->amount >  $rider->balance){
    return redirect()->back()->with('failed', 'Doesnt have sufficient balance to cashout');
    }
    else{
   $rider->balance= $rider->balance - $request->amount;
   $result = $rider->save();
   if($result){
    return redirect()->back()->with('success', 'Transaction request is accepted. Please wait for 24 hours.');
     }
    }
   }
}
