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

use App\Rate;
use App\Slider;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

Route::get('/', function () {

	if(Auth::check())
	{
    $orders=Order::where('user_id' ,'=',Auth::id())->get();

    session()->put('cart', $orders);
    	}

    $latestProducts=Product::orderby('created_at')->take(10)->get();
    $recommendedProducts=Product::inRandomOrder()->limit(50)->take(10)->get();


    $mostSoldproducts=Order::groupBy('product_id')->select('product_id', DB::raw('count(*) as total'))->orderby('total' , 'desc')->take(10)->get()->all();

    $highestRatetd=Rate::groupBy('product_id')->select('product_id', DB::raw('sum(rate) as Rsum'))->orderby('Rsum' , 'desc')->take(10)->get()->all();

    $slider=Slider::all()->first();


    return view('index-shop', compact('latestProducts' , 'slider','highestRatetd','recommendedProducts','mostSoldproducts'));

})->name('home');



Auth::routes();


Route::get('/contact' , function(){

    return view('contact');
    
})->name('contact');


Route::get('/about' , function(){

    return view('about');

})->name('about');

Route::resource('/profile' , 'profileController');


/*
 slider
 */
Route::get('/slider/create' , 'sliderController@create')->name('editSlider');
Route::post('/slider/store' , 'sliderController@update');
/*slider end
 */

/*
 * product
 */
Route::resource('/product' , 'productController');

Route::get('/product/{id}' , 'productController@show')->name('singleProduct');

Route::resource('/order' , 'orderController');

Route::get('/order/{productId}/{quantity}' , 'orderController@storeMultiple');

Route::get('/product/create' , 'productController@create');


Route::get('/product/delete/{id}' , 'productController@destroy');

Route::get('/pendingConfirm' , 'orderController@pendingOrder')->name('pendingOrder');

Route::post('/adminConfirm' , 'orderController@confirmOrder')->name('confirmOrder');

Route::post('/adminDelete' , 'orderController@deleteOrder')->name('deleteOrder');

/* search filters */

Route::get('product/concentration/{concentration}' ,'productController@showbyconcentration')->name('filterConcentration');

Route::get('product/nicotine/{nicotine}' , 'productController@showbynicotine')->name('filterNicotine');

Route::get('product/brand/{brand}' , 'productController@showbybrand')->name('filterBrand');

Route::get('product/flavor/{flavor}' , 'productController@showbyflavor')->name('filterFlavor');

Route::post('product/find/' , 'productController@search')->name('findItem');

/* end search filters */

Route::get('offers' , 'productController@offers')->name('offers');


/* rates and reviews */

Route::post('/rate/{productID}' , 'rateController@setRate');

Route::get('/getrate/{productID}' , 'rateController@getRate');


Route::post('/review/{productID}' , 'reviewController@setReview')->name('addReview');

Route::get('/getreview/{productID}' , 'reviewController@getReview');

/* end rates and reviews */

/* notifications */

Route::get('clear/{id?}','orderController@Clear')->name('notifyClear');
Route::post('peersrequest/notifi','cashcollection@notification')->name('notify');

/* end notifications */








