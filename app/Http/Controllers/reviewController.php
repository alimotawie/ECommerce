<?php

namespace App\Http\Controllers;

use App\Rate;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class reviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getReviews($productID)
    {
        $reviews= Review::where('product_id' ,'=',$productID)->get();

        if($reviews->count() == 0)
        {
            return "no reviews found";
        }
        else {

            return view('productpage', compact('reviews'));
        }

    }




    public function setReview(Request $request , $productID)
    {


        $review= new Review ;

        $review->user_id = Auth::id();
        $review->product_id= $productID;
        $review->review = $request->review;
        $review->save();


        if( Rate::where('user_id','=',Auth::id())->where('product_id' ,'=',$productID)->get()->count() <= 0 )
        {

            $rate= new Rate ;
            $rate->user_id = Auth::id();
            $rate->product_id= $productID;
            $rate->rate = $request->rate;
            $rate->save();

        }

        return redirect()->back()->with('status','Review Added Successfully');


        }


    public function deleteRate($productID)
    {


        Review::destroy($productID) ;

        return redirect()->back()->with('status','Review deleted Successfully');

    }

}
