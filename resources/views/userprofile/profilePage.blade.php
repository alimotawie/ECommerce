@extends('layouts.header-footer')

@section('title', $userData->name .' | Profile')

@section('content')
		<!-- Content
		============================================= -->

        <div class="col-sm-12 topmargin-sm">

							<div class="bottommargin-lg">

							<img src="{{ URL::asset("images/icons/avatar1.png" )}}" class="alignleft img-rounded img-thumbnail " alt="Avatar" style="max-width: 100px;">

							</div>
			<div class="clear"></div>
			<div class="heading-block noborder ">

				<h3>Name : <span> {{$userData->name}} </span> </h3>

			</div>

			<div class="fancy-title topmargin-sm title-border">
				<h4>About Me</h4>
			</div>
			<div class="container clearfix">
						<div class="col_one_third">
							<div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
								<div class="fbox-icon">
									<a href="#"><i class="icon-home2"></i></a>
								</div>
								<h3>Address<span class="subtitle">{{ $userData->address }}</span></h3>
							</div>
						</div>

						<div class="col_one_third">
							<div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
								<div class="fbox-icon">
									<a href="#"><i class=" icon-phone3"></i></a>
								</div>
								<h3>Mobile<span class="subtitle">{{ $userData->mobile }}</span></h3>
							</div>
						</div>

						<div class="col_one_third col_last">
							<div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
								<div class="fbox-icon">
									<a href="#"><i class=" icon-email3"></i></a>
								</div>
								<h3>Email<span class="subtitle">{{ $userData->email }}</span></h3>
							</div>
						</div>
					</div>
		</div>

		<div class="clear"></div>
				<div class="fancy-title topmargin-sm title-border">
					<h4>My Actions Histroy </h4>
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
