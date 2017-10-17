{!! Form::open(['route'=>'remarks.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
{{ Form::hidden('carrier_id', $idCarrier) }}
<h3>NOTE:</h3>
<br>
<div class="form-group">
    <div class="col-md-3 col-sm-8{{ $errors->has('name') ? ' has-error' : '' }}">
        {{ Form::textarea('note', null, ['size' => '40x8']) }}
    </div>
    <div class="col-md-4 col-sm-8" style="background: rgba(128, 128, 128, 0.14); padding: 15px;
    border-radius: 15px; margin-left: 30px;">
        <h3 class="text-center">Conditions:</h3>
        <div class="row">
            <div class="col-md-8 text-right">
                <label for="demurrage_lbl" class="control-label">Free demurrage at destinations</label>
                {{ Form::text('valueConditionOne', '',array('class' => 'field')) }}
                Days.
            </div>
            <div class="col-md-8 text-right">
                <label for="demurrage_lbl" class="control-label">One day after ETA</label>
                {{ Form::radio('nameconditions','One day after ETA', old('price'),['class'=>'field']) }}
            </div>
            <div class="col-md-8 text-right">
                <label for="demurrage_lbl" class="control-label">ETA day</label>
                {{ Form::radio('nameconditions','ETA day', old('price'),['class'=>'field']) }}
            </div>
            <div class="col-md-8 text-right">
                <label for="demurrage_lbl" class="control-label">Operation completed</label>
                {{ Form::radio('nameconditions','Operation completed', old('price'),['class'=>'field']) }}
            </div>
            <div class="col-md-8 text-right">
                <label for="demurrage_lbl" class="control-label">Price per day</label>
                {{ Form::text('valueConditionTwo', '',array('class' => 'field')) }}
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-8" style="background: rgba(128, 128, 128, 0.14); padding: 15px;
        border-radius: 15px; margin-left: 30px;">
        <div class="row">
            <h3 class="text-center">Type demurrage:</h3>
            <div class="col-md-8">
                {{ Form::radio('demurrage','One clock', old('price'),['class'=>'field', 'required']) }}
                <label for="demurrage_lbl" class="control-label">One clock</label>
            </div>
            <div class="col-md-8">
                {{ Form::radio('demurrage','Demurrage and detentions', old('price'),['class'=>'field', 'required']) }}
                <label for="demurrage_lbl" class="control-label">Demurrage and detentions</label>
            </div>
        </div>
    </div>
</div>
<h4 class="n-caption">Notes</h4>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="note-table">
            <thead>
                <tr>
                    <th width="210px;">#</th>
                    <th>Description</th>
                    <th width="210px;">Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<h4 class="n-caption">Conditions</h4>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="condition-table">
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
<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
<a href="{{ url()->previous(2) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
{!! Form::close() !!}
@include('remarks.partials.script')
