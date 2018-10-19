@extends('layouts.header-footer')

	<!-- Document Title
    ============================================= -->

@section('title','Vapery | The Vapes Home')

@section('content')

	<!-- page slider
		============================================= -->

	<section id="slider" class="slider-parallax revslider-wrap ohidden clearfix">

					<div class="col_two_third bottommargin-lg">

						<div class="fslider" data-arrows="true">
							<div class="flexslider">
								<div class="slider-wrap">

									<div class="slide">
										<a href="#">
											<img src="images/shop/slider/22.jpg" alt="Shop Image">
										</a>
									</div>

									<div class="slide">
										<a href="#">
											<img src="images/shop/slider/44.jpg" alt="Shop Image">
										</a>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="col_one_third bottommargin-lg col_last">

						<div class="col_full bottommargin-sm">
							<a href="{{route('product.index')}}"><img src="{{ URL::asset('images/shop/banners/44.jpg')}}" alt="All Products"></a>
						</div>

						<div class="col_full nobottommargin">
							<a href="{{route('filterCategory',['category'=>'liquid'] )}}"><img src="{{ URL::asset('images/shop/banners/33.jpg')}}" alt="Liquids"></a>
						</div>

					</div>

	</section>
	<!-- end of slider-->

		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="row clearfix">

			<div class="promo parallax promo-full " style="background-image: url('images/parallax/3.jpg');" data-stellar-background-ratio="0.4">
				<div class="container clearfix">
					<h3>Get what you need at the <span>Best Market PRICE</span></h3>
					<span>Products available include Mods, Tanks, Liquids  &amp; MORE !.</span>
					<a href="{{route('product.index')}}" class="button button-xlarge button-rounded">Check Our Products</a>
				</div>
			</div>
		</div>
				</div>
			</div>
		</section>

	

		<div class="fancy-title title-dotted-border title-center">
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
                                <a> <img src="{{ URL::asset('products/images/'.$product->image1)}}" alt="item image 1"></a>
                                <a><img  src="{{ URL::asset('products/images/'.$product->image2)}}" alt="item image 2 "> </a>
                            @if(Auth::check())
                            <div class='center'>
                                <div class="product-overlay">
                              @if(Auth::user()->role !='admin')
										@if($product->stock > 0)

										<a href="#" onclick="document.forms['addToCart'].submit(); return false;"  class="add-to-cart input-block-level" ><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>

                                    {!! Form::open(['action' => 'orderController@store', 'method'=>'post', 'name'=>'addToCart', 'class'=>"cart nobottommargin clearfix"]) !!}
                                    {!! Form::hidden('product_id', $product->id ) !!}
                                    {!! Form::hidden('quantity', 1 ) !!}

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

                                            <input id="input-15" class="rating" value="{{ $product->rates()['averageRate']}}" data-size="sm" data-glyphicon="false" data-rating-class="fontawesome-icon" data-readonly="true">
                                    ( Users : {{ $product->rates()['count']}})

                                </div>

                             </div>
                            
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
               
            </div>
        
        <div class="divider notopmargin notopmargin"><i class="icon-circle"></i></div>
    </section>


						<div id="features" class="section bottommargin-sm notopmargin">
					<div class="container clearfix">
						<div class="heading-block center">
							<h2>Features List.</h2>
							<span>Online Store Managment system Where you can </span>
						</div>

						<div class="col_one_fourth nobottommargin">
							<div class="feature-box fbox-plain fbox-dark fbox-small">
								<div class="fbox-icon">
									<i class="icon-thumbs-up2"></i>
								</div>
								<h3>Know Your Customers</h3>
								<p class="notopmargin">We offer items rate and review to Know how your customers thinks about you and your products, this will help your improve and statisfy more people  </p>
							</div>
						</div>

						<div class="col_one_fourth nobottommargin">
							<div class="feature-box fbox-plain fbox-dark fbox-small">
								<div class="fbox-icon">
									<i class="icon-credit-cards"></i>
								</div>
								<h3>Better Online Presence </h3>
								<p class="notopmargin">Having a facebook page is not enough for branding and get known  , what about having an online store .. sounds better .. more professional </p>
							</div>
						</div>

						<div class="col_one_fourth nobottommargin">
							<div class="feature-box fbox-plain fbox-dark fbox-small">
								<div class="fbox-icon">
									<i class="icon-truck2"></i>
								</div>
								<h3>Take Orders Online </h3>
								<p class="notopmargin">Limited Stores and distribution panels ?  Wants to increase your customer reach and demographics ? Wants to sell more ? by taking orders online what can stop you </p>
							</div>
						</div>

						<div class="col_one_fourth nobottommargin col_last">
							<div class="feature-box fbox-plain fbox-dark fbox-small">
								<div class="fbox-icon">
									<i class="icon-undo"></i>
								</div>
								<h3>Manager Your Inventory </h3>
								<p class="notopmargin"> know and Control your stock , Stock level notifications and reminders  , inventory auto update   </p>
							</div>
						</div>
                    <div class="clear"> </div>
						<div class="col_one_fourth nobottommargin ">
							<div class="feature-box fbox-plain fbox-dark fbox-small">
								<div class="fbox-icon">
									<i class="icon-undo"></i>
								</div>
								<h3>Track Your Sales </h3>
								<p class="notopmargin">Never get lost in numbers , Profit calculator , top sellers items and transactions history   </p>
							</div>
						</div>

					</div>
				</div>

				
				<div id="contactus"class="section notopborder nobottomborder nomargin nopadding nobg footer-stick">
					<div class="container clearfix">

						<div class=" subscribe-widget nobottommargin ">

							<div class="heading-block notopmargin">
								<h3><strong>Contact us for more info about prices and packages </strong></h3>
								<iframe src="https://docs.google.com/forms/d/e/1FAIpQLScqNUX2a7KmjceMEpVLoittndekuIjruAlm4mpkO5SMyjsmWg/viewform?embedded=true" width="100%" height="530" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
							</div>

						</div>

					</div>
				</div>
		<!-- #content end -->

@endsection

<!-- age verfication -->
@section('script')

	<script type="text/javascript" src="{{ URL::asset("js/bootbox.min.js")}}" > </script>
	<script type="text/javascript" src="{{ URL::asset("js/bootstrap.min.js")}}" > </script>
	<script type="text/javascript" src="{{ URL::asset("js/jquery.cookie.js")}}" > </script>

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