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
            <a href="{{ url('/home') }}"></a>
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
            <a style="background-color:#0D9316;">
            <email-reset-password-form></email-reset-password-form>
            </a>
            {{--<button type="submit" class="btn btn-primary" style="background-color:#0D9316;"   >--}}
                {{--<span class="glyphicon glyphicon-ok"></span>--}}
                {{--Send--}}
            {{--</button>--}}
            {{--<button onclick="{{ url('/login') }}"  class="btn btn-primary" style="background-color:#FF1C06;"   >--}}
                {{--<span class="glyphicon glyphicon-remove"></span>--}}
                {{--Cancel--}}
            {{--</button>--}}

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
