<h4 style=" font-variant: small-caps; text-shadow: 1px 1px 2px gray;">Add consolidators: </h4>
<div class="form-group">
    <div class="col-md-4 col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name_lbl" class="input-control">Name*:</label>
        {!! Form::text('name',null,['class'=>'form-control', 'required']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-sm-12{{ $errors->has('abbreviation') ? ' has-error' : '' }}">
        <label for="abbreviation_lbl" class="input-control">Abbreviation*:</label>
        {!! Form::text('abbreviation',null,['class'=>'form-control', 'required']) !!}
    </div>
</div>
