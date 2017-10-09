<div class="modal fade" id="bankAccount_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-title">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4>Edit bank account</h4>
            </div>
            <div class="modal-body">
                <div id="ba-form">
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12{{ $errors->has('pay_of') ? ' has-error' : '' }}">
                            <label for="pay_of_lbl" class="control-label">Pay of*:</label>
                            {!! Form::select('pay_of', $concepts, null, ['class'=>'form-control', 'id' => 'mdlPayof']) !!}
                        </div>
                        <div class="col-md-12 col-sm-12 {{ $errors->has('account') ? ' has-error' : '' }}">
                            <label for="account_lbl" class="control-label">Account*:</label>
                            {!! Form::number('account', null,['class'=>'form-control', 'id' => 'mdlAccount']) !!}
                        </div>
                        <div class="col-md-12 col-sm-12{{ $errors->has('bank') ? ' has-error' : '' }}">
                            <label for="bank_lbl" class="control-label">Bank*:</label>
                            {!! Form::text('bank', null,['class'=>'form-control', 'id' => 'mdlBank']) !!}
                        </div>
                        <div class="col-md-12 col-sm-12{{ $errors->has('clabe') ? ' has-error' : '' }}">
                            <label for="clabe_lbl" class="control-label">Clabe*:</label>
                            {!! Form::text('clabe', null,['class'=>'form-control', 'id' => 'mdlClabe']) !!}
                        </div>
                    </div>{{--form-group--}}
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12{{ $errors->has('aba') ? ' has-error' : '' }}">
                            <label for="aba_lbl" class="control-label">ABA*:</label>
                            {!! Form::text('aba', null, ['class'=>'form-control', 'id' => 'mdlAba']) !!}
                        </div>
                        <div class="col-md-12 col-sm-12 {{ $errors->has('swift') ? ' has-error' : '' }}">
                            <label for="swift_lbl" class="control-label">Swift*:</label>
                            {!! Form::text('swift', null,['class'=>'form-control', 'id' => 'mdlSwift']) !!}
                        </div>
                        <div class="col-md-12 col-sm-12{{ $errors->has('reference') ? ' has-error' : '' }}">
                            <label for="reference_lbl" class="control-label">Reference*:</label>
                            {!! Form::text('reference', null,['class'=>'form-control', 'id' => 'mdlReference']) !!}
                        </div>
                        <div class="col-md-12 col-sm-12{{ $errors->has('beneficiary') ? ' has-error' : '' }}">
                            <label for="beneficiary_lbl" class="control-label">Beneficiary*:</label>
                            {!! Form::text('beneficiary', null, ['class'=>'form-control', 'id' => 'mdlBeneficiary']) !!}
                        </div>
                    </div>{{--form-group--}}
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12{{ $errors->has('currency') ? ' has-error' : '' }}">
                            <label for="currency_lbl" class="control-label">Currency*:</label><br>
                            {!! Form::select('currency', [''], ['mxn'],['class'=>'form-control', 'id' => 'mdlCurrency']) !!}
                        </div>
                    </div>{{--form-group--}}
                    {!! Form::hidden('idBankAccount', null, ['id' => 'mdlIdBankAccount']) !!}
                </div>{{--#ba-form--}}
            </div>{{--modal-body--}}
            <div class="modal-footer">
                <a class="btn btn-primary" id="bankAccountUpdate">Save changes</a>
            </div>{{--modal-footer--}}
        </div>
    </div>
</div>
