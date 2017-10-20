@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Add concepts
@endsection

@section('contentheader_title')
    Add concepts
@endsection

@section('main-content')
    @include('alerts.messages')
    {!! Form::open(['route'=>'stuffs.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
        @include('stuffs.partials.inputs', ['stuff' => null])
        <br>
        <button type="submit" id="btn_save" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
        <a href="{{ url()->previous() }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}
    @include('stuffs.partials.script')
@endsection
