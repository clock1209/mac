@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Password recovery
@endsection

@section('content')

    <body class="login-page" style="background-color:#02A9F0;">
    <img  src="{{ asset('/img/logo.png') }}" alt="">
    <div id="app">

        <div class="login-box">
            <div class="login-logo">
            </div><!-- /.login-logo -->

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="login-box-body" style="background-color:#02A9F0;">
                <p class="login-box-msg" style="color:#000000;">Tape your email and we will send you your new password</p>
                <p class="login-box-msg" style="color:#000000;">Email:</p>
                <a style="background-color:#0D9316;"></a>
                    <form action="{{ url('/password/email') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" autofocus/>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>

                        <div class="row">
                            <div class="col-xs-2">
                            </div><!-- /.col -->
                            <div class="col-xs-8">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.sendpassword') }}</button>
                            </div><!-- /.col -->
                            <div class="col-xs-2">
                            </div><!-- /.col -->
                        </div>
                    </form>

                     <a href="{{ url('/login') }}"> Log in</a><br>
                    <a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>

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