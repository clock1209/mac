@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Edit consolidator
@endsection

@section('contentheader_title')
    Edit consolidator
@endsection

@section('main-content')
    @include('alerts.messages')
    {!!Form::model($consolidator, ['route'=> ['consolidators.update',$consolidator->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}

    @include('consolidators.partials.inputs')

    <br>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
    <a href="{{ route('consolidators.index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}

@endsection
