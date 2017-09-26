@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Create consolidator
@endsection

@section('contentheader_title')

@endsection

@section('main-content')
    @include('alerts.messages')
    {!! Form::open(['route'=>'consolidators.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}

    @include('consolidators.partials.inputs')
    @include('consolidators.partials.script')

    <br>
    <button type="submit" class="btn btn-success"><span class="fa fa-plus"></span> Add</button>
    <a href="{{ url('/consolidators') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}

    <br/>
    <br/>
    <br/>
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="consolidators-table">
                <thead>
                <tr>
                    <th>Abbreviation</th>
                    <th>Name</th>
                    <th>Estatus</th>
                    <th width="210px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
