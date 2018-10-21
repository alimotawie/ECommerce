<?php

namespace App\Http\Controllers;

use App\Order;
use App\Rate;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userData=Auth::user();
        $reviews = Review::where('user_id','=',Auth::id())->get();
        $rates = Rate::where('user_id','=',Auth::id())->get();
        return view('userprofile/profilePage',compact('userData','reviews','rates'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $reviews= Review::where('user_id' ,'=',$id)->get();

        $userData = User::findorfail($id);

        $purchasedItems = Order::where(['user_id' => $id, 'status'=> 'confirmed'])->get();

        return view('userprofile.profilePage',compact('userData', 'reviews', 'purchasedItems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userData=Auth::user();
        return view ('userprofile/editProfile' , compact('userData'));
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
        $userdata = User::findorfail($id);

        if($request->password){

            $request->validate([
                'name' => 'required|string|max:255',
                'mobile'=>'required|string|min:11',
                'address'=>'required|string',
                'password'=>'required|string|min:6|confirmed'
            ]);

            $userdata->name = $request->name;
            $userdata->address = $request->address;
            $userdata->mobile = $request->mobile;
            $userdata->password = Hash::make($request->password);

            $userdata->save();

        }else {

            $this->validate($request, [
                'name' => 'required|string|max:255',
                'mobile'=>'required|string|min:11',
                'address'=>'required|string',
            ]);

            $userdata->name = $request->name;
            $userdata->address = $request->address;
            $userdata->mobile = $request->mobile;

            $userdata->save();

        }

        return redirect()->route('profile.edit',['id'=>Auth::id()])->with('status', 'Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Auth::logout();

        User::destroy($id);

        return redirect()->route('home');
    }
}
