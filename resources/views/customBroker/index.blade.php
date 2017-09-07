<div id="sc-form">
    <h4 class="n-caption">Custom Broker</h4>
    <div class="form-group">
        <div class="col-md-2 col-sm-12 col-md-offset-1{{ $errors->has('select_an_area') ? ' has-error' : '' }}">
            <label for="select_name_lbl" class="control-label">Name*:</label>
            {!! Form::text('nameBroker', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-2 col-sm-12 {{ $errors->has('contact_name') ? ' has-error' : '' }}">
            <label for="contact_name_lbl" class="control-label">patent*:</label>
            {!! Form::text('patent', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-2 col-sm-12{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email_lbl" class="control-label">E-mail*:</label>
            {!! Form::email('emailBroker', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-2 col-sm-12 ">
            <label for="Role_lbl" class="input-control">Country code*:</label>
            {!!Form::select('countrycodebroker',$countriesCode,null,['class'=>'form-control'])!!}
        </div>
        <div class="col-md-2 col-sm-12{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone_lbl" class="control-label">Phone*:</label>
            {!! Form::text('phoneBroker', null,['class'=>'form-control']) !!}
        </div>
    </div>{{--form-group--}}
</div>
<span class="btn btn-success" id="btn-customBroker"><span class="glyphicon glyphicon-plus"></span> Add</span><br><br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="broker-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Patent</th>
                <th>Email</th>
                <th>Phone</th>
                <th width="210px;">Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

{{--<div class="form-group">--}}
    {{--<div class="col-md-2 col-sm-12">--}}
        {{--<label for="checkbox_lbl" class="input-control">All in rate:</label>--}}
        {{--{!! Form::checkbox('allRate', 'value', false) !!}--}}
        {{--<label for="checkbox_lbl" class="input-control">Logistic & cargo:</label>--}}
        {{--{!! Form::checkbox('logistic&cargo', 'value', false) !!}--}}
        {{--<label for="checkbox_lbl" class="input-control">Overweight:</label>--}}
        {{--{!! Form::checkbox('overweight', 'value', false) !!}--}}
        {{--<label for="profit_lbl" class="input-control">Profit:</label>--}}
        {{--{!! Form::text('profit',null,['class'=>'form-control']) !!}--}}
    {{--</div>--}}
    {{--<div class="col-md-2 col-sm-12" style="border-color: transparent">--}}
        {{--<label for="username_lbl" class="input-control">Carrier inlad costo:</label>--}}
        {{--{!! Form::checkbox('carriercost', 'value', false) !!}--}}
        {{--{!!Form::select('carrier',['All truck','Rail + truck','Rail ramp'],null,['class'=>'form-control'])!!}--}}
    {{--</div>--}}
{{--</div>--}}
@include('customBroker.partials.scripts')