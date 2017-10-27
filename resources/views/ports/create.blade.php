@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Create port
@endsection

@section('contentheader_title')

@endsection

@section('main-content')
    @include('alerts.messages')
    {!! Form::open(['route'=>'ports.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}

    @include('ports.partials.inputs', ['shipper' => $shipper])

    <br>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
    <a href="{{ url()->previous() }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}
@endsection
