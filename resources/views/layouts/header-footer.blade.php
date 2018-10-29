<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset("css/bootstrap.css") }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset("style.css")}}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset("css/dark.css")}}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset("css/swiper.css")}}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset("css/font-icons.css")}}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset("css/animate.css")}}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset("css/magnific-popup.css")}}" type="text/css" />


    <!-- Star Rating CSS -->
    <link rel="stylesheet" href="{{ URL::asset("css/components/bs-rating.css") }}" type="text/css" />

    <link rel="stylesheet" href="{{ URL::asset("css/responsive.css")}}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


    <title>@yield('title')</title>

    <style>

        .white-section {
            background-color: #FFF;
            padding: 25px 20px;
            -webkit-box-shadow: 0px 1px 1px 0px #dfdfdf;
            box-shadow: 0px 1px 1px 0px #dfdfdf;
            border-radius: 3px;
        }

        .white-section label { margin-bottom: 15px; }

        .dark .white-section {
            background-color: #111;
            -webkit-box-shadow: 0px 1px 1px 0px #444;
            box-shadow: 0px 1px 1px 0px #444;
        }

    </style>

</head>


<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <header id="header" class="full-header">

        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="{{Route('home')}}" class="standard-logo" ><img src="{{URL::asset('images/vapery.png')}}" alt="Vapery Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu" class="style-5">

                    <ul>
                         <!-- Admin page
                        ============================================= -->
                        @if(Auth::check())
                            @if(Auth::user()->role =='admin')

                         <li><a href="#"> <div><i class="icon-user"></i>Admin Controller</div></a>
                            <ul>
                                <li><a href="{{action('productController@create')}}"><div>Add new product</div></a> </li>
                                <li><a href="{{route('pendingOrder')}}"><div>Confirm Orders</div></a> </li>
                            </ul>
                        </li>
    
                             @endif
                        @endif


                        <li><a href="{{route('filterCategory',['category'=>'mod'] )}}"><div><i class="icon-bolt2"></i>Devices</div></a>

                            <ul>
                                <li><a href="{{ route('filterCategory',['category'=>'fullkit'] )}}"><div>Full Kit</div></a> </li>

                                <li><a href="{{route('filterCategory',['category'=>'mod'] )}}"><div>Mods</div></a> </li>
                            </ul>
                        </li>

                        <li><a href="{{route('filterCategory',['category'=>'liquid'] )}}"><div><i class="icon-beaker"></i>Liquids</div></a>

                            <ul>
                                <li><a href="{{route('filterCategory',['category'=>'Premium'] )}}"><div>Premium</div></a></li>
                                <li><a href="{{route('filterCategory',['category'=>'liquid'] )}}"><div>Top Egyptian E-liquid </div></a>
                                    <ul>
                                        <li><a href="{{route('filterCategory',['category'=>'vip'] )}}"><div>VIP</div></a></li>
                                        <li><a href="{{route('filterCategory',['category'=>'MARVEL'] )}}"><div>MARVEL</div></a></li>
                                        <li><a href="{{route('filterCategory',['category'=>'SULTAN'] )}}"><div>SULTAN</div></a></li>
                                        <li><a href="{{route('filterCategory',['category'=>'MINIONS'] )}}"><div>MINIONS</div></a></li>
                                        <li><a href="{{route('filterCategory',['category'=>'SMURFS'] )}}"><div>SMURFS</div></a></li>
                                        <li><a href="{{route('filterCategory',['category'=>'FRUITSERIES'] )}}"><div>FRUIT SERIES</div></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li><a href="{{route('filterCategory',['category'=>'tank'] )}}"><div><i class="icon-bag"></i>Tanks</div></a>

                            <ul>
                                <li><a href="{{route('filterCategory',['category'=>'RDA'] )}}"><div>RDA</div></a> </li>
                                <li><a href="{{route('filterCategory',['category'=>'RTA'] )}}"><div>RTA</div></a> </li>
                                <li><a href="{{route('filterCategory',['category'=>'RDTA'] )}}"><div>RDTA</div></a> </li>
                            </ul>
                        </li>

                        <li><a href="{{route('filterCategory',['category'=>'part'] )}}"><div><i class="icon-line-cog"></i>Parts</div></a>

                            <ul>
                                <li><a href="{{route('filterCategory',['category'=>'Coils Atomizer'] )}}"><div>Coils & Atomizer </div></a> </li>
                                <li><a href="{{route('filterCategory',['category'=>'battaries'] )}}"><div>battaries</div></a> </li>
                                <li><a href="{{route('filterCategory',['category'=>'dripTip'] )}}"><div>drip Tip</div></a> </li>
                                <li><a href="{{route('filterCategory',['category'=>'chargers'] )}}"><div>Chargers</div></a> </li>
                                <li><a href="{{route('filterCategory',['category'=>'accessories'] )}}"><div>Accessories</div></a> </li>
                            </ul>
                        </li>

                        {{--<li><a href="{{route('offers')}}"><div><i class="icon-tag"></i>Offers</div></a>--}}
                            {{--<ul>--}}

                                {{--<li><a href="{{route('offers')}}"><div>Bundles</div></a> </li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}

                         
                        <!-- login
                        ============================================= -->
                        @if(Auth::check())

                            <li>
                                <a href="{{route('profile.index')}}"><div><i class="icon-user"></i>My Profile</div></a>
                                <ul>

                                    <li> <a href="{{route("profile.edit",['id'=> Auth::id()] )}}"> <div> Edit Profile</div> </a> </li>
                                    <li> <a href="#" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><div> Logout</div> </a> </li>

                                    {{Form::open([ 'route'=>'logout' , 'method'=>"post" ,  'id'=>"logout-form" , 'style'=>"display: none;" ] )}}

                                    {!! Form::close() !!}

                                </ul>
                            </li>
                        </ul>
                            
                    @else

                        <li><a href="{{route('login')}}"><div><i class="icon-line2-login"></i>Account</div></a></li>
                    </ul>

                @endif

                <!-- Top Cart
						============================================= -->
                    @if(Auth::check())

                    <div id="top-cart">
                        @if( session()->get('cart') )
                        <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>{{session()->get('cart')->where('status', '!=',  'confirmed')->count() }}</span></a>
                        <div class="top-cart-content">
                            <div class="top-cart-title">
                                <h4>Shopping Cart</h4>
                            </div>
                            <div class="top-cart-items">

                                <?php $total=0 ?>

                                @foreach( session()->get('cart') as $order)
                                        @if( $order->status != 'confirmed')

                                <div class="top-cart-item clearfix">
                                    <div class="top-cart-item-image">
                                        <a ><img src="/products/images/{{App\Product::find($order->product_id)->image1}}" alt="product image" /></a>
                                    </div>
                                    <div class="top-cart-item-desc">
                                        <a >{{App\Product::find($order->product_id)->name }}</a>
                                        <span class="top-cart-item-price">{{App\Product::find($order->product_id)->price}} LE</span>
                                        <span class="top-cart-item-quantity">{{$order->quantity}}</span>
                                    </div>
                                </div>
                                        <?php $total += ($order->quantity)*(App\Product::find($order->product_id)->price) ?>
                                        @endif
                                @endforeach

                            </div>
                            <div class="top-cart-action clearfix">
                                <span class="fleft top-checkout-price">{{$total}} LE</span>
                                <a href="{{route('order.index')}}"> <button class="button button-3d button-small nomargin fright">View Cart</button> </a>
                            </div>
                        </div>
                    </div><!-- #top-cart end -->
                    @else
                        <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>0</span></a>
                        </div>
                    @endif
                        @endif
                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search">
                        <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                        {!! Form::open([ 'route'=>'findItem' , 'method'=>'POST']) !!}
                        {!! Form::text( 'keyword' ,"" ,[ 'class'=>"form-control" , 'placeholder' =>"Type &amp; Hit Enter.."]) !!}
                       {!! Form::close() !!}
                    </div><!-- #top-search end -->

                </nav><!-- #primary-menu end -->

            </div>


    </header><!-- #header end -->

    <div class="clearfix"></div>

    <!-- Product Title Start-->

    @yield('product_title')

    <!-- #Content Start-->

    <section id="content">

        <div class="content-wrap" style="padding: 0;">

            <div class="container clearfix">

                <div class="row clearfix">

    @yield('content')

                </div>
            </div>
        </div>
    </section>

    <!-- Footer
        ============================================= -->
    <footer id="footer" class="dark">

        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">


                    Copyrights &copy; 2014 All Rights Reserved by Vapery Store.
                </div>

                <div class="col_half col_last tright">
                    <div class="copyrights-menu copyright-links fright clearfix">
                        <a href="{{route('home').'#slider'}}">Home</a>/<a href="#">About</a>/<a href="{{route('home').'#features'}}">Features</a>/<a href="#">FAQs</a>/<a href="{{route('home').'#contactus'}}">Contact</a>
                    </div>
                    <div class="fright clearfix">
                        <a href="#" class="social-icon si-small si-borderless nobottommargin si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless nobottommargin si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless nobottommargin si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless nobottommargin si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless nobottommargin si-vimeo">
                            <i class="icon-vimeo"></i>
                            <i class="icon-vimeo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless nobottommargin si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless nobottommargin si-yahoo">
                            <i class="icon-yahoo"></i>
                            <i class="icon-yahoo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless nobottommargin si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->

</div><!-- #wrapper end-->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="{{ URL::asset("js/jquery.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("js/plugins.js")}}"></script>

<!-- Star Rating Plugin -->

<script type="text/javascript" src="{{ URL::asset("js/components/star-rating.js")}}"> </script>



<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="{{ URL::asset("js/functions.js")}}" > </script>

<!-- Star Rating js -->
<script type="text/javascript">

    $("#input-11").rating({
        starCaptions: {0: "Zero",1: "Very Poor", 2: "Poor", 3: "Ok", 4: "Good", 5: "Very Good"},
        starCaptionClasses: {0: "text-danger", 1: "text-danger", 2: "text-warning", 3: "text-info", 4: "text-primary", 5: "text-success"},
    });

    $("#input-13").on("rating.clear", function(event) {
        $('#rating-notification-message').attr('data-notify-type','error').attr('data-notify-msg', 'Your rating is reset');
        SEMICOLON.widget.notifications( jQuery('#rating-notification-message') );
    });
    $("#input-13").on("rating.change", function(event, value, caption) {
        $('#rating-notification-message').attr('data-notify-msg', 'You rated: ' + value + ' Stars');
        SEMICOLON.widget.notifications( jQuery('#rating-notification-message') );
    });

    $("#input-14").on("rating.change", function(event, value, caption) {
        $("#input-14").rating("refresh", {disabled: true, showClear: false});
    });

</script>
@yield('script')
</body>
</html>