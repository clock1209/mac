@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Edit role
@endsection


@section('contentheader_title')
@endsection

@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('alerts.messages')
                <div class="panel panel-default">
                    <div class="panel-heading header-nuvem">Edit Role</div>

                    <div class="panel-body bgn">
                        {!!Form::model($role, ['route'=> ['roles.update',$role->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}
                        @include('roles.partials.inputs')
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection