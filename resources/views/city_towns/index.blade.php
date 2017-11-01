@extends('adminlte::layouts.app')

@section('htmlheader_title')
    City and Towns
@endsection
@section('contentheader_title')
    City and Towns
@endsection

@section('main-content')
    <div class="row" style="margin-bottom:2%;">
        <div class="col-lg-2 col-md-3 col-sm-12 {{ $errors->has('currency') ? ' has-error' : '' }}">
            <label for="currency_lbl" class="control-label">Country*:</label><br>
            {!! Form::select('country', $country, null ,['class'=>'form-control', 'required','id' => 'country','placeholder' => '']) !!}
        </div>
        <div class="col-md-3 col-sm-8{{ $errors->has('container') ? ' has-error' : '' }}">
            <label for="demurrage_lbl" class="control-label">City*</label>
            {!! Form::select('city',[], null,['class'=>'form-control', 'required','id'=>'city']) !!}
        </div>
        <div class="col-md-3 col-sm-8 {{ $errors->has('port_name') ? ' has-error' : '' }}">
            <label for="demurrage_lbl" class="control-label">Description*</label>
            {!! Form::text('port_name', null,['class'=>'form-control', 'required','id'=>'port_name']) !!}
        </div>
        <div class="col-md-3 col-sm-8{{ $errors->has('type') ? ' has-error' : '' }}">
            <label for="demurrage_lbl" class="control-label">Type*</label>
            {!! Form::select('type',[0 => ' ','Port' => 'Port', 'Location' => 'Location','Town' => 'Town'], null,['class'=>'form-control', 'required','id'=>'type']) !!}
        </div>
    </div>
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="city_town-table">
                <thead>
                <tr>
                    <th>Country</th>
                    <th>City</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th width="210px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@include('city_towns.partials.script')
@endsection
