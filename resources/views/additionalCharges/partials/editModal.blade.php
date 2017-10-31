

<div class="modal fade" id="additionalCharge_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-title">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4>Edit additional charge</h4>
            </div>
            <div class="modal-body">
                <div id="ac-form">
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12{{ $errors->has('concept') ? ' has-error' : '' }}">
                            <label for="concept_lbl" class="control-label">Concept*:</label>
                            {!! Form::select('concept', $concepts, null, ['class'=>'form-control', 'id' => 'mdl_concept']) !!}
                        </div>
                        <div class="col-md-12 col-sm-12 {{ $errors->has('collect_prepaid') ? ' has-error' : '' }}">
                            <label for="collect_prepaid_lbl" class="control-label">Collect/prepaid*:</label>
                            {!! Form::select('collect_prepaid', ['Collect' => 'Collect', 'Prepaid' => 'Prepaid'], null,
                                ['class'=>'form-control', 'id' => 'mdl_collect_prepaid']) !!}
                        </div>
                        <div class="col-md-12 col-sm-12{{ $errors->has('import_export') ? ' has-error' : '' }}">
                            <label for="import_export_lbl" class="control-label">Import/Export*:</label>
                            {!! Form::select('import_export', ['Import' => 'Import', 'Export' => 'Export'], null,
                                ['class'=>'form-control', 'id' => 'mdl_import_export']) !!}
                        </div>
                        <div class="col-md-12 col-sm-12{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount_lbl" class="control-label">Amount*:</label>
                            {!! Form::number('amount', null,['class'=>'form-control', 'id' => 'mdl_amount']) !!}
                        </div>
                    </div>{{--form-group--}}
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12{{ $errors->has('currency') ? ' has-error' : '' }}">
                            <label for="currency_lbl" class="control-label">Currency*:</label><br>
                            {!! Form::select('currency', ['currency'], null,['class'=>'form-control', 'id' => 'mdl_currency-ac']) !!}
                        </div>
                        <div class="col-md-12 col-sm-12 {{ $errors->has('last_updated') ? ' has-error' : '' }}">
                            <label for="last_updated_lbl" class="control-label">Last updated*:</label>
                            {!! Form::date('last_updated', \Carbon\Carbon::now(), ['class'=>'form-control', 'id' => 'mdl_last_updated']) !!}
                        </div>
                        <div class="col-md-12 col-sm-12{{ $errors->has('charge_type') ? ' has-error' : '' }}">
                            <label for="charge_type_lbl" class="control-label">Charge type*:</label>
                            {!! Form::select('charge_type', ['BL' => 'BL', 'Container' => 'Container', 'Others' => 'Others'],
                                null, ['class'=>'form-control', 'id' => 'mdl_charge_type']) !!}
                        </div>
                        <div class="col-md-12 col-sm-12{{ $errors->has('charge') ? ' has-error' : '' }}">
                            <label for="charge_lbl" class="control-label">Charge*:</label>
                            {!! Form::select('charge',$price, null,['class'=>'form-control','id'=>'charge','placeholder' => ' ','id' => 'mdl_charge']) !!}
                        </div>
                    </div>{{--form-group--}}
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12{{ $errors->has('notes') ? ' has-error' : '' }}">
                            <label for="notes_lbl" class="control-label">Notes*:</label>
                            {!! Form::textarea('notes', null, ['class'=>'form-control', 'id' => 'mdl_notes', 'rows'=>'3']) !!}
                        </div>
                    </div>{{--form-group--}}
                </div>{{--ac-form--}}
                {!! Form::hidden('idBankAccount', null, ['id' => 'mdlIdBankAccount']) !!}
            </div>{{--modal-body--}}
            <div class="modal-footer">
                <a class="btn btn-primary" id="additionalChargeUpdate">Save changes</a>
            </div>{{--modal-footer--}}
        </div>
    </div>
</div>
