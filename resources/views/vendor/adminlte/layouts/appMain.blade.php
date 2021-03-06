<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>{{ trans('adminlte_lang::message.landingdescriptionpratt') }}</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>

<body data-spy="scroll" data-target="#navigation" data-offset="50">

<div id="app" v-cloak>
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top" style=" background-color:#5CEEFF;" >
        <div class="container" >
            <div class="navbar-header">

                <img  src="{{ asset('/img/logo.png') }}" alt="">
            </div>
            <div class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    @else
                        <li><a>{{ Auth::user()->name }}</a></li>
                    @endif
                    <li>
                        <a href="{{ url('/logout') }}" class="glyphicon glyphicon-share" id="logout"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            <input type="submit" value="logout" style="display: none;" >
                        </form>
                    </li>

                </ul>

            </div><!--/.nav-collapse -->
        </div>
    </div>
    <section id="desc" name="desc">
        <br><br><br><br><br>
        <div id="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 centered">
                        <a href="{{ url('menu') }}">
                            <img  src="{{ asset('/img/Maritime-import.png') }}" width="250" height="150">
                        </a>
                        <h1>Maritime Import</h1>
                    </div>

                    <div class="col-lg-6" centered>
                        <img  src="{{ asset('/img/maritime-exports.png') }}" width="250" height="150">
                        <h1>Maritime Exports</h1>
                    </div>
                </div>


            </div><!--/ .container -->
        </div><!--/ #features -->
    </section>





</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url (mix('/js/app-landing.js')) }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
