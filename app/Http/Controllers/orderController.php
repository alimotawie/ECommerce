<?php

namespace App\Http\Controllers;

use App\Notifications\OrderConfirm;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;


class orderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $orders=Order::where('user_id','=',Auth::id())->get();


        return view ('product.cart', compact('orders'));

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
     * @return \Illuminate\Http\Response
     */
    public function storeMultiple($productId, $quantity)
    {
        $newOrder = new Order;

        $newOrder->user_id = Auth::id();
        $newOrder->product_id = $productId;
        $newOrder->quantity = $quantity;
        $newOrder->status = 'free';
        $newOrder->save();

        $orders=Order::where('user_id' ,'=',Auth::id())->get();

        session()->put('cart', $orders);

        return redirect()->back()->with('status','Order add to cart');
    }


    public function store(Request $request)
    {
        $newOrder = new Order;

        $newOrder->user_id = Auth::id();
        $newOrder->product_id = $request->product_id;
        $newOrder->quantity = $request->quantity;
        $newOrder->status = 'free';
        $newOrder->save();

        $orders=Order::where('user_id' ,'=',Auth::id())->get();

        session()->put('cart', $orders);

        return redirect()->back()->with('status','Order add to cart');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {

        Order::destroy($id);

        $orders=Order::where('user_id' ,'=',Auth::id())->get();

        session()->put('cart', $orders);

        return redirect()->back()->with('status','Order deleted');

    }

    public function PendingOrder()
    {

        if(Auth::user()->role == 'admin')
        {
            $orders=Order::where('status','=','pending')->get();

        }else{

        $orders=Order::where('user_id','=',Auth::id())->get();

        foreach ($orders as $order)
        {
            if($order->status != 'confirmed') {
                $order->status = 'pending';
                $order->save();
            }
        }

        }

        return view('product.orderconfirm',compact('orders'));

    }


    public  function confirmOrder(Request $request)
    {
        $confirm = Order::find($request->order_id);

        $product = Product::find($confirm->product_id);

        if ($product->stock <= 0) {
            return redirect()->back()->with('error', ' No Enough Stock !');

        } else {

            $confirm->status = 'confirmed';
            $confirm->save();

            $product->stock = ($product->stock) - ($confirm->quantity);
            $product->save();
            $order_ID = $request->order_id;

            User::find($request->user_id)->notify(new OrderConfirm($order_ID));

            return redirect()->back()->with('status', 'Order Confirmed , Stock updated');
        }
    }

        public  function deleteOrder(Request $request)
    {

        Order::destroy($request->order_id);

            return redirect()->back()->with('status','Order Delete');
        }



    Public function Clear($id=null)
    {
        if($id) {
            Auth::user()->notifications()->where('id', $id)->first()->delete();
        }
        else
            Auth::user()->notifications()->delete();

        return redirect()->back();
    }

}
