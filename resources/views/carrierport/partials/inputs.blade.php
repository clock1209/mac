<div class="form-group">
    {{ Form::hidden('carrier_id', $id) }}
    <div class="col-md-4 col-md-offset-0 col-sm-12">
        <label for="city_lbl" class="control-label">Country*:</label><br>
        {!! Form::select('country_port_id', $country_port ? $country_port: [null => ' '],  $carrierport ? [$carrierport->country_port_id] : null,
            ['class'=>'form-control', 'id' => 'country_port_id','placeholder' => ' ']) !!}
    </div>
    <div class="col-md-4 col-md-offset-0 col-sm-12">
        <label for="city_lbl" class="control-label">Port*:</label><br>
        {!! Form::select('port_name_id', $port ? $port: [null => ' '],  $carrierport ? [$carrierport->port_name_id] : null,
            ['class'=>'form-control', 'id' => 'port_name_id','placeholder' => ' ']) !!}
    </div>
</div>
<h4 class="n-caption">Arbitrary*</h4>
<div class="form-group">
    <div class="col-md-4 col-sm-12{{ $errors->has('arbitraryone') ? ' has-error' : '' }}">
        <label for="20gp_lbl" class="control-label">20 GP*:</label>
        {!! Form::text('arbitraryone',$carrierport ? $carrierport->arbitraryone : old('arbitraryone'),['class'=>'form-control', 'required','id'=>'arbitraryone']) !!}
    </div>
    <div class="col-md-4 col-sm-12{{ $errors->has('arbitrarytwo') ? ' has-error' : '' }}">
        <label for="40gp_lbl" class="control-label">40 GP*:</label>
        {!! Form::text('arbitrarytwo',$carrierport ? $carrierport->arbitrarytwo : old('arbitrarytwo'),['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-4 col-sm-12{{ $errors->has('arbitrarythree') ? ' has-error' : '' }}">
        <label for="40hc_lbl" class="control-label">40 HC*:</label>
        {!! Form::text('arbitrarythree',$carrierport ? $carrierport->arbitrarythree : old('arbitrarythree'),['class'=>'form-control', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="col-md-3 col-sm-3{{ $errors->has('rate') ? ' has-error' : '' }}">
            Subagente cost:
            {!! Form::checkbox('include_subagent',1,$carrierport ? $carrierport->include_subagent : old('include_subagent'), ['class' => 'field','id'=>'check_subagente']) !!}
        </div>
        <div style="display:none;" id="div_subagente">
            <div class="col-md-2 col-sm-12{{ $errors->has('arbitraryone') ? ' has-error' : '' }}">
                <label for="20gp_lbl" class="control-label">20 GP*:</label>
                {!! Form::text('sub_arbitrary_one',$carrierport ? $carrierport->sub_arbitrary_one : old('sub_arbitrary_one'),['class'=>'form-control']) !!}
            </div>
              <div class="col-md-2 col-sm-12{{ $errors->has('arbitrarytwo') ? ' has-error' : '' }}">
                  <label for="40gp_lbl" class="control-label">40 GP*:</label>
                  {!! Form::text('sub_arbitrary_two',$carrierport ? $carrierport->sub_arbitrary_two : old('sub_arbitrary_two'),['class'=>'form-control']) !!}
              </div>
              <div class="col-md-2 col-sm-12{{ $errors->has('arbitrarythree') ? ' has-error' : '' }}">
                  <label for="40hc_lbl" class="control-label">40 HC*:</label>
                  {!! Form::text('sub_arbitrary_three',$carrierport ? $carrierport->sub_arbitrary_three : old('sub_arbitrary_three'),['class'=>'form-control']) !!}
              </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-4 col-sm-10{{ $errors->has('departures') ? ' has-error' : '' }}">
            <label for="departure_lbl" class="control-label">Departures*:</label>
            {!! Form::select('departures',[0 => ' ','MONDAY' => 'MONDAY', 'TUESDAY' => 'TUESDAY','WENDNESDAY' => 'WENDNESDAY', 'THURSDAY' => 'THURSDAY','FRIDAY' => 'FRIDAY', 'SATURDAY' => 'SATURDAY', 'SUNDAY' => 'SUNDAY'],$carrierport ? $carrierport->departures : null,['class'=>'form-control', 'required']) !!}
        </div><br><br><br>
        <div class="col-md-4 col-sm-10{{ $errors->has('tt') ? ' has-error' : '' }}">
            <label for="departure_lbl" class="control-label">T/T*:</label>
            {!! Form::text('tt',$carrierport ? $carrierport->tt : old('tt'),['class'=>'form-control', 'required']) !!}
        </div>
        <br><br><br>
        <div class="col-md-4 col-sm-10{{ $errors->has('rate') ? ' has-error' : '' }}">
            <label for="departure_lbl" class="control-label">Rate Type*:</label>
            {!! Form::select('rate',[0 => ' ','FAK' => 'FAK', 'NAC' => 'NAC'],$carrierport ? $carrierport->rate : null,['class'=>'form-control', 'required']) !!}
        </div>
        <br><br><br>
        <div class="col-md-4 col-sm-10{{ $errors->has('remarks') ? ' has-error' : '' }}">
            <label for="departure_lbl" class="control-label">Remarks:</label>
            {!! Form::textarea('remarks',$carrierport ? $carrierport->remarks : old('remarks'),['class'=>'field']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-6 col-sm-10{{ $errors->has('price') ? ' has-error' : '' }}">
            <h5 class="n-caption">Price calculation*</h5>
            @if (count($carrierport) === 0)
                @foreach ($prices as $price)
                    <p>
                        {{ $price->name }}
                        {{ Form::radio('pricecal_id', $price->id, old('price'),['class'=>'field', 'required']) }}
                    </p>
                @endforeach
            @else
                @foreach ($prices as $price)
                    <p>
                        {{ $price->name }}
                        {{ Form::radio('pricecal_id', $price->id, old('price'),['class'=>'field', 'required']) }}
                    </p>
                @endforeach
            @endif
            <a href="{{ route('prices.index') }}" class="btn btn-success"><span class="glyphicon glyphicon-usd"></span> New price calculation</a>
        </div>
    </div>
</div>
{!! Form::hidden('carrierport_id',$carrierport ? $carrierport->id : 1,['class'=>'form-control']) !!}
