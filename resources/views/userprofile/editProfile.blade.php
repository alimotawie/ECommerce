@extends('layouts.header-footer')
@section('title','Edit Profile')

@section('content')
    <div class="col-md-8 col-lg-offset-3">

    <h4> Edit Profile</h4>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>

                    @endif

                    <div class="card-body notopmargin">
                        <form method="POST" id="update" name="update" action="{{ route('profile.update', ['id'=>Auth::id()]) }}" aria-label="{{ __('Edit Profile') }}">
                            <input name="_method" type="hidden" value="PUT">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $userData->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $userData->email }}" required disabled>


                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ $userData->mobile }}" required >

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $userData->address }}" required >

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

<hr>

                            <div class="form-group row">

                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                </div>
                            </div>

                        </form>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 ">
                                    <button type="submit" id="update" value="update" form="update"  class="btn btn-success">
                                        {{ __('Update Profile') }}
                                    </button>
                                </div>


                                <div class="col-md-4 ">

                                {!! Form::open(['method' => 'DELETE', 'route' => ['profile.destroy', 'id'=>Auth::id()] , 'id'=>'delete', 'aria-label'=>"Delete Profile"  ])  !!}

                                    {!! Form::submit('Delete Profile' , ['class'=>"btn btn-danger" , 'form'=>'delete']) !!}

                                {!! Form::close() !!}

                                </div>

                            </div>
                            </div>
                    </div>

@endsection