@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Stuff and Unstuff cost
@endsection
@section('contentheader_title')
    Stuff and Unstuff cost
@endsection

@section('main-content')
  
    <a class="btn btn-success" href="{{ route('stuffs.create') }}"><b>+ New concept cost </b></a>
    <br><br>
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="stuff-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Concepts</th>
                    <th>Cost</th>
                    <th>Type</th>
                    <th>Agreed Cost</th>
                    <th>Currency</th>
                    <th width="100px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('stuffs.partials.script')

@endsection
