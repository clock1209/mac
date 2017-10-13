<div id="sb-form">
    <h4 class="n-caption">Custom Broker</h4>
    <div class="form-group">
        <div class="col-md-2 col-sm-12 {{ $errors->has('nameBroker') ? ' has-error' : '' }}">
            <label for="select_name_lbl" class="control-label">Name*:</label>
            {!! Form::text('nameBroker', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-2 col-sm-12 {{ $errors->has('patent') ? ' has-error' : '' }}">
            <label for="contact_name_lbl" class="control-label">patent*:</label>
            {!! Form::text('patent', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-2 col-sm-12{{ $errors->has('emailBroker') ? ' has-error' : '' }}">
            <label for="email_lbl" class="control-label">E-mail*:</label>
            {!! Form::email('emailBroker', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-2 col-sm-12 ">
            <label for="Role_lbl" class="input-control">Country code*:</label>
            {!!Form::select('countrycodebroker',$countriesCode,null,['class'=>'form-control'])!!}
        </div>
        <div class="col-md-2 col-sm-12{{ $errors->has('phoneBroker') ? ' has-error' : '' }}">
            <label for="phone_lbl" class="control-label">Phone*:</label>
            {!! Form::text('phoneBroker', null,['class'=>'form-control', 'id'=>'phone_customer_broker']) !!}
        </div>
        <div class="col-md-2 col-sm-12 {{ $errors->has('contact_text') ? ' has-error' : '' }}">
            <label for="contact_namelbl" class="control-label">Contact*:</label>
            {!! Form::text('contact', null,['class'=>'form-control']) !!}
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
                <th width="100px;">Phone</th>
                <th>Contact</th>
                <th width="210px;">Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

@include('customBroker.partials.editModal')
@include('customBroker.partials.scripts')
