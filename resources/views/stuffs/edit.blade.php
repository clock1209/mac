@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Edit Stuffs
@endsection

@section('contentheader_title')
    Edit Stuffs
@endsection

@section('main-content')
    @include('alerts.messages')
    {!!Form::model($stuff, ['route'=> ['stuffs.update',$stuff->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}

    @include('stuffs.partials.inputs')

    <br>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
    <a href="{{ route('stuffs.index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}

@endsection
