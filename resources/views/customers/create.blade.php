@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Create supplier
@endsection

@section('contentheader_title')
    Create Supplier
@endsection

@section('main-content')
    @include('alerts.messages')
    {!! Form::open(['route' => 'customers.store', 'method' => 'post','class' =>'form-horizontal' ]) !!}


    @include('customers.partials.inputs')

    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            <a href="{{ url('/customers') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
