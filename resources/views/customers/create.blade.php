@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Create Customer
@endsection

@section('contentheader_title')
    Create Customer
@endsection

@section('main-content')
    @include('alerts.messages')
    {!! Form::open(['route' => 'customers.store', 'method' => 'post','class' =>'form-horizontal' ]) !!}


    @include('customers.partials.inputs', ['customer' => null])

    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            <a href="{{ url('CustomersBrokersDelete') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
        </div>
    </div>
    {!! Form::close() !!}

    @include('customers.partials.script')
@endsection
