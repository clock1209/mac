<div class="form-group">
    <div class="col-md-4 col-sm-12{{ $errors->has('abbreviation') ? ' has-error' : '' }}">
        <label for="abbreviation_lbl" class="control-label">Abbreviation*:</label>
        {!! Form::text('abbreviation',$supplier ? $supplier->abbreviation : old('abbreviation'),['class'=>'form-control']) !!}
    </div>
    <div class="col-md-4 col-sm-12{{ $errors->has('type') ? ' has-error' : '' }}">
        <label for="type_lbl" class="control-label">Type*:</label>
        {!! Form::select('type', $types, $supplier ? $supplier->type : old('type'), ['class'=>'form-control','id'=> 'type']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-4 col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name_lbl" class="control-label">Name*:</label>
        {!! Form::text('name',$supplier ? $supplier->name : old('name'),['class'=>'form-control', 'required']) !!}
    </div>
</div>
{!! Form::hidden('supplier_id',$supplier ? $supplier->id : 1,['class'=>'form-control']) !!}

@include('bankAccounts.index')

@include('additionalCharges.index')

@include('supplierContacts.index')
