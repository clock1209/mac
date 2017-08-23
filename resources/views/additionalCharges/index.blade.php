<div id="ac-form">
    <h4 style=" font-variant: small-caps; text-shadow: 1px 1px 2px gray;">Additional charges</h4>
    <div class="form-group">
        <div class="col-md-3 col-sm-12{{ $errors->has('concept') ? ' has-error' : '' }}">
            <label for="concept_lbl" class="control-label">Concept*:</label>
            {!! Form::select('concept', ['Ocean freight' => 'Ocean freight', 'BL fee' => 'BL fee', 'ISPS' => 'ISPS',
                'AMS' => 'AMS'], null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12 {{ $errors->has('collect_prepaid') ? ' has-error' : '' }}">
            <label for="collect_prepaid_lbl" class="control-label">Collect/prepaid*:</label>
            {!! Form::text('collect_prepaid', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12{{ $errors->has('import_export') ? ' has-error' : '' }}">
            <label for="import_export_lbl" class="control-label">Import/Export*:</label>
            {!! Form::text('import_export', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12{{ $errors->has('amount') ? ' has-error' : '' }}">
            <label for="amount_lbl" class="control-label">Amount*:</label>
            {!! Form::number('amount', null,['class'=>'form-control']) !!}
        </div>
    </div>{{--form-group--}}
    <div class="form-group">
        <div class="col-md-3 col-sm-12{{ $errors->has('currency') ? ' has-error' : '' }}">
            <label for="currency_lbl" class="control-label">Currency*:</label>
            {!! Form::select('currency', ['currency'], null,['class'=>'form-control', 'id' => 'currency-ac']) !!}
        </div>
        <div class="col-md-3 col-sm-12 {{ $errors->has('last_updated') ? ' has-error' : '' }}">
            <label for="last_updated_lbl" class="control-label">Last updated*:</label>
            {!! Form::date('last_updated', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12{{ $errors->has('charge_type') ? ' has-error' : '' }}">
            <label for="charge_type_lbl" class="control-label">Charge type*:</label>
            {!! Form::select('charge_type', ['BL' => 'BL', 'Container' => 'Container', 'Others' => 'Others'], null,
                    ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12{{ $errors->has('charge') ? ' has-error' : '' }}">
            <label for="charge_lbl" class="control-label">Charge*:</label>
            {!! Form::select('charge', ['ETD' => 'ETD', 'Gate in' => 'Gate in', 'ATD/On board' => 'ATD/On board'], null, ['class'=>'form-control']) !!}
        </div>
    </div>{{--form-group--}}
    <div class="form-group">
        <div class="col-md-6 col-sm-12{{ $errors->has('notes') ? ' has-error' : '' }}">
            <label for="notes_lbl" class="control-label">Notes*:</label>
            {!! Form::textarea('notes', null, ['class'=>'form-control', 'rows'=>'3']) !!}
        </div>
    </div>{{--form-group--}}
</div>{{--ac-form--}}
<span class="btn btn-success" id="btn-additional-charge"><span class="glyphicon glyphicon-plus"></span> Add</span><br><br>
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

@include('additionalCharges.partials.script')