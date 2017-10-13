{!! Form::open(['route'=>'overweight.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
{{ Form::hidden('carrier_id', $idCarrier) }}
<div class="row">
  <div class="col-md-3 col-sm-8{{ $errors->has('container') ? ' has-error' : '' }}">
    <label for="demurrage_lbl" class="control-label">Container*</label>
        {!! Form::select('container',[0 => ' ','20 GP' => '20 GP', '40 GP' => '40 GP','40 HC' => '40 HC'],$overweight ? $overweight->container : null,['class'=>'form-control', 'required']) !!}
  </div>
</div>
<br>
<div class="row">
    <div class="col-sm-1">Range*</div>
    <div class="col-sm-2">{!! Form::text('rangeup',$overweight ? $overweight->rangeup : old('rangeup'),['class'=>'form-control', 'required']) !!}</div>
    <div class="col-sm-1">to</div>
    <div class="col-sm-2">{!! Form::text('rangeto',$overweight ? $overweight->rangeto : old('rangeto'),['class'=>'form-control', 'required']) !!}</div>
    <div class="col-sm-1">Tons</div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-8{{ $errors->has('cost_overweight') ? ' has-error' : '' }}">
        <label for="demurrage_lbl" class="control-label">Cost*</label>
            {!! Form::text('cost_overweight',$overweight ? $overweight->cost : old('cost_overweight'),['class'=>'form-control', 'required']) !!}
    </div>
</div><br>
<div class="row">
    <div class="col-md-2 col-sm-12{{ $errors->has('currency') ? ' has-error' : '' }}">
        <label for="currency_lbl" class="control-label">Currency*:</label>
        {!! Form::select('currency',[''],$overweight ? $overweight->currency : old('currency'),['class'=>'form-control', 'required','id' => 'currency']) !!}
    </div>
    <div class="col-md-4 col-sm-12">
        <button type="submit" style="margin-top:25px;" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
    </div>
</div>
<br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="overweight-table">
            <thead>
                <tr>
                    <th width="210px;">Container</th>
                    <th>Currrency</th>
                    <th>Range</th>
                    <th>Cost</th>
                    <th width="210px;">Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
{!! Form::close() !!}
@include('overweight.partials.script')
