<div id="sc-form">
    <h4 class="n-caption">Contacts</h4>
    <div class="form-group">
        <div class="col-md-3 col-sm-12{{ $errors->has('select_an_area') ? ' has-error' : '' }}">
            <label for="select_an_area_lbl" class="control-label">Select an area*:</label>
            {!! Form::text('select_an_area', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12 {{ $errors->has('contact_name') ? ' has-error' : '' }}">
            <label for="contact_name_lbl" class="control-label">Name*:</label>
            {!! Form::text('contact_name', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email_lbl" class="control-label">E-mail*:</label>
            {!! Form::email('email', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-3 col-sm-12{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone_lbl" class="control-label">(country code) Phone*:</label>
            <div class="input-group">
                <div class="input-group-btn">
                    {!! Form::select('area_code', $area_codes, $areacode ? $areacode : null, ['class'=>'btn btn-secundary']) !!}
                </div>
                {!! Form::text('phone', null,['class'=>'form-control', 'id' => 'supplierPhone']) !!}
            </div>
        </div>
    </div>{{--form-group--}}
</div>
<span class="btn btn-success" id="btn-contact"><span class="glyphicon glyphicon-plus"></span> Add</span><br><br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="contacts-table">
            <thead>
            <tr>
                <th>Area</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th width="210px;">Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

@include('supplierContacts.partials.editModal')
@include('supplierContacts.partials.script')
