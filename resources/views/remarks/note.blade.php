<h3>NOTE:</h3>
<div class="row">
    {{ Form::open(['route'=>'remarks.store', 'method'=>'POST', 'class' => 'form-horizontal']) }}
    {{ Form::hidden('carrier_id', $idCarrier) }}
        <div class="col-md-3 col-sm-8{{ $errors->has('note') ? ' has-error' : '' }}">
            {{ Form::textarea('note', null, ['size' => '40x8']) }}
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Add</button>
        </div>
    {{ Form::close() }}
    {{ Form::open(['route'=>'conditions.store', 'method'=>'POST', 'class' => 'form-horizontal']) }}
    {{ Form::hidden('carrier_id', $idCarrier) }}
        <div class="col-md-4 col-sm-8" style="background: rgba(128, 128, 128, 0.14); padding: 15px;
        border-radius: 15px; margin-left: 30px;">
            <h3 class="text-center">Conditions:</h3>
            <div class="row">
                <div class="col-md-8 text-right">
                    <label for="demurrage_lbl" class="control-label">Free demurrage at destinations</label>
                    {{ Form::text('free_demurrage', '',array('class' => 'field')) }}
                    Days.
                </div>
                <div class="col-md-8 text-right">
                    <label for="demurrage_lbl" class="control-label">One day after ETA</label>
                    {{ Form::checkbox('after_eta',0, old('after_eta'),['class'=>'field']) }}
                </div>
                <div class="col-md-8 text-right">
                    <label for="demurrage_lbl" class="control-label">ETA day</label>
                    {{ Form::checkbox('eta_day',0, old('eta_day'),['class'=>'field']) }}
                </div>
                <div class="col-md-8 text-right">
                    <label for="demurrage_lbl" class="control-label">Operation completed</label>
                    {{ Form::checkbox('operation',0, old('operation'),['class'=>'field']) }}
                </div>
                <div class="col-md-8 text-right">
                    <label for="demurrage_lbl" class="control-label">Price per day</label>
                    {{ Form::text('price_day', '',array('class' => 'field')) }}
                </div>
            </div>
            <div class="pull-right">
                <button style="" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            </div>
        </div>
        <div class="col-md-4 col-sm-8" style="background: rgba(128, 128, 128, 0.14); padding: 15px;
            border-radius: 15px; margin-left: 30px;">
            <div class="row">
                <h3 class="text-center">Type demurrage:</h3>
                <div class="col-md-8">
                    {{ Form::radio('type_demurrage',0, old('demurrage'),['class'=>'field', 'required']) }}
                    <label for="demurrage_lbl" class="control-label">One clock</label>
                </div>
                <div class="col-md-8">
                    {{ Form::radio('type_demurrage',1, old('demurrage'),['class'=>'field', 'required']) }}
                    <label for="demurrage_lbl" class="control-label">Demurrage and detentions</label>
                </div>
            </div>
        </div>
    {{ Form::close() }}
</div>
<h4 class="n-caption">Notes</h4>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="note-table">
            <thead>
                <tr>
                    <th>#</th>
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
                    <th>#</th>
                    <th>Free demurrage at destinations</th>
                    <th>One day after ETA</th>
                    <th>ETA day</th>
                    <th>Operation completed</th>
                    <th>Price per day</th>
                    <th width="210px;">Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
<a href="{{ url()->previous(2) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
@include('remarks.partials.script')
@include('remarks.partials.editModal')
@include('remarks.partials.editModalCondition')
