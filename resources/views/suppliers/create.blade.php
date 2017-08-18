@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Create supplier
@endsection

@section('contentheader_title')
    Create supplier
@endsection

@section('main-content')
    @include('alerts.messages')
    {!! Form::open(['route'=>'suppliers.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}

    @include('suppliers.partials.inputs', ['supplier' => null])

    <br>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
    <a href="{{ url()->previous() }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}

    @include('suppliers.partials.script')
@endsection
