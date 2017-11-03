@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Create City and Towns
@endsection
@section('contentheader_title')
    Create City and Towns
@endsection

@section('main-content')
    <div class="row" style="margin-bottom:2%;">
        <div class="col-lg-2 col-md-3 col-sm-12 ">
            <label for="currency_lbl" class="control-label">Country*:</label><br>
            <div class="input-group">
                {!! Form::select('country', $country, null ,['class'=>'form-control', 'required','id' => 'country','placeholder' => '']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" onclick="addCountry()" data-toggle="tooltip" title="Add new">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </span>
            </div><!-- /input-group -->
        </div>
        <div class="col-md-3 col-sm-8">
            <label for="demurrage_lbl" class="control-label">Location*</label>
            <div class="input-group">
                {!! Form::select('city',[], null,['class'=>'form-control', 'required','id'=>'city']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" onclick="addCity()" data-toggle="tooltip" title="Add new">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </span>
            </div><!-- /input-group -->
        </div>
        <div class="col-md-3 col-sm-8">
            <label for="demurrage_lbl" class="control-label">Type*</label>
            <div class="input-group">
                {!! Form::select('swal_type',$type ? $type:[''], null,['class'=>'form-control', 'required','id'=>'type', 'placeholder'=> ' ']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" onclick="addCity()" data-toggle="tooltip" title="Add new">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </span>
            </div><!-- /input-group -->
        </div>
    </div>
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="city_town-table">
                <thead>
                <tr>
                    <th>Country</th>
                    <th>City</th>
                    <th>Type</th>
                    <th width="210px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@include('city_towns.partials.script')
@endsection
