@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Carrier Port
@endsection
@section('contentheader_title')
  Carrier Port
@endsection

@section('main-content')
@include('alerts.messages')

{!! Form::close() !!}
<div class="row">
    <div class="col-md-6">
        <a class="btn btn-default" id="ruta" href="{{ route('carrierport.create') }}"><b>Add port</b></a>
        {{--<a class="btn btn-default" href="{{ route('remarks.create') }}"><b>Remarks</b></a>--}}
    </div>

</div>
<br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="carrierport-table">
            <thead>
            <tr>
                <th>Port</th>
                <th>Frecuency</th>
                <th width="210px;">Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</div>


<br>

    @include('carrierport.partials.script')
@endsection
