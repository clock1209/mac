{!! Form::model($inlands,['route' => ['inlandscharges.update',$inlands->id], 'method' => 'PUT','class' =>'form-horizontal' ]) !!}
<div class="row">
    <div class="col-md-3 col-sm-8{{ $errors->has('type') ? ' has-error' : '' }}">
        <label for="demurrage_lbl" class="control-label">Type*</label>
        {!! Form::select('type',[0 => ' ','Rail & truck' => 'Rail & truck', 'All truck' => 'All truck','Rail ramp' => 'Rail ramp'],$inlands ? $inlands->type : null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-8{{ $errors->has('container') ? ' has-error' : '' }}">
        <label for="demurrage_lbl" class="control-label">Container*</label>
        {!! Form::select('container',[0 => ' ','20 GP' => '20 GP', '40 GP' => '40 GP','40 HC' => '40 HC'],$inlands ? $inlands->container : null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-4 col-sm-12{{ $errors->has('currency') ? ' has-error' : '' }}">
        <label for="currency_lbl" class="control-label">Currency*:</label>
        {!! Form::select('currency',[''],$inlands ? $inlands->currency : null,['class'=>'form-control', 'required','id' => 'currency_id']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-md-offset-0 col-sm-12">
        <label for="city_lbl" class="control-label">Country*:</label><br>
        {!! Form::select('discharge_country_ports_id', $country_port , null,
            ['class'=>'form-control', 'id' => 'discharge_country_ports_id','placeholder' => ' ']) !!}
    </div>
    <div class="col-md-4 col-sm-12{{ $errors->has('dischargeport_id') ? ' has-error' : '' }}">
        <label for="type_lbl" class="control-label">Discharge Port*:</label>
        {{ Form::select('dischargeport_id', $port_discharge, null, ['class'=>'form-control','id'=>'dischargeport_id']) }}
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-3 col-md-offset-0 col-sm-12">
        <label for="city_lbl" class="control-label">Country*:</label><br>
        {!! Form::select('delivery_country_ports_id', $country_port , null,
            ['class'=>'form-control', 'id' => 'delivery_country_ports_id','placeholder' => ' ']) !!}
    </div>
    <div class="col-md-4 col-sm-12{{ $errors->has('delivery_id') ? ' has-error' : '' }}">
        <label for="type_lbl" class="control-label">Delivery*:</label>
        {{ Form::select('delivery_id', $port_delivery, null, ['class'=>'form-control','id'=>'delivery_id']) }}
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
    <div class="col-md-3 col-sm-8{{ $errors->has('cost') ? ' has-error' : '' }}">
        <label for="demurrage_lbl" class="control-label">Cost</label>
        {!! Form::text('cost',$inlands ? $inlands->cost : old('cost'),['class'=>'form-control', 'required']) !!}
    </div>
</div><br>
<div class="row">
    <div class="col-md-4 col-sm-8">
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
        <a type="button" href="{{ URL::previous() }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a>
   </div>
</div>
{!! Form::close() !!}
<h4 class="n-caption">Rail & Truck</h4>
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
<h4 class="n-caption">All Truck</h4>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="all-truck-table">
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
<h4 class="n-caption">Rail ramp</h4>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="rail-ramp-table">
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
@include('inlandscharges.partials.script')
