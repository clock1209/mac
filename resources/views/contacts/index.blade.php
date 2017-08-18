<h4 style=" font-variant: small-caps; text-shadow: 1px 1px 2px gray;">Contacts</h4>
<div class="form-group">
    <div class="col-md-3 col-sm-12{{ $errors->has('select_an_area') ? ' has-error' : '' }}">
        <label for="select_an_area_lbl" class="input-control">Select an area*:</label>
        {!! Form::text('select_an_area', null, ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12 {{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name_lbl" class="input-control">Name*:</label>
        {!! Form::text('name', null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email_lbl" class="input-control">E-mail*:</label>
        {!! Form::text('email', null,['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="phone_lbl" class="input-control">Phone*:</label>
        {!! Form::text('phone', null,['class'=>'form-control', 'required']) !!}
    </div>
</div>{{--form-group--}}
<a href="#" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add</a><br><br>
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