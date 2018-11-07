@extends('layouts.header-footer')

@section('title' , $product->name )

@section('product_title')
    <section id="page-title">
        <div class="container clearfix">
            <h1>{{ $product->name }}</h1>
        </div>
    </section>
@endsection

@section('content')

    @if (session('status'))
<div class="notopmargin nobottommargin">

        <div class="alert alert-success">
            {{ session('status') }}
        </div>

    @endif
</div>

    <div class="single-product">


        <div class="product">

            <div class="col_two_fifth">

                <!-- Product Single - Gallery
                ============================================= -->
                <div class="product-image">
                    <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                        <div class="flexslider">
                            <div class="slider-wrap" data-lightbox="gallery">
                                <div class="slide" data-thumb="{{ URL::asset('products/images/'.$product->image1)}}"><a href="{{ URL::asset('products/images/'.$product->image1)}}" title="Product Photo 1" data-lightbox="gallery-item"><img src="{{ URL::asset('products/images/'.$product->image1)}}" alt="product photo"></a></div>
                                <div class="slide" data-thumb="{{ URL::asset('products/images/'.$product->image2)}}"><a href="{{ URL::asset('products/images/'.$product->image2)}}" title="Product Photo 2 " data-lightbox="gallery-item"><img src="{{ URL::asset('products/images/'.$product->image2)}}" alt="product photo"></a></div>
                            </div>
                        </div>
                    </div>
                </div><!-- Product Single - Gallery End -->

            </div>

            <div class="col_two_fifth product-desc">

                <!-- Product Single - Price
                ============================================= -->
                <div class="product-price">{{$product->price}} LE</div><!-- Product Single - Price End -->

                <!-- Product Single - Rating
                ============================================= -->
                <div class="product-rating">

                        <input id="input-15" class="rating" value="{{ceil($product->rates()['averageRate'])}}" data-size="sm" data-glyphicon="false" data-rating-class="fontawesome-icon" data-readonly="true">
                        ( users : {{ $product->rates()['count']}})

                </div><!-- Product Single - Rating End -->

                <div class="clear"></div>
                <div class="line"></div>
                 @if(Auth::check())
                <!-- Product Single - Quantity & Cart Button
                ============================================= -->
                    @if($product->stock > 0)

                    <div class="quantity clearfix">

                        {!! Form::open(['action' => 'orderController@store', 'method'=>'post' , 'class'=>"cart nobottommargin clearfix"]) !!}
                        {!! Form::label('quantity', 'Select quantity ') !!} <br>
                        <input type="button" value="-" class="minus" onclick="decreaseValue()">
                        <input type="number"  min="1" max="{{$product->stock}}" step="1"  value="1" name="quantity"  title="Qty" class="qty" size="4" style="input[type=number]::-webkit-inner-spin-button  input[type=number]::-webkit-outer-spin-button -webkit-appearance: none " margin: 0;" />
                        <input type="button" value="+" class="plus" onclick="increaseValue()">
                        {!! Form::hidden('product_id', $product->id ) !!}

                        <div class="quantity clearfix">


                        </div>

                    </div>
                    {!! Form::submit('Add to cart' , ['class'=>'add-to-cart button nomargin']) !!}
                    {!! Form::close() !!}<!-- Product Single - Quantity & Cart Button End -->
                        @else
                        <h4> out of stock </h4>
                    @endif
                @endif
                <div class="clear"></div>
                <div class="line"></div>

                <!-- Product Single - Short Description
                ============================================= -->
                <p style="white-space: pre-line;">{!!  $product->description !!} </p>
                <!-- Product Single - Short Description End -->

                <!-- Product Single - Meta
                ============================================= -->
                <div class="panel panel-default product-meta">
                    <div class="panel-body">
                        <span class="posted_in">Conentration: <a href="{{route('filterConcentration', ['concentration' => $product->concentration])}}" rel="tag">{{$product->concentration}}</a>,
                        Nicotine : <a href="{{route('filterNicotine', ['nicotine' => $product->nicotine])}}" rel="tag">{{$product->nicotine}}</a></span>
                        Brand : <a href="{{route('filterBrand', ['brand' => $product->brand])}}" rel="tag">{{$product->brand}}</a></span>
                    </div>
                </div><!-- Product Single - Meta End -->

            </div>

            <div class="col_one_fifth col_last">

                <a href="#" title="Brand Logo" class="hidden-xs"><img class="image_fade" src="{{ URL::asset('products/images/'.$product->logo)}}" alt="Brand Logo"></a>

                <div class="divider divider-center"><i class="icon-circle-blank"></i></div>

                <div class="feature-box fbox-plain fbox-dark fbox-small">
                    <div class="fbox-icon">
                        <i class="icon-thumbs-up2"></i>
                    </div>
                    <h3>100% Original</h3>
                    <p class="notopmargin">We guarantee you the sale of Original Brands.</p>
                </div>

                <div class="feature-box fbox-plain fbox-dark fbox-small">
                    <div class="fbox-icon">
                        <i class="icon-credit-cards"></i>
                    </div>
                    <h3>Payment Options</h3>
                    <p class="notopmargin">Easy Cash on delivery.</p>
                </div>

                <div class="feature-box fbox-plain fbox-dark fbox-small">
                    <div class="fbox-icon">
                        <i class="icon-truck2"></i>
                    </div>
                    <h3>Shipping</h3>
                    <p class="notopmargin">Across Egypt with moderate fees </p>
                </div>

                <div class="feature-box fbox-plain fbox-dark fbox-small">
                    <div class="fbox-icon">
                        <i class="icon-tag"></i>
                    </div>
                    <h3>Competitive Prices</h3>
                    <p class="notopmargin">Lowest price and best offers</p>
                </div>

            </div>
