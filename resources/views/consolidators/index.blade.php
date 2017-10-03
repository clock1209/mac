@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Consolidators
@endsection
@section('contentheader_title')
    Consolidators
@endsection

@section('main-content')
    @permission('create_consolidators')
    <a class="btn btn-default" href="{{ route('consolidators.create') }}"><b>New consolidator</b></a>
    @endpermission
    @permission('create_stuff')
    <a class="btn btn-default" style="background-color: #9b59b6; color: #fff" href="{{url('stuffs')}}"><b>Stuff and Unstuff cost</b></a>
    @endpermission
    @permission('create_mcc')
    <a class="btn btn-default" href="{{ route('mcc.index') }}"><b>Agree MCC</b></a>
    @endpermission
    <br />
    <br />
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="consolidators-table">
                <thead>
                <tr>
                    <th>Abbreviation</th>
                    <th>Name</th>
                    <th>Estatus</th>
                    <th width="210px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('consolidators.partials.script')

@endsection
