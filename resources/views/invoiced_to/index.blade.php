<h4 class="n-caption col-md-9">Invoiced to</h4>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">Name*:</label>
                {!! Form::text('name_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="form-group">
                <label class="input-control">Business name*:</label>
                {!! Form::text('business_name_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">RFC*:</label>
                {!! Form::text('rfc_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label class="input-control">Country code*:</label>
                        {!!Form::select('country_code_inv',$countriesCode,$customer ? '_'.$customer->countrycode : null,
                            ['class'=>'form-control select2'])!!}
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label class="input-control">Phone*:</label>
                        {!! Form::text('phone_inv',null,['class'=>'form-control', 'id'=>'phone_customer']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">Street*:</label>
                {!! Form::text('street_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="form-group">
                <label class="input-control">Number*:</label>
                {!! Form::text('outside_number_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">Suburb*:</label>
                {!! Form::text('suburb_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="form-group">
                <label class="control-label">City*:</label><br>
                {!! Form::select('city_inv', $customer ? [$customer->city] : [null => ' '], $customer ? [$customer->city] : null,
                    ['class'=>'form-control select_city', 'id' => 'selectCity_inv']) !!}
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">State*:</label>
                {!! Form::text('state_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="form-group">
                <label class="control-label">Country*:</label>
                {!! Form::select('country_inv', $countries, $customer ? $customer->country : null, ['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">Zip Code*:</label>
                {!! Form::text('zip_code_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="form-group">
                <label class="input-control">E-mail*:</label>
                {!! Form::email('email_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">Contact name*:</label>
                {!! Form::text('contact_name_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="form-group">
                <label class="input-control">Contact job*:</label>
                {!! Form::text('contact_job_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
    </div>

</div>

<div class="form-group">
    <div class="col-md-4 col-sm-12">

    </div>
    <div class="col-md-4 col-md-offset-1 col-sm-12" style="border-color: transparent">

    </div>
</div>
<span class="btn btn-success" onclick="saveInvoiced();"><span class="glyphicon glyphicon-plus"></span> Add</span><br><br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="invoiced-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Business name</th>
                <th>RFC/TAX ID</th>
                <th>Phone</th>
                <th>Contact name</th>
                <th>Contact job</th>
                <th>E-mail</th>
                <th width="210px;">Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</div>