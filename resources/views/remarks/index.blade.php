@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Remarks
@endsection
@section('contentheader_title')
    Remarks
@endsection

@section('main-content')
<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="@if ($overweight)  @else active @endif"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"><span class="fa fa-sticky-note-o"></span> Notes & Conditions </a></li>
        <li role="presentation" class="@if ($overweight) active @else @endif"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"><span class="fa fa-balance-scale"></span> Overweight</a></li>
        <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"><span class="fa fa-check-circle-o"></span> Subject to</a></li>
        <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"><span class="fa fa-bus"></span> Inlands Charges</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane @if ($overweight)  @else active @endif" id="tab1">
          @include('remarks.note')
        </div>
        <br>
        <div role="tabpanel" class="tab-pane @if ($overweight) active @else @endif"  id="tab2">
        
          @if($overweight)
              @include('overweight.edit')
          @else
              @include('overweight.index')
          @endif

        </div>
        <div role="tabpanel" class="tab-pane" id="tab3">
          TAB 3
          {!! Form::open(['route'=>'remarks.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
        <div class="form-group">
          <div class="col-md-4 col-sm-8{{ $errors->has('name') ? ' has-error' : '' }}">
              {!! Form::textarea('name', null, ['class' => 'form-control','required','placeholder'=>'Name*' ]) !!}
          </div>
          <div class="col-md-2 col-sm-8{{ $errors->has('name') ? ' has-error' : '' }}">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
          </div>
        </div>
        {!! Form::close() !!}
        </div>
        <div role="tabpanel" class="tab-pane" id="tab4">
          TAB 4
          {!! Form::open(['route'=>'remarks.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
        <div class="form-group">
          <div class="col-md-4 col-sm-8{{ $errors->has('name') ? ' has-error' : '' }}">
              {!! Form::textarea('name', null, ['class' => 'form-control','required','placeholder'=>'Name*' ]) !!}
          </div>
          <div class="col-md-2 col-sm-8{{ $errors->has('name') ? ' has-error' : '' }}">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
          </div>
        </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
