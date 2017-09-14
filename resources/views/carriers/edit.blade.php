@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Edit Carrier
@endsection

@section('contentheader_title')
    Edit Carrier
@endsection

@section('main-content')
    @include('alerts.messages')
    {!!Form::model($carriers, ['route'=> ['carriers.update',$carriers->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}

    @include('carriers.partials.inputs')

    <br>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
    <a href="{{ route('carriers.index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}

@endsection
