@extends('adminlte::layouts.app')

@section('htmlheader_title')
    New Prices
@endsection
@section('contentheader_title')
    New Prices
@endsection

@section('main-content')

<div class="form-group">
    {!! Form::label('name_price', 'Name*') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

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
