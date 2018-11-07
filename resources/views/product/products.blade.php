@extends('layouts.header-footer')
@section('title' , 'Shop items')

@section('content')


    @if(!empty($failMsg))

        <div class="alert alert-danger"> {{ $failMsg }}</div>

    @else

        @if (session('status'))
    <div class="notopmargin nobottommargin">

            <div class="alert alert-success">
                {{ session('status') }}
            </div>
    </div>
        @endif
        
    <!-- Content
		============================================= -->
    <section id="content" class="notopmargin">

        <div class="content-wrap notopmargin">

            <div class="container-fluid clearfix">

                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin col_last notopmargin">

                    <!-- Shop
                    ============================================= -->
                    <div id="shop" class="shop product-3 grid-container clearfix">

                        @foreach($products as $product)
                            <div class="product sf-{{$product->category}} clearfix">
                                <div class="product-image">
                                    <a href="#"><img src="{{ URL::asset('products/images/'.$product->image1)}}" alt="Image 1" style="height: 223px;"></a>
                                    <a href="#"><img src="{{ URL::asset('products/images/'.$product->image2)}}" alt="Image 2" style="height: 223px;"></a>
                                    {{--discount option remove stylw to activate--}}
                                    <div class="sale-flash" style="display: none;">50% Off*</div>
                                    @if(Auth::check())
                                        <div class="product-overlay">
                                            @if(Auth::user()->role !='admin')
                                                @if($product->stock > 0)
                                                    <a href="/order/{{ $product->id  }}/1" class="add-to-cart" style="width: 100%;"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                                @endif
                                            @else
                                                <a href="{{ route('product.edit',['id' => $product->id ] ) }}" class="add-to-cart"><i class="icon-cogs"></i><span> Edit Item</span></a>
                                                <a href="/product/delete/{{ $product->id }}"><i class="icon-remove-sign"></i><span> Delete Item</span></a>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                                <div class="product-desc center">
                                    @if($product->stock > 0)
                                        <div class="product-stock">Stock : {{$product->stock }}  </div>
                                    @else
                                        <div class="product-stock">OUT OF STOCK  </div>
                                    @endif
                                    <div class="product-title" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;vertical-align: bottom;"> <h3><a href="{{route('product.show', ['product' => $product->id])}}">{{$product->name}}</a></h3></div>
                                    {{--<div class="product-title"><h3><a href="#">Men Grey Casual Shoes Men Grey Casual Shoes Men Grey Casual Shoes</a></h3></div>--}}
                                    <div class="product-price">{{$product->price}} LE </div>
                                    <div class="product-rate">
                                        <input id="input-15" class="rating" value="{{ ceil($product->rates()['averageRate'])}}" data-size="sm" data-glyphicon="false" data-rating-class="fontawesome-icon" data-readonly="true">
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
                                <li><a href="#" data-filter=".sf-70">70/30</a></li>
                                <li><a href="#" data-filter=".sf-50">50/50</a></li>
                                <li><a href="#" data-filter=".sf-3">0.3 mg nicotine</a></li>
                                <li><a href="#" data-filter=".sf-6">0.6 mg nicotine</a></li>
                                <li><a href="#" data-filter=".sf-12">0.12 mg nicotine</a></li>

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
            </div>
        </div>
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

                elementFilterCount = Number(jQuery(elementFilterContainer).find( elementFilter ).length );

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


