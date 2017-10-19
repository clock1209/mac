<div class="row">
    <div class="col-md-5">
        <h1 class="text-primary" style="text-align: center;">Upload Documents</h1>
    </div>
</div>
<div class="row" style="background: rgba(128, 128, 128, 0.14); padding: 15px;
border-radius: 15px; margin: 10px;">
    {!!Form::open(array('url' => '/docs-suppliers','files'=>'true')) !!}
    {{ Form::hidden('supplier_id', $supplier_id, array('id' => 'supplier_id')) }}
        <div class="col-md-10">
            <div class="form-group">
                <div class="col-md-3 col-sm-12{{ $errors->has('reference_number') ? ' has-error' : '' }}">
                    <label for="name_lbl" class="control-label">Reference Number*:</label>
                        {!! Form::text('reference_number',$docssupplier ? $docssupplier->reference_number : old('reference_number'),['class'=>'form-control', 'required']) !!}
                </div>
                <div class="col-md-3 col-sm-12{{ $errors->has('bill') ? ' has-error' : '' }}">
                    <label for="name_lbl" class="control-label">Bill*:</label>
                        {!! Form::text('bill',$docssupplier ? $docssupplier->bill : old('bill'),['class'=>'form-control', 'required']) !!}
                </div>
                <div class="col-md-3 col-sm-12{{ $errors->has('bank_account') ? ' has-error' : '' }}">
                    <label for="name_lbl" class="control-label">Bank account*:</label>
                        {!! Form::select('bank_account', $bank_account , 0, ['class'=>'form-control','placeholder' => ' ',]) !!}
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin:2%;">
            <div class="form-group">
                <div class="col-md-12 col-sm-12 {{ $errors->has('concept_id') ? ' has-error' : '' }}">
                    <label for="concept_lbl" class="control-label">Concept*:</label>
                    {!! Form::select('concept_id[]', $concepts , 0, ['class'=>'js-example-basic-multiple','multiple'=>'multiple','id'=>'concept_id']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="form-group">
                <div class="col-md-3 col-sm-12{{ $errors->has('cost') ? ' has-error' : '' }}">
                    <label for="name_lbl" class="control-label">Cost*:</label>
                        {!! Form::text('cost',$docssupplier ? $docssupplier->cost : old('cost'),['class'=>'form-control', 'required']) !!}
                </div>
                <div class="col-md-3 col-sm-12{{ $errors->has('doc') ? ' has-error' : '' }}">
                    <label for="name_lbl" class="control-label">Seleccionar archivo*:</label>
                        {!! Form::file('doc') !!}
                </div>
                <br><br><br>
                <div class="col-md-3 col-sm-12">
                      {!! Form::submit('Add', ['class' => 'btn btn-success', 'id' => 'submitBtn', 'style' => 'margin-top: 15px;']) !!}
                </div>
            </div>
        </div>
  {!! Form::close() !!}
</div>
<br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="docsSuppliers-table">
            <thead>
                <tr>
                    <th>Reference Number</th>
                    <th>Bill</th>
                    <th>Bank Account</th>
                    <th>Concept</th>
                    <th>Cost</th>
                    <th>Doc</th>
                    <th width="210px;">Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@include('docsSuppliers.partials.editModal')
