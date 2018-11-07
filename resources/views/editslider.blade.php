@extends('layouts.header-footer')

@section('title','Edit Stored Item')

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

                    <div class="card-body">
                        {!! Form::open([ "method"=>"Put",'files'=>true,'route' => ['slider.update'] , 'id'=>"sliderform" ]) !!}

                        <div class="form-group row">
                            <h4>Edit Sliders</h4>

                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img alt="300x200" src="{{ URL::asset('images/slider/'.$slider->image1)}} " style="display: block;width: 100%">
                                        <div class="caption">
                                            <h3>Image 1</h3>
                                            {!! Form::file('image1') !!}

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img alt="300x200" src="{{ URL::asset('images/slider/'.$slider->image2)}} " style="display: block;width: 100%">
                                        <div class="caption">
                                            <h3>Image 2</h3>
                                            {!! Form::file('image2') !!}

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img alt="300x200" src="{{ URL::asset('images/slider/'.$slider->image3)}} " style="display: block;width: 100%">
                                        <div class="caption">
                                            <h3>Image 3</h3>
                                            {!! Form::file('image3') !!}

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img alt="300x200" src="{{ URL::asset('images/slider/'.$slider->image4)}} " style="display: block;width: 100%">
                                        <div class="caption">
                                            <h3>Image 4</h3>
                                            {!! Form::file('image4') !!}

                                        </div>
                                    </div>
                                </div>

                                </div>

                            </div>

                            <div class="divider"><i class="icon-circle"></i></div>

                        </div>


                        <div class="col-md-10" style="float:left;overflow: hidden;" >

                            <div class="col-md-6" style="float: left" >
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Update Slider') }}
                                </button>
                            </div>
                            {!! Form::close() !!}

                                <div class="col-md-6" style="float: left" >
                                        {!! Form::open([ "method"=>"DELETE", 'route' => ['slider.destroy', $slider->id]]) !!}
                                        {!! Form::submit('Delete Item' , ["class"=>"btn btn-danger btn-block"]) !!}
                                        {!! Form::close() !!}
                                </div>
                        </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection