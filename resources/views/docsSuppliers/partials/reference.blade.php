<div class="row">
    <div class="col-md-10">
        <h1 class="text-primary" style="text-align: left;"> Upload Documents Reference</h1>
    </div>
</div>
<div class="row" style="background: rgba(128, 128, 128, 0.14); padding: 10px;
border-radius: 15px; margin: 5px;">
    {!!Form::open(array('url' => '/docs-suppliers','files'=>'true')) !!}
    {{ Form::hidden('supplier_id', $supplier_id, array('id' => 'supplier_id')) }}
        <div class="col-md-10">
            <div class="form-group">
                <div class="col-md-6 col-sm-12{{ $errors->has('name_reference') ? ' has-error' : '' }}">
                    <label for="name_lbl" class="control-label">Name*:</label>
                        {!! Form::text('name_reference',$docssupplier ? $docssupplier->name : old('name_reference'),['class'=>'form-control', 'required']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="form-group">
                <div class="col-md-6 col-sm-12{{ $errors->has('doc_reference') ? ' has-error' : '' }}">
                    <label for="name_lbl" class="control-label">Seleccionar archivo*:</label>
                        {!! Form::file('doc_reference') !!}
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
            <table class="table table-bordered table-hover" id="supplierReference-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Doc</th>
                    <th width="210px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
