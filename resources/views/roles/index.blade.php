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
                <div class="panel-heading"></div>

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

    <div class="modal fade" id="mostrar_rol">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-nuvem"  style="background: #1792a4; color: white;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Role Details</h4>
                </div>
                <div class="modal-body">
                    <div class="row" id="etq">
                        <div class="form-group col-md-6">
                            {{--<div class="input-group-addon">Nombre de Rol:</div>--}}
                            <small class="lbl_modal">Role Name:</small>
                            {!! Form::label('name', null, ['class'=>'form-control', 'id'=>'name']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <small class="lbl_modal">Display Name:</small>
                            {!! Form::label('display_name', null, ['class'=>'form-control', 'id'=>'display_name']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <small class="lbl_modal">Description:</small>
                        {!! Form::label('description', null, ['class'=>'form-control', 'id'=>'description']) !!}
                    </div>
                </div>
                <div class="modal-footer background-nuvem">
                    <a href="#" data-dismiss="modal" class="btn btn-default">Cerrar</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="permisos">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Manage Permissions</h4>
                </div>
                <div class="modal-body" >
                    <div class="row" style=" overflow:hidden;
            text-align: center;
            margin:15%;" >
                        <select id="select-permisos" multiple="multiple"  >
                            @if(isset($permisos))
                                @foreach($permisos as $permiso)
                                     <option value="{{ $permiso->id }}">{{ $permiso->display_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                </div>
                <div class="modal-footer background-nuvem">
                    <a href="#" data-dismiss="modal" class="btn btn-default">Cerrar</a>
                </div>
            </div>
        </div>
    </div>

    @include('roles.partials.script')

@endsection