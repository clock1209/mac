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
        {!!Form::select('countrycode',$countriesCode,$customer ? '_'.$customer->countrycode : null,
            ['class'=>'form-control'])!!}
    </div>
    <div class="col-md-2 col-sm-12">
        <label for="email_lbl" class="input-control">Phone*:</label>
        {!! Form::text('phone',null,['class'=>'form-control', 'id'=>'phone_customer']) !!}
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
    <div class="col-md-4 col-md-offset-1 col-sm-12">
        <label for="city_lbl" class="control-label">City*:</label><br>
        {!! Form::select('city', $customer ? [$customer->city] : [null => ' '], $customer ? [$customer->city] : null,
            ['class'=>'form-control', 'id' => 'selectCity']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-4 col-sm-12">
        <label for="username_lbl" class="input-control">State*:</label>
        {!! Form::text('state',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-4 col-md-offset-1 col-sm-12 ">
        <label for="country_lbl" class="control-label">Country*:</label>
        {!! Form::select('country', $countries, $customer ? $customer->country : null, ['class'=>'form-control']) !!}
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
{!! Form::hidden('customer_id',$customer ? $customer->id : 0,['class'=>'form-control']) !!}
@include('customBroker.index')
<h4 class="n-caption">Special info by Customer</h4>
{{--<div class="form-group">--}}
    {{--<div class="col-md-6" style="padding-right: 5px;">--}}
        {{--<div style="background: rgb(218, 220, 223); padding: 5px; border-radius: 5px;">--}}
            {{--<h6>Special info by Customer</h6>--}}
            {{--<div class="form-group col-md-6">--}}
                {{--<div class="form-group">--}}
                    {{--{{ Form::checkbox('all_in_rate', 1, null) }} All in rate<br>--}}
                    {{--{{ Form::checkbox('agree', 1, null) }} Logistic & cargo<br>--}}
                    {{--{{ Form::checkbox('agree', 1, null) }} Overweight--}}
                {{--</div>--}}

            {{--</div>--}}
            {{--<div class="form-group col-md-6">--}}
                {{--<div class="form-group">--}}
                    {{--{{ Form::checkbox('all_in_rate', 1, null) }} All in rate<br>--}}
                    {{--{{ Form::checkbox('agree', 1, null) }} Logistic & cargo<br>--}}
                    {{--{{ Form::checkbox('agree', 1, null) }} Overweight--}}
                {{--</div>--}}

            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-6" style="padding-left: 5px;">--}}
        {{--<div style="background: rgb(218, 220, 223); padding: 5px; border-radius: 5px;">--}}

        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="form-group col-md-6">--}}
    {{--<div class="form-group {{ $errors->has('id') ? ' has-error' : '' }}">--}}
        {{--<label class="col-md-4 control-label">--}}
            {{--Número de activo:--}}
        {{--</label>--}}
        {{--<div class="col-md-8 col-sm-12">--}}
            {{--{!! Form::text('id',  null, ['class'=>'form-control']) !!}--}}
            {{--<span class="help-block">{{ $errors->first('id') }}</span>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}{{--form-group--}}
{{--<div class="form-group col-md-6">--}}
    {{--<div class="form-group {{ $errors->has('id') ? ' has-error' : '' }}">--}}
        {{--<label class="col-md-4 control-label">--}}
            {{--Número de activo:--}}
        {{--</label>--}}
        {{--<div class="col-md-8 col-sm-12">--}}
            {{--{!! Form::text('id',  null, ['class'=>'form-control']) !!}--}}
            {{--<span class="help-block">{{ $errors->first('id') }}</span>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}{{--form-group--}}
<div class="container-fluid">
    {{--<h1>Hello World!</h1>--}}
    {{--<p>Resize the browser window to see the effect.</p>--}}
    <div class="row">
        <div class="col-sm-6" style="background-color:lavender;">
            <div class="row">
                <div class="col-sm-6" style="background-color:lightcyan;">
                    {{ Form::checkbox('all_in_rate', 1, null) }} All in rate<br>
                    {{ Form::checkbox('agree', 1, null) }} Logistic & cargo<br>
                    {{ Form::checkbox('agree', 1, null) }} Overweight
                </div>
                <div class="col-sm-6" style="background-color:lightgray;">
                    {{ Form::checkbox('all_in_rate', 1, null) }} All in rate<br>
                    {{ Form::checkbox('agree', 1, null) }} Logistic & cargo<br>
                    {{ Form::checkbox('agree', 1, null) }} Overweight
                </div>
            </div>
        </div>
        <div class="col-sm-6" style="background-color:lavenderblush;">
            {{ Form::checkbox('all_in_rate', 1, null) }} All in rate<br>
            {{ Form::checkbox('agree', 1, null) }} Logistic & cargo<br>
            {{ Form::checkbox('agree', 1, null) }} Overweight
        </div>
    </div>
</div>
