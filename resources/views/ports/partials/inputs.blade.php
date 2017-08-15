<h4 style=" font-variant: small-caps; text-shadow: 1px 1px 2px gray;">Add ports: </h4>
<div class="form-group">
    <div class="col-md-4 col-sm-12{{ $errors->has('place_of_load') ? ' has-error' : '' }}">
        <label for="place_of_load_lbl" class="input-control">Place of load*:</label>
        {!! Form::text('place_of_load',null,['class'=>'form-control', 'required']) !!}
    </div>
</div>
{!! Form::hidden('shipper_id', $shipper) !!}
