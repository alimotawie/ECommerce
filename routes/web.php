<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Order;
use App\Product;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;


Route::get('/', function () {

	if(Auth::check())
	{
    $orders=Order::where('user_id' ,'=',Auth::id())->get();

    session()->put('cart', $orders);
    	}
    	
     $latestProducts=Product::orderby('created_at')->take(10)->get();

    return view('index-shop', compact('latestProducts'));

})->name('home');



Auth::routes();


Route::get('/contact' , function(){

    return view('contact');
    
})->name('contact');


Route::get('/about' , function(){

    return view('about');

})->name('about');

Route::resource('/profile' , 'profileController');


Route::resource('/product' , 'productController');

Route::resource('/order' , 'orderController');

Route::get('/order/{productId}/{quantity}' , 'orderController@storeMultiple');

Route::get('/product/create' , 'productController@create');

Route::get('/product/delete/{id}' , 'productController@destroy');

Route::get('/pendingConfirm' , 'orderController@pendingOrder')->name('pendingOrder');

Route::post('/adminConfirm' , 'orderController@confirmOrder')->name('confirmOrder');

Route::get('product/category/{category}' , 'productController@showbyCategory')->name('filterCategory');

Route::post('product/find/' , 'productController@search')->name('findItem');


Route::get('offers' , 'productController@offers')->name('offers');



Route::post('/rate/{productID}' , 'rateController@setRate');

Route::get('/getrate/{productID}' , 'rateController@getRate');


Route::post('/review/{productID}' , 'reviewController@setReview')->name('addReview');

Route::get('/getreview/{productID}' , 'reviewController@getReview');


Route::get('clear/{id?}','orderController@Clear')->name('notifyClear');
Route::post('peersrequest/notifi','cashcollection@notification')->name('notify');








