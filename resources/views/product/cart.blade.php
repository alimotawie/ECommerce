@extends('layouts.header-footer')
@section('title' , 'My Cart')
@section('content')


				<div class="container clearfix notopmargin">

					<div class="table-responsive bottommargin">

						@if (session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>

						@endif

						<table class="table cart">
							<thead>
								<tr>
									<th class="cart-product-remove">&nbsp;</th>
									<th class="cart-product-thumbnail">&nbsp;</th>
									<th class="cart-product-name">Product</th>
									<th class="cart-product-price">Unit Price</th>
									<th class="cart-product-quantity">Quantity</th>
									<th class="cart-product-subtotal">Total</th>
								</tr>
							</thead>
							<tbody>


                            <?php $subtotal=[] ?>

							@foreach($orders as $index=>$order)

								@if( $order->status != 'confirmed')
                                <?php $total=0 ?>
								<tr class="cart_item">
									<td class="cart-product-remove">
                                        {!! Form::open([ 'method'=>'delete' ,'route'=> ['order.destroy','order'=>$order->id ],  'title'=>"Remove this item" ]) !!}
										{!! Form::hidden('orderNo',$index ) !!}
										<i class="remove icon-trash2"> {!! Form::submit('Remove' , ['class'=>"btn btn-danger" ]) !!} </i>
										{!! Form::close() !!}
									</td>

									<td class="cart-product-thumbnail">
										<a href="#"><img width="64" height="64" src="products/images/{{App\Product::find($order->product_id)->image1}}" alt="product image"></a>
									</td>

									<td class="cart-product-name">
										<a href="#">{{App\Product::find($order->product_id)->name }}</a>
									</td>

									<td class="cart-product-price">
										<span class="amount">{{App\Product::find($order->product_id)->price }} LE</span>
									</td>

									<td class="cart-product-quantity">
										<div class="quantity clearfix">
                                            {{$order->quantity}}
										</div>
									</td>

									<td class="cart-product-subtotal">
                                        <?php $total += ($order->quantity)*(App\Product::find($order->product_id)->price);

                                        		array_push($subtotal,$total);
										?>


										<span class="amount">{{$total}} LE</span>
									</td>
								</tr>
								@endif
								@endforeach

							</tbody>

						</table>

					</div>

					<div class="col-md-6 clearfix">
							<div class="table-responsive">
								<h4>Cart Totals</h4>

								<table class="table cart">
									<tbody>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Cart Subtotal</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount"><?php echo array_sum($subtotal); ?> LE </span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Shipping</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount">Free Delivery</span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Total</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount color lead"><strong><?php echo array_sum($subtotal); ?> LE </strong></span>
											</td>
										</tr>

										<tr class="cart_item">
											<td colspan="9">
												<div class="row clearfix">

													<div class="col-md-12 col-xs-12 nopadding">
															<a href="{{route('pendingOrder')}}" class="button button-aqua notopmargin fright">Proceed to Checkout / Check My Orders</a>
													</div>
												</div>
											</td>
										</tr>

									</tbody>

								</table>

							</div>
						</div>
					</div>

				</div>

			</div>

		</section><!-- #content end -->
	@endsection