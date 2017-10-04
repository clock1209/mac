<h4 style=" font-variant: small-caps; text-shadow: 1px 1px 2px gray;">Add ports: </h4>
<div class="form-group">
    <div class="col-md-4 col-md-offset-0 col-sm-12">
        <label for="city_lbl" class="control-label">Place of load*:</label><br>
        {!! Form::select('place_of_load', $countries , $countries ? [$countries] : null,
            ['class'=>'form-control', 'id' => 'place_of_load']) !!}
    </div>
</div>
{!! Form::hidden('shipper_id', $shipper) !!}
