@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Ports by shippers
@endsection
@section('contentheader_title')
    Ports by shippers
@endsection

@section('main-content')
    <a class="btn btn-default" href="{{ route('ports.create',['id' => $shipper->id]) }}"><b>New Port</b></a><br><br>
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="ports-table">
                <thead>
                <tr>
                    <th>Port</th>
                    <th>Shipper</th>
                    <th>Estatus</th>
                    <th width="210px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('ports.partials.script')

@endsection
