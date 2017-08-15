<h4 style=" font-variant: small-caps; text-shadow: 1px 1px 2px gray;">Shippers</h4>
<div class="form-group has-danger">
    <div class="col-md-4 col-sm-12">
        <label for="tradename_lbl" class="input-control">Tradename*:</label>
        {!! Form::text('tradename',$shipper ? $shipper->tradename : null,['class'=>'form-control', 'required']) !!}
    </div>
</div>
<h4 style=" font-variant: small-caps; text-shadow: 1px 1px 2px gray;">Contact</h4>
<div class="form-group">
    <div class="col-md-3 col-sm-12">
        <label for="name_lbl" class="input-control">Name*:</label>
        {!! Form::text('name',$shipper ? $shipper->name : null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12">
        <label for="email_lbl" class="input-control">E-mail*:</label>
        {!! Form::email('email',$shipper ? $shipper->email : null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12">
        <label for="phone_lbl" class="input-control">Phone*:</label>
        {!! Form::text('phone',$shipper ? $shipper->phone : null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12">
        <label for="business_name_lbl" class="input-control">Business name*:</label>
        {!! Form::text('business_name',$shipper ? $shipper->business_name : null,['class'=>'form-control', 'required']) !!}
    </div>
</div>
<h4 style=" font-variant: small-caps; text-shadow: 1px 1px 2px gray;">Address</h4>
<div class="form-group">
    <div class="col-md-3 col-sm-12">
        <label for="street_lbl" class="input-control">Street*:</label>
        {!! Form::text('street',$shipper ? $shipper->street : null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12">
        <label for="street_number_lbl" class="input-control">Street number*:</label>
        {!! Form::text('street_number',$shipper ? $shipper->street_number : null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12">
        <label for="neighborhood_lbl" class="input-control">Neighborhood*:</label>
        {!! Form::text('neighborhood',$shipper ? $shipper->neighborhood : null,['class'=>'form-control', 'required']) !!}
    </div>
</div>{{--form-group--}}
<div class="form-group">
    <div class="col-md-3 col-sm-12">
        <label for="city_lbl" class="input-control">City*:</label><br>
        {!! Form::text('city',$shipper ? $shipper->city : null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12">
        <label for="country_lbl" class="input-control">Country*:</label>
        {!! Form::text('country',$shipper ? $shipper->country : null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12">
        <label for="zip_code_lbl" class="input-control">Zip code*:</label>
        {!! Form::text('zip_code',$shipper ? $shipper->zip_code : null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12">
        <label for="rfc_taxid_lbl" class="input-control">RFC/TAX ID:</label>
        {!! Form::text('rfc_taxid',$shipper ? $shipper->rfc_taxid : null,['class'=>'form-control']) !!}
    </div>
</div>{{--form-group--}}