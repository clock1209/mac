<h4 style=" font-variant: small-caps; text-shadow: 1px 1px 2px gray;">Carrier</h4>
<div class="form-group">
  <div class="col-md-3 col-sm-12{{ $errors->has('cost') ? ' has-error' : '' }}">
      <label for="cost_lbl" class="input-control">Abbreviation*:</label>
      {!! Form::text('abbreviation',$carriers ? $carriers->abbreviation : null,['class'=>'form-control', 'required']) !!}
  </div>
    <div class="col-md-4 col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name:_lbl" class="input-control">Name*:</label>
        {!! Form::text('name',$carriers ? $carriers->name : null,['class'=>'form-control', 'required']) !!}
    </div>

</div>
