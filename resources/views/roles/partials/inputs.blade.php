<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="rolName_lbl" class="col-sm-3 control-label">
        {{ $errors->has('name') ? '* ' : '' }}Name :</label>
    <div class="col-sm-8">
        {!!Form::text('name',null,['class'=>'form-control'])!!}
    </div>
</div>
<div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
    <label for="displayName_lbl" class="col-sm-3 control-label">
        {{ $errors->has('display_name') ? '* ' : '' }}Display Name:</label>
    <div class="col-sm-8">
        {!!Form::text('display_name',null,['class'=>'form-control'])!!}
    </div>
</div>
<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="displayName_lbl" class="col-sm-3 control-label">
        {{ $errors->has('description') ? '* ' : '' }}Description :
    </label>
    <div class="col-sm-8">
        {!!Form::textarea('description',null,['class'=>'form-control', 'rows'=>'3'])!!}
    </div>
</div>
<div class="text-center">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            <i class="glyphicon glyphicon-floppy-disk"></i>
            <t class="hidden-xs">Save</t>
        </button>
        <a class="btn btn-danger btn-close" href="{{ route('roles.index') }}">
            <i class="glyphicon glyphicon-remove"></i>
            <t class="hidden-xs">Cancel</t>
        </a>
    </div>
</div>