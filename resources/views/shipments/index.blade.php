@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Shipments
@endsection
@section('contentheader_title')
    Shipments
@endsection

{{--@include('role.partials.header')--}}

@section('main-content')
    <a class="btn btn-default" href="{{ route('shipments.create') }}"><b>New Shipment</b></a>
    <a class="btn btn-success">Export</a> <br><br>
    <div class="box box-solid box-primary">
        {{--<div class="box-header with-border">--}}
            {{--<h3 class="box-title">Shipments</h3>--}}
            {{--<div class="box-tools pull-right">--}}
                {{--<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">--}}
                    {{--<i class="fa fa-minus"></i></button>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="box-body" style="overflow-x: auto;">
            <table class="table table-bordered table-hover" id="shipments-table">
                <thead>
                <tr>
                    <th>Reference number</th>
                    <th>Consignee</th>
                    {{--<th>Origin</th>--}}
                    <th>ETD</th>
                    <th>ATD</th>
                    <th>ETA</th>
                    <th>Final Arrived</th>
                    <th>Booking no.</th>
                    <th>Status</th>
                    <th>Released to AA</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    {{--@include('shipments.partials.script')--}}

    @push('scripts')
    <script>
        var dTable = $("#shipments-table").DataTable({
            ajax: '/shipments',
            columns: [
                {data: 'reference_number'},
                {data: 'consignee'},
//                {data: 'origin'},
                {data: 'etd'},
                {data: 'atd'},
                {data: 'eta'},
                {data: 'final_arrived'},
                {data: 'booking_no'},
                {data: 'status'},
                {data: 'released_to_aa'},
                {data: 'action', name: 'action', orderable: false, serchable: false,  bSearchable: false},
            ],
        });
    </script>
    @endpush

@endsection
