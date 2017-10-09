<h4 class="n-caption">Shippers</h4>
<div class="form-group">
    <div class="col-md-4 col-sm-12{{ $errors->has('tradename') ? ' has-error' : '' }}">
        <label for="tradename_lbl" class="control-label">Tradename*:</label>
        {!! Form::text('tradename',$shipper ? $shipper->tradename : null,['class'=>'form-control', 'required']) !!}
    </div>
</div>
<h4 class="n-caption">Contact</h4>
<div class="form-group">
    <div class="col-md-3 col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name_lbl" class="control-label">Name*:</label>
        {!! Form::text('name',$shipper ? $shipper->name : null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email_lbl" class="control-label">E-mail*:</label>
        {!! Form::email('email',$shipper ? $shipper->email : null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="phone_lbl" class="control-label">(area code) Phone*:</label>
        <div class="input-group">
            <div class="input-group-btn">
                {!! Form::select('area_code', $area_codes, $areacode, ['class'=>'btn btn-secundary']) !!}
            </div>
            {!! Form::text('phone',$phone ? $phone : null,['class'=>'form-control', 'id' => 'phone']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('business_name') ? ' has-error' : '' }}">
        <label for="business_name_lbl" class="control-label">Business name*:</label>
        {!! Form::text('business_name',$shipper ? $shipper->business_name : null,['class'=>'form-control']) !!}
    </div>
</div>
<h4 class="n-caption">Address</h4>
<div class="form-group">
    <div class="col-md-3 col-sm-12{{ $errors->has('street') ? ' has-error' : '' }}">
        <label for="street_lbl" class="control-label">Street*:</label>
        {!! Form::text('street',$shipper ? $shipper->street : null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3 col-sm-12 {{ $errors->has('street_number') ? ' has-error' : '' }}">
        <label for="street_number_lbl" class="control-label">Street number*:</label>
        {!! Form::text('street_number',$shipper ? $shipper->street_number : null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('neighborhood') ? ' has-error' : '' }}">
        <label for="neighborhood_lbl" class="control-label">Neighborhood*:</label>
        {!! Form::text('neighborhood',$shipper ? $shipper->neighborhood : null,['class'=>'form-control']) !!}
    </div>
</div>{{--form-group--}}
<div class="form-group">
    <div class="col-md-3 col-sm-12 {{ $errors->has('country') ? ' has-error' : '' }}">
        <label for="country_lbl" class="control-label">Country*:</label>
        {{--{!! Form::select('country', $countries, $shipper ? $shipper->country : null, ['class'=>'form-control']) !!}--}}
        <div class="input-group">
            {!! Form::select('country', $countries, $shipper ? $shipper->country : null, ['class'=>'form-control']) !!}
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" onclick="addCountry()" data-toggle="tooltip" title="Add new">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </span>
        </div><!-- /input-group -->
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('city') ? ' has-error' : '' }}">
        <label for="city_lbl" class="control-label">City*:</label><br>
{{--        {!! Form::select('city', $shipper ? [$shipper->city] : [null => ' '], $shipper ? [$shipper->city] : null,--}}
{{--            ['class'=>'form-control', 'id' => 'selectCity']) !!}--}}
        <div class="input-group">
            {!! Form::select('city', $shipper ? [$shipper->city] : [null => ' '], $shipper ? [$shipper->city] : null,
            ['class'=>'form-control', 'id' => 'selectCity']) !!}
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" onclick="addCity()" data-toggle="tooltip" title="Add new">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </span>
        </div><!-- /input-group -->
    </div>
    <div class="col-md-3 col-sm-12 {{ $errors->has('zip_code') ? ' has-error' : '' }}">
        <label for="zip_code_lbl" class="control-label">Zip code*:</label>
        {!! Form::text('zip_code',$shipper ? $shipper->zip_code : null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3 col-sm-12 {{ $errors->has('rfc_taxid') ? ' has-error' : '' }}">
        <label for="rfc_taxid_lbl" class="control-label">RFC/TAX ID:</label>
        {!! Form::text('rfc_taxid',$shipper ? $shipper->rfc_taxid : null,['class'=>'form-control']) !!}
    </div>
</div>{{--form-group--}}
