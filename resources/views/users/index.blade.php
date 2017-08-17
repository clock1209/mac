@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Users
@endsection
@section('contentheader_title')
    Users
@endsection

{{--@include('role.partials.header')--}}

@section('main-content')
    <a class="btn btn-default" href="{{ route('users.create') }}"><b>New User</b></a>
    <br><br>
    <div class="box box-solid box-primary">
        <div class="box-body" style="overflow-x: auto;">
            <table class="table table-bordered table-hover" id="users-table">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    {{--@include('shipments.partials.script')--}}

    @include('users.partials.script')

@endsection
