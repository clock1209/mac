@extends('adminlte::layouts.app')



@section('htmlheader_title')
    Roles
@endsection

@section('contentheader_title')
    @permission('create_role')
    <a class="btn btn-success btn-md addNew" href="{{ route('roles.create') }}"><i class="glyphicon glyphicon-plus"></i> <t class="hidden-xs">ADD NEW ROLE</t></a>
    @endpermission
@endsection

@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">
            @include('alerts.messages')
            <div class="panel panel-default">
                <div class="panel-body table-responsive bgn">
                    <table class="table table-hover" id="roles">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role</th>
                            <th style="width: 38%">Opciones</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('roles.partials.modalinfo')
    @include('roles.partials.modalpermissions')
    @include('roles.partials.script')

@endsection