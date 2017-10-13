@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Remarks
@endsection
@section('contentheader_title')
    Remarks
@endsection

@section('main-content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="@if ($tab==0) active @else  @endif"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"><span class="fa fa-sticky-note-o"></span> Notes & Conditions </a></li>
        <li role="presentation" class="@if ($tab==1) active @else @endif"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"><span class="fa fa-balance-scale"></span> Overweight</a></li>
        <li role="presentation" class="@if ($tab==2) active @else @endif"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"><span class="fa fa-check-circle-o"></span> Subject to</a></li>
        <li role="presentation" class="@if ($tab==3) active @else @endif"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"><span class="fa fa-bus"></span> Inlands Charges</a></li>
    </ul>

    <!-- Tab panes -->
    {{ Form::hidden('carrier_id', $idCarrier) }}
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane @if ($tab==0) active @else  @endif" id="tab1">
            @include('remarks.note')
        </div>
        <br>
        <div role="tabpanel" class="tab-pane @if ($tab==1) active @else @endif"  id="tab2">
            @if($overweight)
                @include('overweight.edit')
            @else
                @include('overweight.index')
            @endif
        </div>
        <div role="tabpanel" class="tab-pane @if ($tab==2) active @else @endif" id="tab3">
            @if($subject)
                @include('subject.edit')
            @else
                @include('subject.index')
            @endif
        </div>
        <div role="tabpanel" class="tab-pane @if ($tab==3) active @else @endif" id="tab4">
            @if($inlands)
                @include('inlandscharges.edit')
            @else
                @include('inlandscharges.index')
            @endif
        </div>
    </div>
</div>
@endsection
