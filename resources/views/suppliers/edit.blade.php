@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Edit supplier
@endsection

@section('contentheader_title')
    Edit supplier
@endsection

@section('main-content')
    @include('alerts.messages')
    {!!Form::model($supplier, ['route'=> ['suppliers.update',$supplier->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}

    @include('suppliers.partials.inputs', ['supplier' => $supplier])

    <br>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
    <a href="{{ route('suppliers.index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}

    @include('suppliers.partials.script')
@endsection
