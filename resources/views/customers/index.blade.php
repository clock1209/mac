@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Customers
@endsection
@section('contentheader_title')
    Customers
@endsection

@section('main-content')
    <a class="btn btn-default" href="{{ route('customers.create') }}"><b>New Customer</b></a>
    <a class="btn btn-default" href="{{ route('shippers.index') }}"><b>Shippers</b></a><br><br>
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="customers-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Business name</th>
                    <th>RFC/TAX ID</th>
                    <th>Country Code</th>
                    <th>Phone</th>
                    <th>Contact name</th>
                    <th>Contact job</th>
                    <th>E-mail</th>
                    <th width="210px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('customers.partials.script')

@endsection
