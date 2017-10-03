@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Docs Suppliers
@endsection
@section('contentheader_title')
    Docs Suppliers
@endsection

@section('main-content')
@include('alerts.messages')

<div class="row">
    <div class="col-md-5">
        <h1 class="text-primary" style="text-align: center;">Upload Documents</h1>
    </div>
</div>
<div class="row">

  {!!  Form::open(array('url' => '/docssupplier','files'=>'true')) !!}
    <div class="col-md-10">
      <div class="form-group">
        <div class="col-md-3 col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name_lbl" class="control-label">Name*:</label>
          {!! Form::text('name',$docssupplier ? $docssupplier->name : old('name'),['class'=>'form-control', 'required']) !!}
        </div>
        <div class="col-md-3 col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name_lbl" class="control-label">Reference Number*:</label>
          {!! Form::text('reference_number',$docssupplier ? $docssupplier->reference_number : old('reference_number'),['class'=>'form-control', 'required']) !!}
        </div>
          <div class="col-md-3 col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name_lbl" class="control-label">Bill*:</label>
              {!! Form::text('bill',$docssupplier ? $docssupplier->bill : old('bill'),['class'=>'form-control', 'required']) !!}
          </div>
          <div class="col-md-3 col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name_lbl" class="control-label">Bank account*:</label>
              {!! Form::text('bank_account',$docssupplier ? $docssupplier->bank_account : old('bank_account'),['class'=>'form-control', 'required']) !!}
          </div>
      </div>
        {{ Form::hidden('supplier_id', 'null', array('id' => 'supplier_id')) }}
    </div>
  <div class="col-md-10">
    <div class="form-group">
      <div class="col-md-3 col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="concept_lbl" class="control-label">Concept*:</label>
        {!! Form::select('concept_id', $concepts , 0, ['class'=>'form-control']) !!}
      </div>
      <div class="col-md-3 col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="name_lbl" class="control-label">Cost*:</label>
        {!! Form::text('cost',$docssupplier ? $docssupplier->cost : old('cost'),['class'=>'form-control', 'required']) !!}
      </div>
      <div class="col-md-3 col-sm-12{{ $errors->has('doc') ? ' has-error' : '' }}">
          <label for="name_lbl" class="control-label">Seleccionar archivo*:</label>
          {!! Form::file('doc') !!}
      </div>
      <br><br><br>
      <div class="col-md-3 col-sm-12">
            {!! Form::submit('Add', ['class' => 'btn btn-success', 'id' => 'submitBtn', 'style' => 'margin-top: 15px;']) !!}
      </div>

    </div>
  </div>
  {!! Form::close() !!}
</div>
<br>
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="docsSuppliers-table">
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
    @include('docsSuppliers.partials.script')
@endsection
