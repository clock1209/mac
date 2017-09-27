@extends('adminlte::layouts.app')

@section('htmlheader_title')
    New Carrier
@endsection

@section('contentheader_title')
    New Carrier
@endsection

@section('main-content')
    @include('alerts.messages')
    {!! Form::open(['route'=>'carriers.store', 'method'=>'POST']) !!}
    <div class="row">

        <div class="col-md-4">

            <div class="form-group">
                {!! Form::label('name_abrev', 'Abbreviation*') !!}
                {!! Form::text('abbreviation', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
              {!! Form::label('name_', 'Name*') !!}
              {!! Form::text('name', null, ['class' => 'form-control']) !!}
          </div>
        </div>

    </div>
    <div class="col-md-2">  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Add</button></div>
    {{--<div class="col-md-2">  <a href="{{ route('consolidators.index') }}" class="btn btn-danger"><span class="glyphicon glyphicon--remove-sign"></span> Cancel</a></div>--}}

    @include('carriers.partials.script')
@endsection
