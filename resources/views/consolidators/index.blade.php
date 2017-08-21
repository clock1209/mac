@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Consolidators
@endsection
@section('contentheader_title')
    Consolidators
@endsection

@section('main-content')
    <a class="btn btn-default" href="{{ route('consolidators.create') }}"><b>New consolidator</b></a>
    <a class="btn btn-default" style="background-color: #9b59b6; color: #fff" href="{{url('stuffs')}}"><b>Stuff and Unstuff cost</b></a>
    <a class="btn btn-default" href="#"><b>Agree MCC</b></a>
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
