{!! Form::open(['route'=>'inlandscharges.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
<div class="row">
  <div class="col-md-3 col-sm-8{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="demurrage_lbl" class="control-label">Type*</label>
    {!! Form::select('type',
    [0 => 'Selecciona una opción','Rail + truck' => 'Rail + truck', 'All truck' => 'All truck','Rail ramp' => 'Rail ramp'],
    $inlands ? $inlands->type : null,
    ['class'=>'form-control', 'required']) !!}
  </div>
  <div class="col-md-3 col-sm-8{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="demurrage_lbl" class="control-label">Container*</label>
    {!! Form::select('container',
    [0 => 'Selecciona una opción','20 GP' => '20 GP', '40 GP' => '40 GP','40 HC' => '40 HC'],
    $inlands ? $inlands->container : null,
    ['class'=>'form-control', 'required']) !!}
  </div>
</div>
<div class="row">
  <div class="col-md-4 col-sm-12{{ $errors->has('type') ? ' has-error' : '' }}">
      <label for="type_lbl" class="control-label">Discharge Port*:</label>
          {{ Form::select('dischargeport_id', [0=>'Seleccionar una opción',$port], null, ['class'=>'form-control']) }}
  </div>
  <div class="col-md-4 col-sm-12{{ $errors->has('type') ? ' has-error' : '' }}">
      <label for="type_lbl" class="control-label">Delivery*:</label>
          {{ Form::select('delivery_id', ['0'=>'Seleccionar una opción',$port], null, ['class'=>'form-control']) }}
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-4 col-sm-12{{ $errors->has('currency') ? ' has-error' : '' }}">
      <label for="currency_lbl" class="control-label">Currency*:</label>
      {!! Form::select('currency',
      [''],
      $inlands ? $inlands->currency : null,
      ['class'=>'form-control', 'required','id' => 'currency_id']) !!}
  </div>
</div>
<br>
<div class="row">
    <div class="col-sm-1">Range*</div>
  <div class="col-sm-2">{!! Form::text('rangeup',$inlands ? $inlands->rangeup : old('rangeup'),['class'=>'form-control', 'required']) !!}</div>
  <div class="col-sm-1">to</div>
  <div class="col-sm-2">{!! Form::text('rangeto',$inlands ? $inlands->rangeto : old('rangeto'),['class'=>'form-control', 'required']) !!}</div>
  <div class="col-sm-1">Tons</div>
</div>
<div class="row">
  <div class="col-md-3 col-sm-8{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="demurrage_lbl" class="control-label">Cost USD*</label>
    {!! Form::text('cost',$inlands ? $inlands->cost : old('cost'),['class'=>'form-control', 'required']) !!}
  </div>
</div><br>
<div class="row">

  <div class="col-md-4 col-sm-8{{ $errors->has('name') ? ' has-error' : '' }}">
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
  </div>
</div>
<br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
    <table class="table table-bordered table-hover" id="rail-truck-table">
        <thead>
          <tr>
              <th>Type</th>
              <th>Place</th>
              <th>Currency</th>
              <th>Container</th>
              <th>Range</th>
              <th>Cost</th>
              <th width="210px;">Actions</th>
          </tr>
        </thead>
    </table>
  </div>
</div>
<br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
    <table class="table table-bordered table-hover" id="rail-truck-table">
        <thead>
          <tr>
              <th>Place</th>
              <th>Currency</th>
              <th>Container</th>
              <th>Range</th>
              <th>Cost</th>
              <th width="210px;">Actions</th>
          </tr>
        </thead>
    </table>
  </div>
</div>
<br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
    <table class="table table-bordered table-hover" id="rail-truck-table">
        <thead>
          <tr>
              <th>Place</th>
              <th>Currency</th>
              <th>Container</th>
              <th>Range</th>
              <th>Cost</th>
              <th width="210px;">Actions</th>
          </tr>
        </thead>
    </table>
  </div>
</div>
{!! Form::close() !!}
@include('inlandscharges.partials.script')
