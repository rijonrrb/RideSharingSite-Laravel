<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Rider;
use App\Models\User;
use App\Models\Chat;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use PDF;
use App\Exports\CustomerExport;
use App\Exports\RideExport;
use App\Exports\RiderExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Ride;



class AdminController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }


    public function adminlogin()
    {
        return view('admin.login');
    }

    public function loginSubmit(Request $request){
            $validate = $request->validate([        
            'email'=>'required',
            'password'=>'required',

        ],
        //['name.required'=>"Please put you name here"]
       // ['username.required'=>"Please put you username here"]

    );
        $admin = Admin::where('email',$request->email)
                            ->where('password',md5($request->password))
                            ->first();

        // return $teacher;
        if($admin){
            $request->session()->put('id',$admin->id);
            $request->session()->put('user',$admin->name);
            $request->session()->put('email',$admin->email);
            $request->session()->put('dob',$admin->dob);
            $request->session()->put('phone',$admin->phone);
            $request->session()->put('password',md5($admin->password));
            $request->session()->put('cpassword',md5($admin->cpassword));
            $request->session()->put('picture',$admin->picture);
          
            
            return redirect()->route('admindashboard');
            //echo session()->get('id');
            //echo session()->get('user');
        }
        else{
        $request->session()->flash('invalid','Invalid username and password');
       return back();
   }
}

    public function logout(){
        session()->forget('user');
        session()->forget('email');
        session()->forget('dob');
        session()->forget('phone');

        return redirect()->route('adminlogin');
    }

       
    
    public function admindashboard(){
        return view('admin.adminDashboard');

       $customer = DB::table('customers')->count();
        $rider = DB::table('riders')->count();
        $riders=customer::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');

        return view('admin.adminDashboard',compact('customer','rider','riders'));

    }
    public function adminProfile(){
        return view('admin.adminProfile');
    }
    public function updateAdminProfile(){
        return view('admin.updateAdminProfile');
    }

            
    public function updateSubmitted(Request $request){
        $admin = Admin::where('email', $request->email)->first();
        // return  $student;
        $admin->email = $request->email;
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->dob = $request->dob;
        $admin->password = $request->password;
        $admin->cpassword = $request->cpassword;
        $admin->save();
        $request->session()->put('user',$admin->name);
        $request->session()->put('email',$admin->email);
        $request->session()->put('dob',$admin->dob);
        $request->session()->put('phone',$admin->phone);
        $request->session()->put('password',$admin->password);
        $request->session()->put('cpassword',$admin->cpassword);
        return redirect()->route('admindashboard');

    }
    public function changePicture(){
        return view('admin.changePicture');
    }
    public function changePictureSubmit(Request $request){
        $file_name = $request->file('picture')->getClientOriginalName();
        //$f_name = $file_name.'.'.$req->file('pro_pic')->getClientOriginalExtension();
        $folder = $request->file('picture')->move(public_path('img').'/',$file_name);
        
        $value = session()->get('id');
        $admin = Admin::where('id', $value)
        ->first();
        $admin->picture = $file_name;
        $admin->save();
        $request->session()->put('picture', $file_name);




        //$request->session()->flash('change_picture', 'Profile picture uploaded successfully');

        return redirect()->route('changePicture');

    }

    /////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    ////////////////ADD ADMIN///////////////////////////////////////////
    public function addAdmin(){
        return view('admin.addAdmin');
    }

    public function Adminadd(Request $request){
        $request->validate(
            [
                'email'=>'required|email',
                'name'=>'required|regex:/^[A-Z a-z .]+$/',
                'password'=>'required|min:6',
                'cpassword'=>'same:password',
                'phone'=>'required|min:8|max:14',
                'dob'=>'required|date',
                

            ],
            [

                'email.required'=>'Please provide your Email',
                'name.required'=>'Please provide your Name',
                'password.required'=>'Please provide your Password',
                'cpassword.same'=>'The Confirm Password and Password must match.',
                'phone.required'=>'Please provide your Phone Number',
               
                
                
            ]
        );
         $admin = Admin::where('email',$request->email)
                            ->first();



            if($admin){
                $request->session()->flash('reg', 'This account already exists');
                return redirect()->route('addAdmin');
            }
            else{
                    $admin = new  Admin();
                    $admin->email = $request->email;
                    $admin->name = $request->name;
                    $admin->phone = $request->phone;
                    $admin->dob = $request->dob;
                    $admin->password = $request->password;
                    $admin->cpassword = $request->cpassword;
                    $admin->picture = 'user.jpg';
                    $admin->save();
                    return redirect()->route('adminTable');
            }
    }


    public function addCustomer(){
        return view('admin.add.addCustomer');
    }
        public function customerAdd(Request $request){
         $customer = Customer::where('email',$request->email)
                            ->first();
         $validate = $request->validate([
            "name"=>"required",
            'dob'=>'required|date',
            'email'=>'required|email',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:11',
            'address'=>'required',
            'username'=>'required|min:5',
            'password'=>'required|min:8|max:15|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{5,20}$/',
           
            ],
                 ['password.regex'=>"Please use atleast 1 uppercase, 1 lowercase, 1 special charactee, 1 numbers"]
            );

            if($customer){
                $request->session()->flash('cus', 'This account already exists');
                return redirect()->route('addCustomer');
            }
            else{
                    $customer = new  Customer();
                    $customer->email = $request->email;
                    $customer->name = $request->name;
                    $customer->phone = $request->phone;
                    $customer->dob = $request->dob;
                    $customer->address = $request->address;
                    $customer->username= $request->username;
                    $customer->password = md5($request->password);
                    $customer->rating='0';
                    $customer->discount='0';

                    $customer->image = 'index.png';
                    

                    $customer->save();
                    return redirect()->route('customerTable');
            }
    }
    //////////////////////END////////////////////////////////////
    ///////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////

    /////////////////VIEW_Page////////////////////////////////////////

    //public function adminTable(){
        //return view('admin.view.adminTable');
   // }
    public function adminTable(){
        $admins = Admin::paginate(2);
        return view('admin.view.adminTable')->with('admins', $admins);
    }

    public function adminDelete(Request $request){
        $admin = Admin::where('id', $request->id)->first();
        $admin->delete();

    return redirect()->route('adminTable');
    }
    public function viewAdmin(Request $request){
        $admins = Admin::where('id', $request->id)->first();
        //return $admin;
        return view('admin.view.viewAdmin')->with('admins', $admins);
        
    
      }
    public function adminUpdate(Request $request){
       $admins = Admin::where('id', $request->id)->first();
       return view('admin.view.adminUpdate')->with('admins', $admins); 
    }
    public function adminUpdateSubmitted(Request $request){
        $admins = Admin::where('id', $request->id)->first();
        $admins->email = $request->email;
        $admins->name = $request->name;
        $admins->phone = $request->phone;
        $admins->dob = $request->dob;
        $admins->save();
       return view('admin.view.viewadmin')->with('admins', $admins); 
    }

    public function search_btna(Request $request){
        $admins = Admin::where('name',$request->search)->get();
        //return $admins;
        return view('admin.view.adminTable')->with('admins', $admins);
    }
    ////////////////////CustomerView////////////////////

    public function customerTable(){
        $customers = Customer::paginate(4);
        return view('admin.view.customerTable')->with('customers', $customers);
    }
    public function viewCustomer(Request $request){
        $customers = Customer::where('id', $request->id)->first();
        //return $admin;
        return view('admin.view.viewCustomer')->with('customers', $customers);
      }
    public function customerDelete(Request $request){
        $customer = Customer::where('id', $request->id)->first();
        $customer->delete();

    return redirect()->route('customerTable');
    }

    public function customerUpdate(Request $request){
        $customer = Customer::where('id', $request->id)->first();
        return view('admin.view.customerUpdate')->with('customer',$customer);
    }
    public function customerUpdateSubmitted(Request $request){
        $customer = Customer::where('id', $request->id)->first();
        $validate = $request->validate([
            "name"=>"required",
            'dob'=>'required|date',
            'email'=>'required|email',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:11',
            'address'=>'required',
            'username'=>'required|min:5',
           
            ],
 
            );
        $customer->email = $request->email;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->dob = $request->dob;
        $customer->address = $request->address;
        $customer->save();
       return view('admin.view.viewCustomer')->with('customers', $customer); 
    }

    public function searchc_btn(Request $request){
        $customers = Customer::where('name', 'LIKE', "%{$request->search}%")
        ->orWhere('id','LIKE', "%{$request->search}%")->get();
        //return $admins;
        return view('admin.view.customerTable')->with('customers', $customers);
    }
   //////////////////////EXPORT///////////////////////

    public function export(){
        return Excel::download(new CustomerExport, 'customer.xlsx');
    }

     public function rideexport(){
        return Excel::download(new RideExport, 'rideHistory.xlsx');
    }

 

    ////////////////////APPROVE///////////////
    public function riderStatus(){
        $riders = Rider::where('status','Pending')->get();
        return view('admin.status.riderStatus')->with('riders', $riders);
    }

    public function riderApproval(Request $request){
    $riders = Rider::where('id', $request->id)->first();
    //return $admin;
    return view('admin.status.riderApproval')->with('riders', $riders);
      }

    public function riderApproved(Request $request){
    $riders = Rider::where('id', $request->id)->first();
    $riders->status = "Approved";
    $riders->save();
    return redirect()->route('riderStatus')->with('riders', $riders); 
    }

    public function riderDenay(Request $request){
    $riders = Rider::where('id', $request->id)->first();
    $riders->delete();
    return redirect()->route('riderStatus')->with('riders', $riders);
    }



    //////////////////////////////RIDE/////////////////////

    public function rideComplete(){
        $rides = Ride::all();
        return view('admin.ride.rideComplete')->with('rides', $rides);
    }
    public function search_ride_btn(Request $request){
    $rides = Ride::where('riderApprovalTime','LIKE', "%{$request->search}%")
                    ->orWhere('customerStatus','LIKE', "%{$request->search}%")->get();
    //return $rides;
     return view('admin.ride.rideComplete')->with('rides', $rides);
    }


