@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Edit concepts
@endsection

@section('contentheader_title')
    Edit concepts
@endsection

@section('main-content')
    @include('alerts.messages')
    {!!Form::model($stuff, ['route'=> ['stuffs.update',$stuff->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}

    @include('stuffs.partials.inputs')

    <br>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
    <a href="{{ URL::previous() }}"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}

    @include('stuffs.partials.script')
@endsection
