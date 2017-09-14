@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Create Carrier Port
@endsection

@section('contentheader_title')
    reate Carrier Port
@endsection

@section('main-content')
    @include('alerts.messages')
    {!! Form::open(['route'=>'carrierport.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}

        @include('carrierport.partials.inputs', ['carrierport' => null])

        <br>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
        <a href="{{ route('carriers.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}


@endsection
