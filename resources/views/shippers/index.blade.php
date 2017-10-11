@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Shippers by customers
@endsection
@section('contentheader_title')
    Shippers by customers
@endsection

@section('main-content')
@include('alerts.messages')
    <a class="btn btn-default" href="{{ route('shippers.create') }}?id={{$customers_id}}"><b>New Shipper</b></a><br><br>
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="shippers-table">
                <thead>
                <tr>
                    <th>Tradename</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Business name</th>
                    <th width="210px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('shippers.partials.script')

@endsection
