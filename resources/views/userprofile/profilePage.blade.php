@extends('layouts.header-footer')

@section('title', $userData->name .' | Profile')

@section('content')
		<!-- Content
		============================================= -->

        <div class="col-sm-12" style="margin-top: 80px;">

							<img src="/images/icons/avatar1.png" class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 84px;">

							<div class="heading-block noborder">
								<h3>{{$userData->name}}</h3>
								<span>Your Profile Bio</span>
							</div>


                <div class="fancy-title topmargin-sm title-border">
                    <h4>About Me</h4>
                </div>

			<div class="container">
				<div class="row ">

					<div class="col-md-4">
            		<p> <span> Address : </span> {{ $userData->address }} </p>
				</div>

					<div class="col-md-4">
						<p>	<span> Mobile : </span> {{ $userData->mobile }} </p>
					</div>

							<div class="col-md-4">
								<p> <span>  Email : </span> {{ $userData->email }}   </p>
							</div>
				</div>
			</div>

				<div class="fancy-title topmargin-sm title-border">
					<h4>My Profile</h4>
				</div>

							<div class="clear"></div>

							<div class="row clearfix">

								<div class="col-md-12">

									<div class="tabs tabs-alt clearfix" id="tabs-profile">

										<ul class="tab-nav clearfix">
											<li><a href="#tab-purchase"><i class="icon-money"></i> Purchased</a></li>
											<li><a href="#tab-reviews"><i class="icon-meter"></i> Rates and Reviews </a></li>
										</ul>

										<div class="tab-container">

											<div class="tab-content clearfix" id="tab-purchase">

												<ol class="commentlist noborder nomargin nopadding clearfix">
													@foreach($purchasedItems as $item )

														<li class="comment even thread-even depth-1" id="li-comment-1">
															<div id="comment-1" class="comment-wrap clearfix">
																<div class="comment-meta">
																	<div class="comment-author vcard">
																		<span class="comment-avatar clearfix">
																		<img alt='' src='{{ URL::asset('products/images/'.App\Product::find($item->product_id)->image1) }}' class='avatar avatar-60 photo avatar-default' height='60' width='60' /></span>
																	</div>
																</div>
																<div class="comment-content clearfix">
																	<div class="comment-author">{{App\Product::find($item->product_id)->name}}<span><a href="#" title="Permalink to this comment">Purchased At: {{$item->created_at }}</a></span></div>
																	<p></p>
																</div>

																<div class="clear"></div>
															</div>

														</li>

													@endforeach
												</ol>

											</div>

											<div class="tab-content clearfix" id="tab-reviews">

												<div class="clear topmargin-sm"></div>
												<ol class="commentlist noborder nomargin nopadding clearfix">
													@foreach($reviews as $review )

													<li class="comment even thread-even depth-1" id="li-comment-1">
														<div id="comment-1" class="comment-wrap clearfix">
															<div class="comment-meta">
																<div class="comment-author vcard">
																	<span class="comment-avatar clearfix">
																	<img alt='' src='{{ URL::asset('products/images/'.App\Product::find($review->product_id)->image1) }}' class='avatar avatar-60 photo avatar-default' height='60' width='60' /></span>
																</div>
															</div>
															<div class="comment-content clearfix">
                                                                <div class="comment-author">{{App\Product::find($review->product_id)->name}}<span><a href="#" title="Permalink to this comment">{{$review->created_at }}</a></span></div>
																<p>Review : {{$review->review}}</p>

															</div>

															<div class="clear"></div>
														</div>

													</li>

													@endforeach
												</ol>

											</div>

														</div>

													</div>
												</div>

											</div>

										</div>



@endsection

@section('script')
	<script>
		jQuery( "#tabs-profile" ).on( "tabsactivate", function( event, ui ) {
			jQuery( '.flexslider .slide' ).resize();
		});
	</script>
@endsection
