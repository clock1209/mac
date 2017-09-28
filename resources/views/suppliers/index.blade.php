@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Suppliers
@endsection
@section('contentheader_title')
    Suppliers
@endsection

@section('main-content')
@permission('create_suppliers')
    <a class="btn btn-default" href="{{ route('suppliers.create') }}"><b>New supplier</b></a>@endpermission<br><br>
    <div class="box box-solid">
        <div class="panel-body" style="overflow-x: auto; height:100%;">
            <table class="table table-bordered table-hover" id="suppliers-table">
                <thead>
                <tr>
                    <th>Abbreviation</th>
                    <th>Name</th>
                    <th width="210px;">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('suppliers.partials.script')

@endsection
