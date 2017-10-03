@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Carrier
@endsection
@section('contentheader_title')
  Carriers
@endsection

@section('main-content')
@include('alerts.messages')

{!! Form::close() !!}
@permission('create_carriers')
<div class="row">

    <div class="col-md-6">
        <a class="btn btn-default" href="{{ route('carriers.create') }}"><b>New Carrier</b></a>
    </div>

</div>
@endpermission
<br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="carrier-table">
            <thead>
            <tr>
                <th>Abbreviation</th>
                <th>Name</th>
                @permission('create_carrierports')
                <th>Ports</th>
                @endpermission
                <th width="210px;">Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</div>


<br>

    @include('carriers.partials.script')
@endsection
