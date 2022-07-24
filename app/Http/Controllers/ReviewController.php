<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Ride;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReviewController extends Controller
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
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }

    public function ReviewPost(Request $request){
        $reviewCount = Review::where('ride_id', $request->rideid)->first();
        if($reviewCount){
            return redirect()->route('rideList')->with('failed', 'You have already five review for Ride_' . $request->rideid);
        }
        else{



        $ride = Ride::where('id', $request->rideid)->first();
        $riderId = $ride->riderId;
        $customerId = $ride->customerId;

        $review = new Review();
        $review->From = 'Customer_' . $customerId;
        $review->To = 'Rider_' . $riderId;
        $review->ride_id =  $request->rideid;
        $review->message = $request->msg;
        $res = $review->save();
        if($res){
            return redirect()->route('rideList')->with('success', 'Review for Ride_' . $request->rideid . ' successfully');
        }
    }
    }
}
