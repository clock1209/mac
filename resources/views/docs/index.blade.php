@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Docs
@endsection
@section('contentheader_title')
    Docs
@endsection

@section('main-content')
@include('alerts.messages')

<div class="row">
    <div class="col-md-5">
        <h1 class="text-primary" style="text-align: center;">Upload Documents</h1>
    </div>
</div>
<div class="row">
  {!!  Form::open(array('url' => '/docs','files'=>'true')) !!}
    <div class="col-md-5">

        <div class="form-group">
            {!! Form::label('name_doc', 'Name*') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            {!! Form::file('doc') !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add', ['class' => 'btn btn-success', 'id' => 'submitBtn', 'style' => 'margin-bottom: 10px;']) !!}
        </div>
    </div>
  {!! Form::close() !!}
</div>
<br>
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="docs-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Doc</th>
                    <th width="210px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('docs.partials.script')
@endsection
