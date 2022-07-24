<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Rider;
use App\Models\Ride;
use App\Models\Customer;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChatController extends Controller
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
     * @param  \App\Http\Requests\StoreChatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChatRequest  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
    public function chatUser(Request $request){

        $ride = Ride::where('id', $request->id)->first();
        $rider = Rider::where('id',$ride->riderId)->first();

        $cus = Customer::where('id',session()->get('id'))->first();

        $chats = Chat::where('customerId',$cus->id)->where('riderId',$ride->riderId)->get();


        return view('chat.chat')->with('rider',$rider)->with('cus',$cus)->with('chats',$chats);

    }

    public function userChatSend(Request $request){
        $rs = "Approve";
        $ridez = Ride::where('customerId',session()->get('id'))->where('customerStatus',$rs)->where('riderStatus',$rs)->first();

            if(!empty($request->msg))
            {
            date_default_timezone_set('Asia/Dhaka');
            $time =  date('d F Y, h:i:s A');
            $cusID = $ridez->customerId;
            $riderId = $ridez->riderId;
            $cus = Customer::where('id',$cusID)->first();
            $rider = Rider::where('id',$riderId)->first();
            $chats = Chat::where('riderId',$riderId)->where('customerId',$cusID)->get();
            $chatss = new Chat();
            $chatss->customerId = $cusID;
            $chatss->riderId = $riderId;
            $chatss->rmessage = null;
            $chatss->cmessage =  $request->msg;
            $chatss->time = $time;
            $result = $chatss->save();
            if($result){
            return redirect()->back()->with('rider', $rider)->with('cus', $cus)->with('chats', $chats);
            }
            }
            else{

                $cusID = $ridez->customerId;
                $riderId = $ridez->riderId;
                $cus = Customer::where('id',$cusID)->first();
                $rider = Rider::where('id',$riderId)->first();
                $chats = Chat::where('riderId',$riderId)->where('customerId',$cusID)->get();
                return redirect()->back()->with('rider', $rider)->with('cus', $cus)->with('chats', $chats);
            }


    }
}
