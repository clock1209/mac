<h4 style=" font-variant: small-caps; text-shadow: 1px 1px 2px gray;">Bank accounts</h4>
<div class="form-group">
    <div class="col-md-3 col-sm-12{{ $errors->has('pay_of') ? ' has-error' : '' }}">
        <label for="pay_of_lbl" class="input-control">Pay of*:</label>
        {!! Form::select('pay_of', ['Ocean freight', 'BL fee', 'ISPS', 'AMS'], null, ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12 {{ $errors->has('account') ? ' has-error' : '' }}">
        <label for="account_lbl" class="input-control">Account*:</label>
        {!! Form::text('account', null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('bank') ? ' has-error' : '' }}">
        <label for="bank_lbl" class="input-control">Bank*:</label>
        {!! Form::text('bank', null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('clabe') ? ' has-error' : '' }}">
        <label for="clabe_lbl" class="input-control">Clabe*:</label>
        {!! Form::text('clabe', null,['class'=>'form-control', 'required']) !!}
    </div>
</div>{{--form-group--}}
<div class="form-group">
    <div class="col-md-3 col-sm-12{{ $errors->has('aba') ? ' has-error' : '' }}">
        <label for="aba_lbl" class="input-control">ABA*:</label>
        {!! Form::text('aba', null, ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12 {{ $errors->has('swift') ? ' has-error' : '' }}">
        <label for="swift_lbl" class="input-control">Swift*:</label>
        {!! Form::text('swift', null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('reference') ? ' has-error' : '' }}">
        <label for="reference_lbl" class="input-control">Reference*:</label>
        {!! Form::text('reference', null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('currency') ? ' has-error' : '' }}">
        <label for="currency_lbl" class="input-control">Currency*:</label>
        {!! Form::text('currency', null,['class'=>'form-control', 'required']) !!}
    </div>
</div>{{--form-group--}}
<div class="form-group">
    <div class="col-md-3 col-sm-12{{ $errors->has('beneficiary') ? ' has-error' : '' }}">
        <label for="beneficiary_lbl" class="input-control">Beneficiary*:</label>
        {!! Form::text('beneficiary', null, ['class'=>'form-control', 'required']) !!}
    </div>
</div>{{--form-group--}}
<a href="#" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add</a><br><br>
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