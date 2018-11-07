<?php

namespace App\Http\Controllers;

use App\Slider;
use File;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class sliderController extends Controller
{
    //
    public function create()
    {
        if ( Auth::user()->role == 'admin') {
            return view ('addSlider');
        }

    }


//    public function store(Request $request)
//    {
//
//        if (Auth::user()->role ==='admin') {
//
//
//            $newSilder = new Slider;
//
//            if( $request->file('image1') )
//            {
//                $image1 = $request->file('image1');
//                $image1FileName = time() . $image1->getClientOriginalName();
//                $image1->move('images/slider', $image1FileName);
//                $newSilder->image1 = $image1FileName;
//            }
//
//            if( $request->file('image2') )
//            {
//                $image2 = $request->file('image2');
//                $image2FileName = time() . $image2->getClientOriginalName();
//                $image2->move('images/slider', $image2FileName);
//                $newSilder->image2 = $image2FileName;
//            }
//
//            if( $request->file('image3') )
//            {
//                $image3 = $request->file('image3');
//                $image3FileName = time() . $image3->getClientOriginalName();
//                $image3->move('images/slider', $image3FileName);
//                $newSilder->image3 = $image3FileName;
//            }
//
//            if( $request->file('image3') )
//            {
//                $image4 = $request->file('image4');
//                $image4FileName = time() . $image4->getClientOriginalName();
//                $image4->move('images/slider', $image4FileName);
//                $newSilder->image4 = $image4FileName;
//            }
//
//
//            $newSilder->save();
//
//            return redirect()->back()->with("status","Slider Updated Successfully ");
//        }
//    }

    public function update(Request $request)
    {

        if (Auth::user()->role === 'admin') {

            $updateSlider = Slider::all()->first();

            if ($request->file('image1')) {

                $oldimage = $updateSlider->image1;

                $filename = public_path() . '/images/slider/' . $oldimage;
                File::delete($filename);

                $image1 = $request->file('image1');
                $image1FileName = time() . $image1->getClientOriginalName();
                $image1->move('images/slider', $image1FileName);
                $updateSlider->image1 = $image1FileName;
            }

            if ($request->file('image2')) {

                $oldimage = $updateSlider->image2;

                $filename = public_path() . '/images/slider/' . $oldimage;
                File::delete($filename);

                $image2 = $request->file('image2');
                $image2FileName = time() . $image2->getClientOriginalName();
                $image2->move('images/slider', $image2FileName);
                $updateSlider->image2 = $image2FileName;
            }

            if ($request->file('image3')) {

                $oldimage = $updateSlider->image3;

                $filename = public_path() . '/images/slider/' . $oldimage;
                File::delete($filename);

                $image3 = $request->file('image3');
                $image3FileName = time() . $image3->getClientOriginalName();
                $image3->move('images/slider', $image3FileName);
                $updateSlider->image3 = $image3FileName;
            }

            if ($request->file('image4')) {

                $oldimage = $updateSlider->image4;

                $filename = public_path() . '/images/slider/' . $oldimage;
                File::delete($filename);

                $image4 = $request->file('image4');
                $image4FileName = time() . $image4->getClientOriginalName();
                $image4->move('images/slider', $image4FileName);
                $updateSlider->image4 = $image4FileName;
            }


            $updateSlider->save();

            return redirect()->back()->with("status", "slider Updated Successfully");
        }
    }

}

