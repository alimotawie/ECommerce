<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Rate;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $orders=Order::where('user_id' ,'=',Auth::id())->get();

        session()->put('cart', $orders);

        $products=Product::all();

        $rates= Rate::all();

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

            $averageRate=$totalRate/$count;

        }


        return view ('product/products' , compact('products','rates'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        if ( Auth::user()->role == 'admin') {
             return view ('product/addproduct');
        }
        else

        return "not allowed";

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


        $newProduct = new Product;

        $newProduct->name = $request->name;
        $newProduct->brand= $request->brand ;
        $newProduct->description = $request->description;
        $newProduct->price = $request->price;
        $newProduct->category = $request->category;
        $newProduct->stock = $request->stock;



        $logo = $request->file('logo');
        $logoFileName = time().$logo->getClientOriginalName();
        $logo->move('products/images',$logoFileName);
        $newProduct->logo =$logoFileName;

        $image1 = $request->file('image1');
        $image1FileName = time().$image1->getClientOriginalName();
        $image1->move('products/images',$image1FileName);
        $newProduct->image1 =$image1FileName;


        $image2 = $request->file('image2');
        $image2FileName = time().$image2->getClientOriginalName();
        $image2->move('products/images',$image2FileName);
        $newProduct->image2 =$image2FileName;


        $newProduct->save();

        return redirect()->back()->with("status","Product Added Successfully ");


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

        $product = Product::findorfail($id);

        $reviews = Review::where('product_id','=', $id)->get();

        $orders=Order::where('user_id' ,'=',Auth::id())->get();

        session()->put('cart', $orders);

        $RelatedProducts=Product::where('category','=', $product->category)->take(10)->get();

        return view('product.productdetails',compact('product','reviews','RelatedProducts'));
    }

    public function showbyCategory($category)
    {
        $products = Product::where('category','=', $category)->orWhere('name','LIKE', '%'.$category.'%')->get();


        return view('product.products',compact('products'));
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
        if (Auth::user()->role ==='admin')
        {
            $product = Product::findorfail($id);
            return view ('product/editproduct',compact('product'));

        }else
        {
            return 'Not Allowed';
        }
        
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

    if (Auth::user()->role ==='admin')
        {
        $updateProduct = Product::where('id','=',$id)->first();

        $updateProduct->name = $request->name;
        $updateProduct->brand= $request->brand ;
        $updateProduct->description = $request->description;
        $updateProduct->price = $request->price;
        $updateProduct->category = $request->category;
        $updateProduct->stock = $request->stock;


        if( $request->file('logo') )
        {

                $oldimage = $updateProduct->logo;
                $filename = public_path().'/products/images/'.$oldimage;
                File::delete($filename);
                $logo = $request->file('logo');
                $logoFileName = time().$logo->getClientOriginalName();
                $logo->move('products/images',$logoFileName);
                $updateProduct->logo =$logoFileName;

        }

        if( $request->file('image1') )
        {
            $oldimage = $updateProduct->image1;
            $filename = public_path().'/products/images/'.$oldimage;
            File::delete($filename);

            $image1 = $request->file('image1');
            $image1FileName = time().$image1->getClientOriginalName();
            $image1->move('products/images',$image1FileName);
            $updateProduct->image1 =$image1FileName;
        }


        if($request->file('image2'))
        {
            $oldimage = $updateProduct->image2;
            $filename = public_path().'/products/images/'.$oldimage;
            File::delete($filename);

            $image2 = $request->file('image2');
            $image2FileName = time().$image2->getClientOriginalName();
            $image2->move('products/images',$image2FileName);
            $updateProduct->image2 =$image2FileName;
        }


        $updateProduct->save();

        return redirect()->back()->with("status","Product Updated Successfully ");
    }else
    {
            return 'Not Allowed';
    }

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
        if (Auth::user()->role ==='admin')
        {
        Product::destroy($id);

        return redirect()->back()->with('status',"item deleted");
        }else
        {
             return 'Not Allowed';

        }

       
    }


    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $products = Product::where('name' , 'like' ,'%'. $keyword .'%')->orwhere('description' , 'like' ,'%'. $keyword .'%')->get();



        if($products->count()==0)
        {
            return view("product/products")->with('failMsg' ,'No results Found');
        }else{

            return view("product/products", compact('products'));
        }

    }

    public function navCategory($searchword)
    {
        $keyword = $searchword;

        $products = Product::where('name' , 'like' ,'%'. $keyword .'%')->orwhere('description' , 'like' ,'%'. $keyword .'%')->get();



        if($products->count()==0)
        {
            return view("product/products")->with('failMsg' ,'No results Found');
        }else{

            return view("product/products", compact('products'));
        }

    }

}
