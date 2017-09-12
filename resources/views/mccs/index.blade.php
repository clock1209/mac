@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Mccs
@endsection
@section('contentheader_title')
  Agree MCC
@endsection

@section('main-content')
@include('alerts.messages')

{!! Form::open(['route'=>'mcc.store', 'method'=>'POST']) !!}
<div class="row">

    <div class="col-md-4">

        <div class="form-group">
            {!! Form::label('name_cost', 'Cost*') !!}
            {!! Form::number('cost', null, ['class' => 'form-control','step' => '0.01']) !!}
        </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
          {!! Form::label('name_currency', 'Currency*') !!}
          {!! Form::text('currency', null, ['class' => 'form-control']) !!}
      </div>
    </div>

</div>
<div class="row">

    <div class="col-md-4">
      <div class="col-md-4">  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Add</button></div>
      <div class="col-md-4">  <a href="{{ route('consolidators.index') }}" class="btn btn-danger"><span class="glyphicon glyphicon--remove-sign"></span> Cancel</a></div>
    </div>

</div>
<br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="mcc-table">
            <thead>
            <tr>
                <th>Cost</th>
                <th>Currency</th>
                <th width="210px;">Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
{!! Form::close() !!}

<br>

    @include('mccs.partials.script')
@endsection
