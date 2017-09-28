@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Concepts
@endsection
@section('contentheader_title')
    Concepts
@endsection
@section('main-content')
@include('alerts.messages')
{!! Form::open(['route'=>'concepts.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
@permission('create_concepts')
<div class="row">
  <div class="col-md-9">
    Name*
  </div>
  <div class="col-md-4">
    {!! Form::text('name','',['class'=>'form-control']) !!}
  </div>
  <div class="col-md-4">  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Add</button>
    </div>
</div>
@endpermission
<br>
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
{!! Form::close() !!}


@include('concepts.partials.script')

@endsection
