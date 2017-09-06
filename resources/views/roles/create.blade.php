@extends('adminlte::layouts.app')

@section('htmlheader_title')
    New Role
@endsection

@section('contentheader_title')
@endsection

@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('alerts.messages')
                <div class="panel panel-default">
                    <div class="panel-heading header-nuvem"> NEW ROLE</div>
                    <div class="panel-body bgn">
                        {!!Form::open(['route'=>'roles.store', 'method'=>'POST', 'class' => 'form-horizontal'])!!}
                        @include('roles.partials.inputs')
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>

@endsection


{{-- style="color: #777789" --}}