@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Edit Customer
@endsection

@section('contentheader_title')
    Edit Customer
@endsection

@section('main-content')
    @include('alerts.messages')
    {!! Form::model($customer,['route' => ['customers.update',$customer->id], 'method' => 'PUT','class' =>'form-horizontal' ]) !!}


    @include('customers.partials.inputs', ['customer' => $customer])

    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            <a href="{{ url('/customers') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
        </div>
    </div>
    {!! Form::close() !!}

    @include('customers.partials.script')
@endsection