///Add rider///

    public function addRider(){
        return view('admin.add.addRider');
    }

    public function riderAdd(Request $request){
        $rider = Rider::where('email',$request->email)
      ->where('phone',$request->phone)
      ->first();

         $validate = $request->validate([

            "name"=>'required|max:20',
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
                 ['password.regex'=>"Please use atleast 1 uppercase, 1 lowercase, 1 special character, 1 numbers"]
            );


           if($rider){
               $request->session()->flash('rider', 'Already Exists or Added');
               return redirect()->route('addRider');
           }
           else{
            $rider = new Rider();
            $rider->name = $request->name;
            $rider->gender = $request->gender;
            $rider->dob = $request->dob;
            $rider->peraddress = $request->peraddress;
            $rider->preaddress = $request->preaddress;
            $rider->phone = $request->phone;
            $rider->email = $request->email;
            $rider->nid = $request->nid;
            $rider->dlic = $request->dlic;
            $rider->status = 'approved';
            $rider->rpoint = '0';
            $rider->balance = '0';
            $rider->username = $request->username;
            $rider->password = md5($request->password);
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('img/',$filename);
                $rider->image = $filename;
            }

            $action = $rider->save();

            if($action){
                return redirect()->route('riderList')->with('success', 'Rider added Successfully');
            }
            else{
                return redirect()->back()->with('failed', 'Failed to add Rider');
            }
           }
   }


         public function viewRecord(){
                $customer = DB::table('customers')->count();
                $rider = DB::table('riders')->count();
                $rides = Ride::where('customerStatus', 'Ride complete')
                                ->where('riderStatus','Ride complete')->sum('cost');
                 $riders=customer::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');

               return view('admin.adminDashboard',compact('customer','rider','rides','riders'));
          }


          public function riderList(Request $request){

            $search = $request['search'] ?? "";
            if ($search != ""){

                $riders = Rider::where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")->get();
            }
            else{
                $riders = Rider::all();
            }
           $data = compact('riders','search');
            return view('admin.view.riderList')->with('riders', $riders);
        }

        public function riderDelete(Request $request){

            $rider = DB::table("riders")->where("id",$request->id)->first();
           DB::table("rides")->where("riderid",$rider->id)->delete();
           $rider = DB::table("riders")->where("id",$request->id)->delete();


            return redirect()->route('riderList')->with('success', 'Rider Deleted Successfully');
        }
        

        
    public function updateRider(Request $request){
        $rider = Rider::where('id', $request->id)->first();
        
        return view('admin.update.updateRider')->with('rider', $rider);
        
    }
    public function updateRiderSubmitted(Request $request){
        $rider = Rider::where('id', $request->id)->first();
        $validate = $request->validate([

            "name"=>'required|max:20',
            'dob'=>'required|date',
            "peraddress"=>"required",
            "preaddress"=>"required",
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
            'email'=>'required|email',
            'dlic'=>'required|numeric|digits:10',
            'username'=>'required|min:5',
            
            ],
 
            );

        $rider->name = $request->name;
        $rider->dob = $request->dob;
        $rider->peraddress = $request->peraddress;
        $rider->preaddress = $request->preaddress;
        $rider->phone = $request->phone;
        $rider->email = $request->email;
        $rider->dlic = $request->dlic;
        $rider->username = $request->username;
       // return view('admin.view.riderList')->with('riders', $rider); 



        $action = $rider->save();

            if($action){
                return redirect()->route('riderList')->with('success', 'Rider updated Successfully');
            }
            else{
                return redirect()->back()->with('failed', 'Failed to update Rider');
            }

    }

   
    public function viewRider(Request $request){
        $rider = Rider::where('id', $request->id)->first();
        
        return view('admin.view.viewRider')->with('rider', $rider);
        
    }
    public function CPassword(){
       
        return view('admin.changePassword');
        
    }
    public function updatePassword(Request $request){
       $validate = $request->validate([
        'oldPassword' => 'required',
        'newPassword' => 'required',
        'password_confirmation'=> 'required',
       ]);

       $adminNewPass=$request->newPassword;
       $adminConPass=$request->password_confirmation;
    
    if ($adminNewPass == $adminConPass)  
    {

    $user = Admin::where('email',$request->session()->get('email'))->where('password',md5($request->oldPassword))->first();
    if($user){

            $user->password = md5($request->newPassword);
            session()->put('password',md5($request->newPassword));
            $result = $user->save();
            Auth::logout();
            if($result){
            return redirect()->route('adminlogin')->with('success', 'Password  is Updated Successfully');
            }
            else{
                return redirect()->back()->with('failed', 'Password Updating Failed');
            }     
    }
    else{
        return redirect()->back()->with('failed', 'Please enter valid User Password');
    }
    }
    else{
        return redirect()->back()->with('failed', 'Password Confirmation does not match');
    }

    }

    public function pieCharts(){
            
        return view('admin.charts.pieCharts');
    }


    public function pieChartInfo(){
  $result = DB::select(DB::raw(
  "
  SELECT name as name,
  SUM(balance) as balance 
  FROM riders 
  GROUP BY name
      
  "
));
  $riderData = "";
  foreach($result as $list){
    $riderData.="['".$list->name."',".$list->balance."],";
  }
  $arr['riderData'] = rtrim($riderData,",");


  $res = DB::select(DB::raw(
    "
    SELECT count(*) as total_address, address FROM customers GROUP BY address     
    "
  ));

  $cusData = "";
  foreach($res as $cus){
    $cusData.="['".$cus->address."',".$cus->total_address."],";
  }
  $arr['cusData'] = rtrim($cusData,",");

   return view('admin.charts.pieCharts',$arr);

  }

  public function barCharts(){
            
    return view('admin.charts.barCharts');
}
  public function barChartInfo(){
          
    $ress = DB::select(DB::raw(
        "
        SELECT count(*) as total_riderStatus, riderStatus FROM rides GROUP BY riderStatus     

        "
      ));
        $statusData = "";
        foreach($ress as $list){
          $statusData.="['".$list->riderStatus."',".$list->total_riderStatus."],";
        }
        $arr['statusData'] = rtrim($statusData,",");
       

    return view('admin.charts.barCharts');
}




public function exportpdf(){

    $data = Rider::all();
    view()->share('data',$data);
    $pdf = PDF::loadView('admin.view.riderListPdf');
    return $pdf->download('riders.pdf');

}


public function riderExport(){
    return Excel::download(new RiderExport, 'rider.xlsx');
}
   


public function customerRatings(){
    $customers = Customer::paginate(3);
    return view('admin.ratings.customerRatings')->with('customers', $customers);
}






}

 