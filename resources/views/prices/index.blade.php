@extends('adminlte::layouts.app')

@section('htmlheader_title')
    New Prices
@endsection
@section('contentheader_title')
    New Prices
@endsection

@section('main-content')
  {!! Form::open(['route'=>'prices.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
<div class="form-group">
  <div class="col-md-4 col-sm-8{{ $errors->has('name') ? ' has-error' : '' }}">
      {!! Form::text('name', null, ['class' => 'form-control','required','placeholder'=>'Name*' ]) !!}
      <span class="help-block">{{ $errors->first('name') }}</span>
  </div>
  <div class="col-md-2 col-sm-8">
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
  </div>
</div>
{!! Form::close() !!}
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="prices-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th width="210px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('prices.partials.script')

@endsection
