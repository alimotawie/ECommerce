@extends('layouts.header-footer')

@section('title' , 'Registration')

@section('content')

		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_one_third nobottommargin">

						<div class="well well-lg nobottommargin">

								<form  id="login-form" name="login-form" method="POST" action="/login" aria-label="{{ __('Login') }}">
									@csrf

								<h3>Login to your Account</h3>

								<div class="col_full">

									<label for="email" >{{ __('E-Mail Address') }}</label>

									<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

									@if ($errors->has('email'))
										<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
									@endif

								</div>

								<div class="col_full">

									<label for="password">{{ __('Password') }}</label>

									<input type="password" id="password" name="password"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  required>

									@if ($errors->has('password'))
										<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
									@endif

								</div>

									<div class="col_full">

										<label class="form-check-label" for="remember"> {{ __('Remember Me') }} </label>
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									</div>

								<div class="col_full nobottommargin">
									<button class="button button-3d nomargin" type="submit">{{ __('Login') }}</button>

									<a class="fright" href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }} </a>
								</div>

							</form>
						</div>

					</div>

					<div class="col_two_third col_last nobottommargin">


						<h3>Don't have an Account? Register Now.</h3>

						

							<form  class="nobottommargin" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
								@csrf

							<div class="col_half">
								<label for="name" >{{ __('Name') }}</label>
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

								@if ($errors->has('name'))
									<span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
								@endif
							</div>

							<div class="col_half col_last">
								<label for="email">{{ __('E-Mail Address') }}</label>
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

								@if ($errors->has('email'))
									<span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
								@endif
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="address">{{ __('Address') }}</label>
								<input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required >

								@if ($errors->has('address'))
									<span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
								@endif
							</div>

							<div class="col_half col_last">
								<label for="mobile">{{ __('Mobile') }}</label>
								<input id="mobile" type="tel" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required >

								@if ($errors->has('mobile'))
									<span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
								@endif
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="password">Password</label>
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

								@if ($errors->has('password'))
									<span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
								@endif
							</div>

							<div class="col_half col_last">
								<label for="password-confirm">Confirm Password</label>
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
							</div>

							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button class="button button-3d button-black nomargin" type="submit">{{ __('Register') }}</button>
							</div>

						</form>

					</div>

				</div>

			</div>

		</section>

	@endsection
