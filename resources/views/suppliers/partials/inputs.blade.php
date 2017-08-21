<div class="form-group">
    <div class="col-md-4 col-sm-12{{ $errors->has('abbreviation') ? ' has-error' : '' }}">
        <label for="abbreviation_lbl" class="input-control">Abbreviation*:</label>
        {!! Form::text('abbreviation',$supplier ? $supplier->abbreviation : null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-4 col-sm-12{{ $errors->has('type') ? ' has-error' : '' }}">
        <label for="type_lbl" class="input-control">Type*:</label>
        {!! Form::select('type', $types, $supplier ? $supplier->type : null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-4 col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name_lbl" class="input-control">Name*:</label>
        {!! Form::text('name',$supplier ? $supplier->name : null,['class'=>'form-control', 'required']) !!}
    </div>
</div>
{!! Form::hidden('supplier_id',$supplier ? $supplier->id : null,['class'=>'form-control']) !!}
@if($supplier != null)
    @include('bankAccounts.index')

    @include('additionalCharges.index')

    @include('contacts.index')
@endif