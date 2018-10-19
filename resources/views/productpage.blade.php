@extends('layouts.app')

@section('content')


    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>

    @endif



    {{--{!! Form::open(['method' => 'post' , 'action' =>['rateController@setRate' ,$productID=67 ]] )  !!}--}}


    {{--{!! Form::label('rate', 'Add Rate'); !!}--}}

    {{--{!! Form::number('rate', 0); !!}--}}
    {{--{!! Form::submit('Add Rate!'); !!}--}}


    {{--{!! Form::close() !!}--}}

    {!! Form::open(['method' => 'post' , 'action' =>['reviewController@setRate' ,$productID=67 ]] )  !!}


    {!! Form::label('review', 'Add Review'); !!}

    {!! Form::text('review',null, ['placeholder'=>'add review']); !!}
    {!! Form::submit('Add Review !'); !!}


    {!! Form::close() !!}

    @endsection

