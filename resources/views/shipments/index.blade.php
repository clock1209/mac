@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Shipments
@endsection
@section('contentheader_title')
    Shipments
@endsection

@section('main-content')
    <a class="btn btn-default" href="{{ route('shipments.create') }}"><b>New Shipment</b></a>
    <a class="btn btn-success">Export</a> <br><br>
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="shipments-table">
                <thead>
                <tr>
                    <th width="20px;">Reference number</th>
                    <th>Consignee</th>
                    <th>ETD</th>
                    <th>ATD</th>
                    <th>ETA</th>
                    <th>Final Arrived</th>
                    <th>Booking no.</th>
                    <th>Status</th>
                    <th>Released to AA</th>
                    <th width="220px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('shipments.partials.script')

@endsection