<div class="clearfix"></div>

             @if(Auth::check())
            <!-- Modal Reviews
                               ============================================= -->
            <a href="#" data-toggle="modal" data-target="#reviewFormModal" class="button button-3d nomargin fright">Add Rate & Review</a>

            <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="reviewFormModalLabel">Add a Review</h4>
                        </div>

                        <div class="modal-body">

                            <form class="nobottommargin" id="template-reviewform" name="template-reviewform" action="{{Route('addReview',['productID'=>$product->id])}}" method="post">
                                @csrf
                                <div class="clear"></div>

                                @if( App\Rate::where('user_id','=',Auth::id())->where('product_id' ,'=',$product->id)->get()->count() > 0 )

                                    <div class="col_full col_last">
                                        <p> already rated this product before </p>
                                   </div>

                                    @else

                                    <div class="col_full col_last">
                                        <label for="template-reviewform-rating">Rating <small>*</small></label>
                                        <input id="template-reviewform-rating" type="number" class="rating required" value="5"  max="5" data-size="md" name="rate" data-glyphicon="false" data-rating-class="fontawesome-icon" required >
                                    </div>

                                @endif

                                <div class="clear"></div>

                                <div class="col_full">
                                    <label for="template-reviewform-comment">Review Item <small>*</small></label>
                                    <textarea class="required form-control" id="template-reviewform-comment" name="review" rows="6" cols="30" required></textarea>
                                </div>

                                <div class="col_full nobottommargin">
                                    <input class="button button-3d nomargin" type="submit" id="template-reviewform-submit" name="template-reviewform-submit" value="Submit Rate & Review">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Modal Reviews End -->
                @endif

            <div class="col_full nobottommargin">

                <div class="tabs clearfix nobottommargin" id="tab-1">

                    <ul class="tab-nav clearfix">

                        <li><a href="#tabs-1"><i class="icon-star3"></i><span class="hidden-xs"> Reviews {{$reviews->count()}}</span></a></li>
                    </ul>

                    <div class="tab-container">


                        <div class="tab-content clearfix" id="tabs-1">

                            <div id="reviews" class="clearfix">

                                <ol class="commentlist clearfix">

                                    @if($reviews->count() > 0 )

                                    @foreach($reviews as $review)
                                    <li class="comment even thread-even depth-1" id="li-comment-1">
                                        <div id="comment-1" class="comment-wrap clearfix">


                                            <div class="comment-meta">
                                                <div class="comment-author vcard">
																	<span class="comment-avatar clearfix">
																	<img alt='user profile pic' src='{{ URL::asset('/images/avatar.png')}}' height='60' width='60' /></span>
                                                </div>
                                            </div>

                                            <div class="comment-content clearfix">
                                                <div class="comment-author">{{ $review->reviewerName() }}<span><a href="" title="Permalink to this comment">{{$review->created_at->diffForHumans()}}</a></span></div>
                                                <p>{!!  $review->review !!}</p>

                                            <div class="clear"></div>

                                        </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ol>

                            </div>

                        </div>

                            @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="clear"></div><div class="line"></div>

    <div class="col_full nobottommargin">

        <h4>Related Products</h4>

        <!-- recent added
                    ============================================= -->
        <div id="oc-products" class="owl-carousel products-carousel carousel-widget notopmargin bottommargin-sm" data-margin="20" data-nav="true" data-pagi="false" data-items-xxs="1" data-items-xs="2" data-items-sm="3" data-items-md="4">

            @foreach($RelatedProducts as $product)

                <div class="oc-item">
                    <div class="product sf-{{$product->category}}  clearfix">
                        <div class="product-image">
                            <a> <img src="{{ URL::asset('products/images/'.$product->image1)}}" alt="item image 1" style="height:250px;"></a>
                            <a><img  src="{{ URL::asset('products/images/'.$product->image2)}}" alt="item image 2" style="height:250px;"> </a>

                        </div>

                    <div class="product-desc center ">

                        <div class="product-title"><h3><a href="{{route('product.show', ['product' => $product->id])}}">{{$product->name}}</a></h3></div>
                        <div><span style="font-weight:bold; font-size: medium; ;">{{$product->price }} LE</span> </div>

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


@endsection

@section('script')
    <script>
        function increaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('number').value = value;
        }

        function decreaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            document.getElementById('number').value = value;
        }
    </script>

    @endsection
