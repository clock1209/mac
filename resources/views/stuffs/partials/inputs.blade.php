<h4 style=" font-variant: small-caps; text-shadow: 1px 1px 2px gray;">Stuffs</h4>
<div class="form-group">

    <div class="col-md-4 col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name:_lbl" class="input-control">Name*:</label>
        {!! Form::text('concepts',$stuffs ? $stuffs->concepts : null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('cost') ? ' has-error' : '' }}">
        <label for="cost_lbl" class="input-control">Cost*:</label>
        {!! Form::text('cost',$stuffs ? $stuffs->cost : null,['class'=>'form-control', 'required']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-4 col-sm-12{{ $errors->has('type') ? ' has-error' : '' }}">
        <label for="type_lbl" class="input-control">Type*:</label>
        {!! Form::text('type',$stuffs ? $stuffs->type : null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('agreed_cost') ? ' has-error' : '' }}">
        <label for="agreed_cost_lbl" class="input-control">Agreed costs*:</label>
        {!! Form::text('agreed_cost',$stuffs ? $stuffs->agreed_cost : null,['class'=>'form-control', 'required']) !!}
    </div>

</div>
<div class="form-group">
    <div class="col-md-3 col-sm-12{{ $errors->has('currency') ? ' has-error' : '' }}">
        <label for="currency_lbl" class="input-control">Currency*:</label>
        {!! Form::text('currency',$stuffs ? $stuffs->currency : null,['class'=>'form-control', 'required']) !!}
    </div>
</div>
