@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Create City and Towns
@endsection
@section('contentheader_title')
    Create City and Towns
@endsection

@section('main-content')
    <div class="row" style="margin-bottom:2%;">
        <div class="col-md-4 col-sm-12 ">
            <label for="currency_lbl" class="control-label">Country*:</label><br>
            <div class="input-group">
                {!! Form::select('country', $country, null ,['class'=>'form-control', 'required','id' => 'country','placeholder' => '']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-primary editCountry" type="button" onclick="editCountry()" data-toggle="tooltip" title="Edit name contry">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                    <button class="btn btn-primary" type="button" onclick="addCountry()" data-toggle="tooltip" title="Add new">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </span>
            </div><!-- /input-group -->
        </div>
        <div class="col-md-4 col-sm-8">
            <label for="demurrage_lbl" class="control-label">Location*</label>
            <div class="input-group">
                {!! Form::select('city',[], null,['class'=>'form-control', 'required','id'=>'city']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-primary editCity" type="button" onclick="editCity()" data-toggle="tooltip" title="Edit name city">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                    <button class="btn btn-primary" type="button" onclick="addCity()" data-toggle="tooltip" title="Add new">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </span>
            </div><!-- /input-group -->
        </div>
        <div class="col-md-4 col-sm-8">
            <label for="demurrage_lbl" class="control-label">Type*</label>
            <div class="input-group">
                {!! Form::select('swal_type',$type ? $type:[''], null,['class'=>'form-control', 'required','id'=>'type', 'placeholder'=> ' ']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-primary editType" type="button" onclick="editType()" data-toggle="tooltip" title="Edit name Type">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                    <button class="btn btn-primary" type="button" onclick="addType()" data-toggle="tooltip" title="Add new">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                    <button class="btn btn-danger" type="button" onclick="deleteType()" data-toggle="tooltip" title="Delete type">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </span>
            </div><!-- /input-group -->
        </div>
    </div>
    <div class="row" style="margin-bottom:2%;">
        <div class="col-md-4 col-sm-8">
            <label for="demurrage_lbl" class="control-label">Search Location:</label>
            <div class="input-group">
                {!! Form::text('search_location',null,['class'=>'form-control','id'=>'search_location']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" onclick="searchLocation()">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div><!-- /input-group -->
        </div>
    </div>
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="city_town_table">
                <thead>
                <tr>
                    <th>Country</th>
                    <th>Location</th>
                    <th>Type</th>
                    <th width="210px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@include('city_towns.partials.editModal')
@include('city_towns.partials.script')
@endsection
