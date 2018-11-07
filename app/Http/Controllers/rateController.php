<?php

namespace App\Http\Controllers;

use App\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class rateController extends Controller
{
    //

    public function getRate($productID)
    {
        $rates= Rate::where('product_id' ,'=',$productID)->get();

        if($rates->count() == 0)
        {
            $totalRate = 0;
            $averageRate =0;
            $count=0;
        }
        else{
            $totalRate=0;
            $count = $rates->count();

            foreach ($rates as $rate)
            {
                $totalRate += $rate->rate;
            }

            $averageRate=round($totalRate/$count);

        }

        return compact('count','averageRate','totalRate');

    }




    public function setRate(Request $request , $productID)
    {

        if( Rate::where('user_id','=',Auth::id())->where('product_id' ,'=',$productID)->get()->count() > 0 )
        {

            return redirect('productpage')->with('status','Your Rated This Product Before');

        }
        else{

            $rate= new Rate ;

            $rate->user_id = Auth::id();
            $rate->product_id= $productID;
            $rate->rate = $request->rate;
            $rate->save();

            return redirect('productpage')->with('status','Product Rated Successfully');

        }


    }


}
