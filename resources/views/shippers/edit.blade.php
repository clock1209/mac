@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Edit shipper
@endsection

@section('contentheader_title')
    Edit shipper
@endsection

@section('main-content')
    @include('alerts.messages')
    {!!Form::model($shipper, ['route'=> ['shippers.update',$shipper->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}

        @include('shippers.partials.inputs', ['shipper' => null])

        <br>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
        <a href="{{ route('shippers.index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}

    @include('shippers.partials.script')
@endsection
