@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Users
@endsection

@section('contentheader_title')
    Edit User
@endsection

@section('main-content')
    @include('alerts.messages')
    {!! Form::model($user,['route' => ['users.update',$user->id], 'method' => 'PUT','class' =>'form-horizontal' ,'files'=>true]) !!}

    @include('users.partials.inputs')

    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            <a href="{{ url('/users') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
        </div>
    </div>
    {!! Form::close() !!}


@endsection
