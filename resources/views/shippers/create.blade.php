@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Create shipper
@endsection

@section('contentheader_title')
    Create shipper
@endsection

@section('main-content')
    @include('alerts.messages')
    {!! Form::open(['route'=>'shippers.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}

    @include('shippers.partials.inputs', ['shipper' => null])

    <br>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
    <a href="{{ route('shippers.index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}

    @include('shippers.partials.script')
@endsection
