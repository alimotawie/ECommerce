@extends('layouts.header-footer')
@section('title', 'Add Slider item')

@section('content')

    <div class="container">
        <div class="justify-content-center align-items-center">
            <div class="col-md-8 col-md-offset-3">
                <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>

                    @endif

                    <h4 class="card-header topmargin-sm">{{ __('Add Slider Image') }}</h4>

                    <div class="card-body">
                        {!! Form::open([ "method"=>"POST", 'url' =>'/slider/store' , 'id'=>"sliderform" ,'files'=>true ]) !!}


                        <div class="form-group row">

                            <label for="image1" class="col-md-4 col-form-label text-md-right">{{ __('Slider Image 1') }}</label>
                            <div class="col-md-6">
                                {!! Form::file('image1',  ['class'=>'btn btn-primary' ] ) !!}
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="image2" class="col-md-4 col-form-label text-md-right">{{ __('Slider Image 2') }}</label>
                            <div class="col-md-6">
                                {!! Form::file('image2',  ['class'=>'btn btn-primary'] ) !!}
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="image3" class="col-md-4 col-form-label text-md-right">{{ __('Slider Image 3') }}</label>
                            <div class="col-md-6">
                                {!! Form::file('image3',  ['class'=>'btn btn-primary'] ) !!}
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="image4" class="col-md-4 col-form-label text-md-right">{{ __('Slider Image 4') }}</label>
                            <div class="col-md-6">
                                {!! Form::file('image4',  ['class'=>'btn btn-primary'] ) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Slider Image') }}
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection