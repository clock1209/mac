@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Concepts
@endsection
@section('contentheader_title')
    Concepts
@endsection

@section('main-content')
Name*
  <input id="name_concept" placeholder="Concept Name"> </input>
    <a class="btn btn-success" onclick="Add()"><b>+ Add </b></a>
    <br><br>
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="concepts-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th width="100px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('concepts.partials.script')

@endsection
