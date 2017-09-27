{!! Form::open(['route'=>'remarks.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
      <h3>NOTE:</h3>
          <br>
        <div class="form-group">
          <div class="col-md-4 col-sm-8{{ $errors->has('name') ? ' has-error' : '' }}">
              {!! Form::textarea('note', null, ['class' => 'field' ]) !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 col-sm-4{{ $errors->has('nameconditions') ? ' has-error' : '' }}">
            {{ Form::radio('nameconditions','Free demurrage at destinations', old('nameconditions'),['class'=>'field', 'required']) }}
            <label for="demurrage_lbl" class="control-label">Free demurrage at destinations</label>
              {{ Form::text('valueconditionsone', '',array('class' => 'field')) }}
              Days.
          </div>
          <div class="col-md-7 col-sm-4{{ $errors->has('nameconditions') ? ' has-error' : '' }}">
            {{ Form::radio('nameconditions','One day after ETA', old('price'),['class'=>'field', 'required']) }}
            <label for="demurrage_lbl" class="control-label">One day after ETA</label>
          </div>
          <div class="col-md-7 col-sm-4{{ $errors->has('nameconditions') ? ' has-error' : '' }}">
            {{ Form::radio('nameconditions','ETA day', old('price'),['class'=>'field', 'required']) }}
            <label for="demurrage_lbl" class="control-label">ETA day</label>
          </div>

          <div class="col-md-7 col-sm-4{{ $errors->has('nameconditions') ? ' has-error' : '' }}">
            {{ Form::radio('nameconditions','Operation completed', old('price'),['class'=>'field', 'required']) }}
            <label for="demurrage_lbl" class="control-label">Operation completed</label>
          </div>
          <div class="col-md-7 col-sm-4{{ $errors->has('nameconditions') ? ' has-error' : '' }}">
            {{ Form::radio('nameconditions','Price per day', old('price'),['class'=>'field', 'required']) }}
            <label for="demurrage_lbl" class="control-label">Price per day</label>
              {{ Form::text('valueconditionstwo', '',array('class' => 'field')) }}
          </div>
          <div class="col-md-7 col-sm-4{{ $errors->has('nameconditions') ? ' has-error' : '' }}">
            {{ Form::radio('nameconditions','One clock', old('price'),['class'=>'field', 'required']) }}
            <label for="demurrage_lbl" class="control-label">One clock</label>
          </div>
          <div class="col-md-7 col-sm-4{{ $errors->has('nameconditions') ? ' has-error' : '' }}">
            {{ Form::radio('nameconditions','Demurrage and detentions', old('price'),['class'=>'field', 'required']) }}
            <label for="demurrage_lbl" class="control-label">Demurrage and detentions</label>
          </div>
        </div>
        <br>
          <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            <a href="{{ url()->previous(2) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
        {!! Form::close() !!}
@include('remarks.partials.script')
