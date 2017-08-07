@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
    <body class="hold-transition login-page" style="background-color:#02A9F0;">
    <div id="app" v-cloak>
        <img  src="{{ asset('/img/logo.png') }}" alt="">
        <div class="login-box">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



            <div class="login-box-body" style="background-color:#02A9F0;">
                <p class="login-box-msg"> </p>
                <form action="{{ url('/login') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <login-input-field
                            name="{{ config('auth.providers.users.field','username') }}"
                            domain="{{ config('auth.defaults.domain','') }}"
                    ></login-input-field>
                    <font color="black">
                    <h3>Username:</h3>
                    </font>
                    <div class="form-group has-feedback">
                    <input type="text" class="form-control"  name="username"/>
                    </div>
                    <font color="black">
                    <h3>Password:</h3>
                    </font>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control"  name="password"/>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <a href="{{ url('/password/reset') }}" style="color:#000000;">Forgot it</a><br>
                        </div><!-- /.col -->
                        <div  align="center">
                        <button type="submit" class="btn btn-primary" style="background-color:#0D9316;"   >
                            <span class="glyphicon glyphicon-ok"></span>
                            {{ trans('adminlte_lang::message.buttonsign') }}
                        </button>
                        </div>
                    </div>
                </form>



            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->
    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    </body>

@endsection