@extends('layouts.header-footer')
@section('title' , 'Shop items')

@section('content')


    @if(!empty($failMsg))

        <div class="alert alert-danger"> {{ $failMsg }}</div>

    @else

    <!-- Content
		============================================= -->
    <section id="content">

        <div class="content-wrap notopmargin">

            <div class="container-fluid clearfix">

                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin col_last notopmargin">

                    <!-- Shop
                    ============================================= -->
                    <div id="shop" class="shop product-3 grid-container clearfix">

                        @foreach($products as $product)
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
                                    @endif
                                </div>
                                @else
                                     <a class="btn btn-success " role="button" href="{{ route('product.edit',['id' => $product->id ] ) }}"> Edit Item </a>

                                    {!! Form::open([ 'route' => ['product.destroy',$product->id] , 'method'=>'delete' ]) !!}
                                    {!! Form::submit('Delete Item',['class'=>'btn btn-danger'])!!}

                           </div>
                            @endif
                            </div>
                            </div>
                            @else
                            </div>
                            @endif

                            <div class="product-desc center ">

                                @if($product->stock > 0)
                                    <div class="product-stock">Stock : {{$product->stock }}  </div>
                                @else
                                    <div class="product-stock">OUT OF STOCK  </div>
                                @endif
                                <div class="product-title"> <h3><a href="{{route('product.show', ['product' => $product->id])}}">{{$product->name}}</a></h3></div>
                                <div class="product-price">{{$product->price}} LE </div>

                                <div class="product-rate">

                                            <input id="input-15" class="rating" value="{{ $product->rates()['averageRate']}}" data-size="sm" data-glyphicon="false" data-rating-class="fontawesome-icon" data-readonly="true">
                                    ( Users : {{ $product->rates()['count']}})

                                </div>

                             </div>
                            
                            </div>
                        @endforeach
                    </div><!-- #shop end -->

                </div><!-- .postcontent end -->

                <!-- Sidebar
                ============================================= -->
                <div class="sidebar nobottommargin">
                    <div class="sidebar-widgets-wrap">

                        <div class="widget widget-filter-links clearfix">

                            <h4>Select Category</h4>
                            <ul class="custom-filter" data-container="#shop" data-active-class="active-filter">
                                <li class="widget-filter-reset active-filter"><a href="#" data-filter="*">Clear</a></li>
                                <li><a href="#" data-filter=".sf-mod">Mods</a></li>
                                <li><a href="#" data-filter=".sf-tank">Tanks</a></li>
                                <li><a href="#" data-filter=".sf-liquid">liquids</a></li>
                                <li><a href="#" data-filter=".sf-accessories">Accessories</a></li>
                                <li><a href="#" data-filter=".sf-parts">Parts</a></li>
                                <li><a href="#" data-filter=".sf-offers">Offers</a></li>
                            </ul>

                        </div>

                        <div class="widget widget-filter-links clearfix">

                            <h4>Sort By</h4>
                            <ul class="shop-sorting">
                                <li class="widget-filter-reset active-filter"><a href="#" data-sort-by="original-order">Clear</a></li>
                                <li><a href="#" data-sort-by="name">Name</a></li>
                                <li><a href="#" data-sort-by="price_lh">Price: Low to High</a></li>
                                <li><a href="#" data-sort-by="price_hl">Price: High to Low</a></li>
                                <li><a href="#" data-sort-by="rate_hl">Rate: Top Rated Items </a></li>
                            </ul>

                        </div>
                    </div>
                </div><!-- .sidebar end -->
    </section><!-- #content end -->

@endif
@endsection

@section('script')
    <script>

        jQuery(document).ready( function($){
            $('#shop').isotope({
                transitionDuration: '0.65s',
                getSortData: {
                    name: '.product-title',
                    price_lh: function( itemElem ) {
                        if( $(itemElem).find('.product-price').find('ins').length > 0 ) {
                            var price = $(itemElem).find('.product-price ins').text();
                        } else {
                            var price = $(itemElem).find('.product-price').text();
                        }

                        priceNum = price.split("LE");

                        return parseFloat( priceNum[0] );
                    },
                    price_hl: function( itemElem ) {
                        if( $(itemElem).find('.product-price').find('ins').length > 0 ) {
                            var price = $(itemElem).find('.product-price ins').text();
                        } else {
                            var price = $(itemElem).find('.product-price').text();
                        }

                        priceNum = price.split("LE");

                        return parseFloat( priceNum[0] );
                    },
                    rate_hl: function( itemElem ) {
                        if( $(itemElem).find('.product-rate').find('input').length > 0 ) {
                            var rate = $(itemElem).find('.product-rate input').val();
                        } else {
                            var rate = $(itemElem).find('.product-rate').val();
                        }

                        rateNum = rate;

                        return parseFloat( rateNum );
                    }
                },
                sortAscending: {
                    name: true,
                    price_lh: true,
                    price_hl: false,
                    rate_hl: false,
                }
            });

            $('.custom-filter:not(.no-count)').children('li:not(.widget-filter-reset)').each( function(){
                var element = $(this),
                    elementFilter = element.children('a').attr('data-filter'),
                    elementFilterContainer = element.parents('.custom-filter').attr('data-container');

                elementFilterCount = Number( jQuery(elementFilterContainer).find( elementFilter ).length );

                element.append('<span>'+ elementFilterCount +'</span>');

            });

            $('.shop-sorting li').click( function() {
                $('.shop-sorting').find('li').removeClass( 'active-filter' );
                $(this).addClass( 'active-filter' );
                var sortByValue = $(this).find('a').attr('data-sort-by');
                $('#shop').isotope({ sortBy: sortByValue });
                return false;
            });
        });


    </script>

    @endsection


