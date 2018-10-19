@extends('layouts.header-footer')
@section('title', 'Add new item')

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

                    <h4 class="card-header topmargin-sm">{{ __('Add new item') }}</h4>

                    <div class="card-body">
                        {!! Form::open([ "method"=>"POST", 'url' =>'/product' , 'id'=>"productform" ,'files'=>true ]) !!}

                        <div class="form-group row">

                            <label for="image1" class="col-md-4 col-form-label text-md-right">{{ __('Brand Logo ') }}</label>
                            <div class="col-md-6">
                                {!! Form::file('logo' , ['class'=>'btn btn-primary','required']) !!}
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="image2" class="col-md-4 col-form-label text-md-right">{{ __('Item Image 1 ') }}</label>
                            <div class="col-md-6">
                                {!! Form::file('image1',  ['class'=>'btn btn-primary' , 'required'] ) !!}
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="image3" class="col-md-4 col-form-label text-md-right">{{ __('Item Image 2 ') }}</label>
                            <div class="col-md-6">
                                {!! Form::file('image2',  ['class'=>'btn btn-primary','required'] ) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"  required autofocus>

                                </div>
                            </div>

                                <div class="form-group row">
                                    <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Product Brand') }}</label>

                                    <div class="col-md-6">
                                        <input id="brand" type="text" class="form-control" name="brand"  required >

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Product Description') }}</label>

                                    <div class="col-md-6">

                                        <textarea form ="productform" name="description" id="description" cols="40" wrap="soft" class="form-control"   required ></textarea>

                                    </div>
                                </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Product Category') }}</label>

                            <div class="col-md-6">
                                {!! Form::select('category', ['tank' => 'Tank', 'mod' => 'Mod' , 'coil'=>'Coil' , 'liquid'=>'Liquid' , 'battery'=>'Battery', 'accessories'=>'Accessories' ], null, ['placeholder' => 'Pick a Category...' ,'required']); !!}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Product Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price"  required min="1" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock Level') }}</label>

                            <div class="col-md-6">
                                <input id="stock" type="number" class="form-control" name="stock"  required min="0" >

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add product') }}
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