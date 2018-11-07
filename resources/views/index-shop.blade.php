@extends('layouts.header-footer')

	<!-- Document Title
    ============================================= -->

@section('title','Vapery | The Liquids Home')

@section('content')

	<!-- page slider
		============================================= -->

	<section id="slider" class="slider clearfix topmargin-sm ">
		<div class="camera_wrap" id="camera_wrap_1">

			<div data-src={{ URL::asset("images/slider/$slider->image1")}}>
				<div class="camera_caption fadeFromBottom flex-caption slider-caption-bg" style="left: 0; border-radius: 0; max-width: none;">
					<div class="container"> <a class="btn-lg btn-info"> Check Products </a></div>
				</div>
			</div>
			<div data-src={{ URL::asset("images/slider/$slider->image2")}}>
				<div class="camera_caption fadeFromBottom flex-caption slider-caption-bg" style="left: 0; border-radius: 0; max-width: none;">
					<div class="container"><a class="btn-lg btn-info"> Check Products </a></div>
				</div>
			</div>
			<div data-src={{ URL::asset("images/slider/$slider->image3")}}>
				<div class="camera_caption fadeFromBottom flex-caption slider-caption-bg" style="left: 0; border-radius: 0; max-width: none;">
					<div class="container">Included 20+ custom designed Slider Pages with Premium Sliders like Layer, Revolution, Swiper &amp; others.</div>
				</div>
			</div>
			<div  data-src={{ URL::asset("images/slider/$slider->image4")}}>
				<div class="camera_caption fadeFromBottom flex-caption slider-caption-bg" style="left: 0; border-radius: 0; max-width: none;">
					<div class="container">You have easy control on each &amp; every element that provides endless customization possibilities.</div>
				</div>
			</div>
		</div>

	</section>
	<!-- end of slider-->


	<div class="container clearfix topmargin-lg">

		<div class="col_one_third bottommargin-lg">
			<div class="feature-box center media-box fbox-bg">
				<div class="fbox-media">
					<img src="images/liquid.png" alt="Image" style="height: 223px;">
				</div>
				<div class="fbox-desc">
					<h3>70/30</h3>
					<p><a href="{{route('filterConcentration',"70")}}" class="btn btn-default">Shop Now</a></p>
				</div>
			</div>
		</div>

		<div class="col_one_third bottommargin-lg">
			<div class="feature-box center media-box fbox-bg">
				<div class="fbox-media">
					<img src="images/liquid.png" alt="Image" style="height: 223px;">
				</div>
				<div class="fbox-desc">
					<h3>50/50</h3>
					<p><a href="{{route('filterConcentration','50')}}" class="btn btn-default">Shop Now</a></p>
				</div>
			</div>
		</div>

		<div class="col_one_third bottommargin-lg col_last">
			<div class="feature-box center media-box fbox-bg">
				<div class="fbox-media">
					<img src="images/offer.png" alt="Image" style="height: 223px;">
				</div>
				<div class="fbox-desc">
					<h3>Special Offers </h3>
					<p><a href="#" class="btn btn-default">Shop Now</a></p>
				</div>
			</div>
		</div>
	</div>

	<section id="content ">

		<div class="container clearfix ">

			<div class="row clearfix ">

				<div class="promo parallax promo-full " style="background-image: url({{ URL::asset('images/banner2.jpg')}});" data-stellar-background-ratio="0.4">
					<div class="container clearfix">
						<h3>Get what you need at the <span>Best Market PRICE</span> <br> Delivered to your  <span>DOOR STEPS</span></h3>
						<h4>Your one stop for the BEST E-Liquids in town</h4>
					</div>
				</div>
			</div>
		</div>
	</section>


		<div class="fancy-title title-dotted-border title-center topmargin-sm">
						<h2>Recent <span>Added</span> Items</h2>
					</div>
		<section id="content">


        <div class="content-wrap notopmargin">

            <div class="container clearfix">

                <!-- Post Content
                ============================================= -->
                
                    <!-- recent added
                    ============================================= -->
					<div id="oc-products" class="owl-carousel products-carousel carousel-widget notopmargin" data-margin="20" data-nav="true" data-pagi="false" data-items-xxs="1" data-items-xs="2" data-items-sm="3" data-items-md="4">

						@foreach($latestProducts as $product)
						<div class="oc-item">

                        <div class="product sf-{{$product->category}}  clearfix">
                            <div class="product-image">
                                <a> <img src="{{ URL::asset('products/images/'.$product->image1)}}" alt="item image 1" style="height: 223px;"></a>
                                <a><img  src="{{ URL::asset('products/images/'.$product->image2)}}" alt="item image 2 " style="height: 223px;"> </a>
                            @if(Auth::check())
                            <div class='center'>
                                <div class="product-overlay">
                              @if(Auth::user()->role !='admin')
										@if($product->stock > 0)

										<a href="/order/{{ $product->id  }}/1" class="add-to-cart input-block-level" ><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>


											{{--{!! Form::submit('Add to cart' , ['class'=>'add-to-cart button nomargin']) !!}--}}
                                {!! Form::close() !!}
											@else
											<a class="add-to-cart input-block-level" ><i class="icon-shopping-cart"></i><span> Out of stock</span></a>

										@endif
                            @endif
                            </div>
                            </div>
                        	</div>
                            @else
                            </div>


                            @endif

                            <div class="product-desc center ">

                                <div class="product-title"><h3><a href="{{route('product.show', ['product' => $product->id])}}">{{$product->name}}</a></h3></div>
                                <div class="product-price">{{$product->price }} LE </div>

                                <div class="product-rate">

                                            <input id="input-15" class="rating" value="{{ ceil($product->rates()['averageRate'])}}" data-size="sm" data-glyphicon="false" data-rating-class="fontawesome-icon" data-readonly="true">
                                    ( Users : {{ $product->rates()['count']}})

                                </div>

                             </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>

    </section>

    <div class="clear"></div>

    <div class="col_one_third bottommargin-lg">

        <div class="fancy-title title-border">
            <h4>Highest Rated </h4>
        </div>

        <div>

            @for ($i = 0 ; $i < count($highestRatetd) ; $i++)

                <?php $singleProduct=App\Product::find($highestRatetd[$i]->product_id) ?>

                <div class="spost clearfix">
                    <div class="entry-image">
                        <a href="{{route('singleProduct',$singleProduct['id'])}}"><img src="{{ URL::asset('products/images/'.$singleProduct['image1'])}}" alt="Image" > </a>
                    </div>
                    <div class="entry-c">
                        <div class="entry-title">
                            <h4><a href="{{route('singleProduct',$singleProduct['id'])}}">{{$singleProduct['name']}}</a></h4>
                        </div>
                        <ul class="entry-meta">
                            <li class="color">{{$singleProduct['price']}} LE</li>
                        </ul>

                    </div>
                </div>
            @endfor
        </div>

    </div>

    <div class="col_one_third nobottommargin">

        <div class="fancy-title title-border">
            <h4>Most Sold </h4>
        </div>

        <div>


            @for ($i = 0 ; $i < count($mostSoldproducts) ; $i++)

                <?php $singleProduct2=App\Product::find($mostSoldproducts[$i]->product_id) ?>

                <div class="spost clearfix">
                    <div class="entry-image">
                        <a href="{{route('singleProduct',$singleProduct2['id'])}}"><img src="{{ URL::asset('products/images/'.$singleProduct2['image1'])}}" alt="Image" > </a>
                    </div>
                    <div class="entry-c">
                        <div class="entry-title">
                            <h4><a href="{{route('singleProduct',$singleProduct2['id'])}}">{{$singleProduct2['name']}}</a></h4>
                        </div>
                        <ul class="entry-meta">
                            <li class="color">{{$singleProduct2['price']}} LE</li>
                        </ul>

                    </div>
                </div>
            @endfor


        </div>
    </div>

    <div class="col_one_third nobottommargin col_last">

        <div class="fancy-title title-border">
            <h4>Recommended for You</h4>
        </div>

        <div>
            @foreach($recommendedProducts as $recProduct)


                <div class="spost clearfix">
                    <div class="entry-image">
                        <a href="{{route('singleProduct',$recProduct->id)}}"><img src="{{ URL::asset('products/images/'.$recProduct->image1)}}" alt="Image" > </a>
                    </div>
                    <div class="entry-c">
                        <div class="entry-title">
                            <h4><a href="{{route('singleProduct',$recProduct->id)}}">{{$recProduct->name}}</a></h4>
                        </div>
                        <ul class="entry-meta">
                            <li class="color">{{$recProduct->price}} LE</li>
                        </ul>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    </div>


    <div class="divider divider-center topmargin-ls"><i class="icon-circle"></i></div>

    <h3 class="center">Process Steps </h3>

    <div class="line visible-xs"></div>

    <ul class="process-steps process-5 clearfix">
        <li>
            <a href="#" class="i-bordered i-circled divcenter icon-plus"></a>
            <h5>Explore & Add items to your Cart</h5>
        </li>
        <li>
            <a href="#" class="i-bordered i-circled divcenter icon-shopping-cart"></a>
            <h5>Proceed to check out</h5>
        </li>
        <li>
            <a href="#" class="i-bordered i-circled divcenter icon-check"></a>
            <h5>Wait for admin confirmation </h5>
        </li>
        <li >
            <a href="#" class="i-bordered i-circled divcenter icon-truck"></a>
            <h5>Order delivery</h5>
        </li>
        <li>
            <a href="#" class="i-bordered i-circled divcenter  icon-money"></a>
            <h5>Payment on Delivery</h5>
        </li>
    </ul>

    </div>

    </div>


	<div class="clear"></div>

	<div class="fancy-title title-border title-center topmargin-sm">
		<h4>Popular Brands</h4>
	</div>

	<ul class="clients-grid grid-6 nobottommargin clearfix">
		<li><a href="#"><img src="images/clients/logo/1.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/2.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/3.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/4.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/5.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/6.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/7.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/8.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/9.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/10.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/11.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/12.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/13.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/14.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/15.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/16.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/19.png" alt="Clients"></a></li>
		<li><a href="#"><img src="images/clients/logo/18.png" alt="Clients"></a></li>
	</ul>

	<!-- #content end -->

@endsection

<!-- age verfication -->
@section('script')

    <script type="text/javascript" src="{{ URL::asset("js/jquery.cookie.js")}}" > </script>
	<script type="text/javascript" src="{{ URL::asset("js/bootbox.min.js")}}" > </script>
	<script type="text/javascript">

        jQuery(document).ready(function($) {

            $('#camera_wrap_1').camera({
                thumbnails: true,
                height: '40%',
                loader: 'pie',
                loaderPadding: 1,
                loaderStroke: 5,
                onLoaded: function() {
                    $('#camera_wrap_1').find('.camera_next').html('<i class="icon-angle-right"></i>');
                    $('#camera_wrap_1').find('.camera_prev').html('<i class="icon-angle-left"></i>');
                }
            });

        });

	</script>

	<script>

		function agecheck()
		{
            $.cookie('userAllowed', 'false', { expires: 3, path: '/' });

            bootbox.prompt({
                title: " Please enter your age" + " <span style='color:darkred'>(Must be +18 to use this site)<span> ",
                closeButton:false,
                inputType: 'date',
                callback: function (result) {

                    console.log(result);

                    if( result === null || !result.trim() )
                    {

                        $.cookie('userAllowed', 'false', { expires: 3, path: '/' });
                        return false;

                    }
                    else
                    {
                        var  birthData = new Date(result);
                        var today = new Date();
                        var age = Math.floor((today-birthData) / (365.25 * 24 * 60 * 60 * 1000));

                        if( age >= 18  )
                        {
                            $.cookie('userAllowed', 'true', { expires: 3, path: '/' });
                            return true;
                        }
                        else
                        {
                            $.cookie('userAllowed', 'false', { expires: 3, path: '/' });
                            return false;
                        }

                    }

                }})
		}

        console.log($.cookie("userAllowed") != 'true');
        console.log($.cookie("userAllowed"));

		if( $.cookie("userAllowed") != 'true' ) {
		    console.log($.cookie("userAllowed"));
            $(window).load(agecheck);
        }

	</script>



@endsection