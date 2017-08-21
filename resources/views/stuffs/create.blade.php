@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Create Stuffs
@endsection

@section('contentheader_title')
    Create Stuffs
@endsection

@section('main-content')
    @include('alerts.messages')
    {!! Form::open(['route'=>'stuffs.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}

    @include('stuffs.partials.inputs', ['stuffs' => null])

    <br>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
    <a href="{{ url()->previous() }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}

    @include('shippers.partials.script')
@endsection
