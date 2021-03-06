{!! Form::open(['route'=>'subject.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}

<div class="form-group">
    <div class="col-md-3 col-sm-12">
        <label for="concept_lbl" class="control-label">Concept*:</label>
        {!! Form::select('concept_id',$concepts,$subject ? $concepts->id : null,['class'=>'form-control', 'required','placeholder'=> ' ']) !!}
    </div>
    <div class="col-md-3 col-sm-12{{ $errors->has('cost') ? ' has-error' : '' }}">
        <label for="cost_lbl" class="control-label">Cost*:</label>
        {!! Form::text('cost', $subject ? $subject->cost : null,['class'=>'form-control','id' => 'cost']) !!}
    </div>
    <div class="col-md-3 col-sm-12 {{ $errors->has('currency') ? ' has-error' : '' }}">
        <label for="currency_lbl" class="control-label">Currency*:</label><br>
        {!! Form::select('currency',[''],$subject ? $subject->currency : null,['class'=>'form-control', 'required','id' => 'currency-st']) !!}
    </div>
</div>
<br>
<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
<br><br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
    <table class="table table-bordered table-hover" id="subject-table">
        <thead>
        <tr>
            <th>Concepts</th>
            <th>Cost</th>
            <th>Currency</th>
            <th width="210px;">Actions</th>
        </tr>
        </thead>
    </table>
  </div>
</div>
{!! Form::close() !!}
@include('subject.partials.script')
