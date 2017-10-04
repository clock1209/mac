<h4 style=" font-variant: small-caps; text-shadow: 1px 1px 2px gray;">Stuffs</h4>
<div class="form-group">

    <div class="col-md-4 col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name:_lbl" class="input-control">Name*:</label>
        {{--{!! Form::text('concepts',$stuff ? $stuff->concepts : null,['class'=>'form-control', 'required']) !!}--}}
        {!! Form::select('concepts', $concepts, $stuff ? $stuff->concepts : null, ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('cost') ? ' has-error' : '' }}">
        <label for="cost_lbl" class="input-control">Cost*:</label>
        {!! Form::text('cost',$stuff ? $stuff->cost : null,['class'=>'form-control', 'required']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-4 col-sm-12{{ $errors->has('type') ? ' has-error' : '' }}">
        <label for="type_lbl" class="input-control">Type*:</label>
        {!! Form::select('type', [0 => 'Selecciona una opción','bl' => 'BL', 't/m3' => 'T/M3'], $stuff ? $stuff->type : 0, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('agreed_cost') ? ' has-error' : '' }}">
        <label for="agreed_cost_lbl" class="input-control">Agreed costs*:</label>
        {!! Form::select('agreed_cost', [0 => 'Selecciona una opción', 'main container carrier' => 'Main Container Carrier','agent' => 'Agent'], $stuff ? $stuff->agreed_cost : 0, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

</div>
<div class="form-group">
    <div class="col-md-3 col-sm-12{{ $errors->has('currency') ? ' has-error' : '' }}">
        <label for="currency_lbl" class="input-control">Currency*:</label>
        {!! Form::select('currency',[''],$stuff ? $stuff->currency : null,['class'=>'form-control', 'required','id' => 'currency']) !!}
    </div>
</div>
{!! Form::hidden('consolidator_id', $consolidator) !!}
