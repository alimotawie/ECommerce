@extends('layouts.header-footer')
@section('title','Pending Orders')
@section('content')

@if(Auth::check())

	@if(Auth::user()->role != 'admin')
	<div class="fancy-title title-dotted-border title-center" >
		<h4>Wait for <span> Admin </span> Confrimation </h4>
	</div>

	<div class="style-msg2" style="background-color: #EEE;">
		<div class="msgtitle">Ordering Rules:</div>
		<div class="sb-msg">
			<ul>
				<li>Expect a call From Admin for orders confirmation </li>
				<li>Unconfirmed orders are deleted if no response within 48 Hours </li>
				<li>Ensure that all your profile data are true and correct </li>

			</ul>
		</div>
	</div>

	@else

		@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>

		@endif

		@if (session('error'))
			<div class="alert alert-danger">
				{{ session('error') }}
			</div>

		@endif

		<div class="fancy-title title-dotted-border title-center" >
			<h4><span>Pending Order</span> Waiting for Confrimation </h4>
		</div>


	@endif

	<table class="table table-hover">
						  <thead>
							<tr>
							  <th>Order ID</th>
							  <th>User Name</th>
							  <th>Item</th>
							  <th>Quantity </th>
							  <th>Status </th>
								@if(Auth::user()->role == 'admin')
									<th> Confirmation </th>
									@endif
							</tr>
						  </thead>

						  <tbody>
						  @foreach($orders as $order)
							<tr>
							  <td>{{$order->id}}</td>
								<td> <a href="{{route('profile.show',['id'=>$order->user_id])}}"> {{App\User::find($order->user_id)->name}} </a></td>
							  <td><a href="{{route('product.show',['product'=>$order->product_id])}}"> {{App\Product::find($order->product_id)->name}} </a></td>
							  <td>{{$order->quantity}}</td>
								<td>{{$order->status}}</td>

								@if(Auth::user()->role == 'admin')
								<td>
									{!! Form::open(['method'=>'post','route'=>['confirmOrder'] ]) !!}
									{!! Form::hidden('order_id',$order->id ) !!}
									{!! Form::submit( 'Confirm Order',['class'=>'btn btn-success']) !!}
									{!! Form::close() !!}
								</td>
									@endif
							</tr>
							@endforeach
						  </tbody>
						</table>
	@endif
	@endsection