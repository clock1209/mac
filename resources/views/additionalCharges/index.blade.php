<h4 style=" font-variant: small-caps; text-shadow: 1px 1px 2px gray;">Additional charges</h4>
<div class="form-group">
    <div class="col-md-3 col-sm-12{{ $errors->has('concept') ? ' has-error' : '' }}">
        <label for="concept_lbl" class="input-control">Concept*:</label>
        {!! Form::select('concept', ['Ocean freight', 'BL fee', 'ISPS', 'AMS'], null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3 col-sm-12 {{ $errors->has('collect_prepaid') ? ' has-error' : '' }}">
        <label for="collect_prepaid_lbl" class="input-control">Collect/prepaid*:</label>
        {!! Form::text('collect_prepaid', null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('import_export') ? ' has-error' : '' }}">
        <label for="import_export_lbl" class="input-control">Import/Export*:</label>
        {!! Form::text('import_export', null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('amount') ? ' has-error' : '' }}">
        <label for="amount_lbl" class="input-control">Amount*:</label>
        {!! Form::text('amount', null,['class'=>'form-control', 'required']) !!}
    </div>
</div>{{--form-group--}}
<div class="form-group">
    <div class="col-md-3 col-sm-12{{ $errors->has('currency') ? ' has-error' : '' }}">
        <label for="currency_lbl" class="input-control">Currency*:</label>
        {!! Form::text('currency', null, ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12 {{ $errors->has('last_updated') ? ' has-error' : '' }}">
        <label for="last_updated_lbl" class="input-control">Last updated*:</label>
        {!! Form::date('last_updated', null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('charges_type') ? ' has-error' : '' }}">
        <label for="charges_type_lbl" class="input-control">Reference*:</label>
        {!! Form::select('charges_type', ['BL', 'Container', 'Others'], null, ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('charge') ? ' has-error' : '' }}">
        <label for="charge_lbl" class="input-control">Charge*:</label>
        {!! Form::select('charge', ['ETD', 'Gate in', 'ATD/On board'], null, ['class'=>'form-control', 'required']) !!}
    </div>
</div>{{--form-group--}}
<div class="form-group">
    <div class="col-md-6 col-sm-12{{ $errors->has('notes') ? ' has-error' : '' }}">
        <label for="notes_lbl" class="input-control">Notes*:</label>
        {!! Form::textarea('notes', null, ['class'=>'form-control', 'rows'=>'3', 'required']) !!}
    </div>
</div>{{--form-group--}}
<a href="#" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add</a><br><br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="additional-charges-table">
            <thead>
            <tr>
                <th>Concept</th>
                <th>Collect/prepaid</th>
                <th>Import/Export</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Last updated</th>
                <th>Charge type</th>
                <th>Charge</th>
                <th>Notes</th>
                <th width="210px;">Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</div>