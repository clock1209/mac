<div class="form-group">
    <div class="col-md-4 col-sm-12">
        <label for="username_lbl" class="input-control">{{$msgErrorName}}*:</label>
        {!! Form::text('username',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-4 col-md-offset-1 col-sm-12" style="border-color: transparent">
        <label for="username_lbl" class="input-control">Signature*:</label>
        {!! Form::file('signature',['class'=>'form-control-file']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-sm-12">
        <label for="email_lbl" class="input-control">E-mail*:</label>
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-4 col-md-offset-1 col-sm-12 ">
        <label for="Role_lbl" class="input-control">Role*:</label>
        {!!Form::select('role',$data, null,['class'=>'form-control'])!!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-4  ">
        <label for="password_lbl" class="input-control">Password*:</label>
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class=" col-sm-4 ">
        <label for="" class="input-control">{{$msgError}}*:</label>
        {!! Form::password('confirmPass',['class'=>'form-control']) !!}
    </div>
</div>
