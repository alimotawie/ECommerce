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
                        {!! Form::open([ "method"=>"Put",'files'=>true,'route' => ['product.update', $product->id] , 'id'=>"productform" ]) !!}

                        <div class="form-group row">
                            <h4>Edit Product</h4>

                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img alt="300x200" src="{{ URL::asset('products/images/'.$product->logo)}} " style="display: block; width: 100%;">
                                        <div class="caption">
                                            <h3>Logo</h3>
                                            {!! Form::file('logo') !!}

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img alt="300x200" src="{{ URL::asset('products/images/'.$product->image1)}} " style="display: block;width: 100%">
                                        <div class="caption">
                                            <h3>Image 1</h3>
                                            {!! Form::file('image1') !!}

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img alt="300x200" src="{{ URL::asset('products/images/'.$product->image2)}} " style="display: block;width: 100%">
                                        <div class="caption">
                                            <h3>Image 2</h3>
                                            {!! Form::file('image2') !!}

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="divider"><i class="icon-circle"></i></div>

                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" maxlength="25" class="form-control" name="name" value="{{$product->name}}"  required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Product Brand') }}</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control" name="brand" value="{{$product->brand}}" required >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Product Description') }}</label>

                            <div class="col-md-6">

                                <textarea form ="productform" name="description" id="description" cols="40" wrap="soft" class="form-control"   required > {{ $product->description }}</textarea>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Product Category') }}</label>

                            <div class="col-md-6">
                                {!! Form::select('category', ['tank' => 'Tank', 'mod' => 'Mod' , 'coil'=>'Coil' , 'liquid'=>'Liquid' , 'battery'=>'Battery', 'accessories'=>'Accessories' ], $product->category, ['placeholder' => 'Pick a Category...' ,'required']); !!}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Product Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" value="{{ $product->price}}" required min="1" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock Level') }}</label>

                            <div class="col-md-6">
                                <input id="stock" type="number" class="form-control" name="stock" value="{{ $product->stock}}"  required min="0" >

                            </div>
                        </div>

                        <div class="col-md-10" style="float:left;overflow: hidden;" >

                            <div class="col-md-6" style="float: left" >
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Update Product') }}
                                </button>
                            </div>
                            {!! Form::close() !!}

                                <div class="col-md-6" style="float: left" >
                                        {!! Form::open([ "method"=>"DELETE", 'route' => ['product.destroy', $product->id]]) !!}
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