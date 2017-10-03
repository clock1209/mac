<div id="ba-form">
    <h4 class="n-caption">Bank accounts</h4>
    <div class="form-group">
        <div class="col-md-3 col-sm-12{{ $errors->has('pay_of') ? ' has-error' : '' }}">
            <label for="pay_of_lbl" class="control-label">Pay of*:</label>
            {!! Form::select('pay_of', $concepts, null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12 {{ $errors->has('account') ? ' has-error' : '' }}">
            <label for="account_lbl" class="control-label">Account*:</label>
            {!! Form::number('account', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12{{ $errors->has('bank') ? ' has-error' : '' }}">
            <label for="bank_lbl" class="control-label">Bank*:</label>
            {!! Form::text('bank', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12{{ $errors->has('clabe') ? ' has-error' : '' }}">
            <label for="clabe_lbl" class="control-label">Clabe*:</label>
            {!! Form::text('clabe', null,['class'=>'form-control']) !!}
        </div>
    </div>{{--form-group--}}
    <div class="form-group">
        <div class="col-md-3 col-sm-12{{ $errors->has('aba') ? ' has-error' : '' }}">
            <label for="aba_lbl" class="control-label">ABA*:</label>
            {!! Form::text('aba', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12 {{ $errors->has('swift') ? ' has-error' : '' }}">
            <label for="swift_lbl" class="control-label">Swift*:</label>
            {!! Form::text('swift', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12{{ $errors->has('reference') ? ' has-error' : '' }}">
            <label for="reference_lbl" class="control-label">Reference*:</label>
            {!! Form::text('reference', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12{{ $errors->has('currency') ? ' has-error' : '' }}">
            <label for="currency_lbl" class="control-label">Currency*:</label>
            {!! Form::select('currency', [''], null,['class'=>'form-control', 'id' => 'currency']) !!}
        </div>
    </div>{{--form-group--}}
    <div class="form-group">
        <div class="col-md-3 col-sm-12{{ $errors->has('beneficiary') ? ' has-error' : '' }}">
            <label for="beneficiary_lbl" class="control-label">Beneficiary*:</label>
            {!! Form::text('beneficiary', null, ['class'=>'form-control']) !!}
        </div>
    </div>{{--form-group--}}
</div>{{--#ba-form--}}
<span class="btn btn-success" id="btn-bank-account"><span class="glyphicon glyphicon-plus"></span> Add</span><br><br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="bank-accounts-table">
            <thead>
            <tr>
                <th>Pay of</th>
                <th>Account</th>
                <th>Bank</th>
                <th>Clabe</th>
                <th>ABA</th>
                <th>Swift</th>
                <th>Reference</th>
                <th>Currency</th>
                <th>Beneficiary</th>
                <th width="210px;">Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

@include('bankAccounts.partials.editModal')
@include('bankAccounts.partials.script')