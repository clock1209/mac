@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Edit Carrier Port
@endsection

@section('contentheader_title')
    Edit Carrier Port
@endsection

@section('main-content')
    @include('alerts.messages')
    {!!Form::model($carrierport, ['route'=> ['carrierport.update',$carrierport->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}

    @include('carrierport.partials.inputs', ['carrierport' => $carrierport])

    <br>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
    <a href="{{ route('carriers.index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}
    @include('carrierport.partials.script')
@endsection
