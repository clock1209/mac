@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Docs Suppliers
@endsection
@section('contentheader_title')
    Docs Suppliers
@endsection

@section('main-content')
@include('alerts.messages')
<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="@if ($tab==0) active @else  @endif"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"><span class="fa fa-user"></span> Reference </a></li>
        <li role="presentation" class="@if ($tab==1) active @else @endif"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"><span class="fa fa-file-text-o"></span> Bill</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane @if ($tab==0) active @else  @endif" id="tab1">
            @include('docsSuppliers.partials.reference')
        </div>
        <br>
        <div role="tabpanel" class="tab-pane @if ($tab==1) active @else @endif"  id="tab2">
            @include('docsSuppliers.partials.bill')
          {{--  @if($overweight)
                @include('overweight.edit')
            @else
                @include('overweight.index')
            @endif --}}
        </div>
    </div>
</div>
@include('docsSuppliers.partials.script')
@endsection
