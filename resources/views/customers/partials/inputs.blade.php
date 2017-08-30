<div class="form-group">
    <div class="col-md-4 col-sm-12">
        <label for="username_lbl" class="input-control">Name*:</label>
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-4 col-md-offset-1 col-sm-12" style="border-color: transparent">
        <label for="username_lbl" class="input-control">Business name*:</label>
        {!! Form::text('business_name',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-sm-12">
        <label for="email_lbl" class="input-control">RFC*:</label>
        {!! Form::text('rfc',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-2 col-md-offset-1 col-sm-12 ">
        <label for="Role_lbl" class="input-control">Country code*:</label>
        {!!Form::select('country_id',['+53','+52'],null,['class'=>'form-control'])!!}
    </div>
    <div class="col-md-2 col-sm-12">
        <label for="email_lbl" class="input-control">Phone*:</label>
        {!! Form::text('phone',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-sm-12">
        <label for="username_lbl" class="input-control">Street*:</label>
        {!! Form::text('street',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-4 col-md-offset-1 col-sm-12" style="border-color: transparent">
        <label for="username_lbl" class="input-control">Number*:</label>
        {!! Form::text('outside_number',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-4 col-sm-12">
        <label for="username_lbl" class="input-control">Suburb*:</label>
        {!! Form::text('suburb',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-4 col-md-offset-1 col-sm-12" style="border-color: transparent">
        <label for="username_lbl" class="input-control">City*:</label>
        {!! Form::text('city_id',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-4 col-sm-12">
        <label for="username_lbl" class="input-control">State*:</label>
        {!! Form::text('state_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-4 col-md-offset-1 col-sm-12" style="border-color: transparent">
        <label for="username_lbl" class="input-control">Country*:</label>
        {!! Form::text('country_id',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-4 col-sm-12">
        <label for="username_lbl" class="input-control">Zip Code*:</label>
        {!! Form::text('zipcode',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-4 col-md-offset-1 col-sm-12" style="border-color: transparent">
        <label for="username_lbl" class="input-control">E-mail*:</label>
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-4 col-sm-12">
        <label for="username_lbl" class="input-control">Contact name*:</label>
        {!! Form::text('contact_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-4 col-md-offset-1 col-sm-12" style="border-color: transparent">
        <label for="username_lbl" class="input-control">Contact job*:</label>
        {!! Form::text('contact_job',null,['class'=>'form-control']) !!}
    </div>
</div>
@include('customBroker.index')

