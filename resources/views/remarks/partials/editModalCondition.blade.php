<div class="modal fade" id="condition_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-title">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4>Edit Condition</h4>
            </div>
            <div class="modal-body">
                <div id="condition-form">
                  <div class="row">
                      <div class="col-md-8 text-right">
                          <label for="demurrage_lbl" class="control-label">Free demurrage at destinations</label>
                          {{ Form::text('free_demurrage', null,array('class' => 'field','id' => 'mdl_free_demurrage')) }}
                          Days.
                      </div>
                      <div class="col-md-8 text-right">
                          <label for="demurrage_lbl" class="control-label">One day after ETA</label>
                          {{ Form::checkbox('after_eta',0, old('after_eta'),['class'=>'field','id' => 'mdl_after_eta']) }}
                      </div>
                      <div class="col-md-8 text-right">
                          <label for="demurrage_lbl" class="control-label">ETA day</label>
                          {{ Form::checkbox('eta_day',0, old('eta_day'),['class'=>'field','id' => 'mdl_eta_day']) }}
                      </div>
                      <div class="col-md-8 text-right">
                          <label for="demurrage_lbl" class="control-label">Operation completed</label>
                          {{ Form::checkbox('operation',0, old('operation'),['class'=>'field','id' => 'mdl_operation']) }}
                      </div>
                      <div class="col-md-8 text-right">
                          <label for="demurrage_lbl" class="control-label">Price per day</label>
                          {{ Form::text('price_day', null,array('class' => 'field','id' => 'mdl_price_day')) }}
                      </div>
                  </div>
                </div>{{--note-form--}}
                {!! Form::hidden('idCondition', null, ['id' => 'mdlIdCondition']) !!}
            </div>{{--modal-body--}}
            <div class="modal-footer">
                <a class="btn btn-primary" id="conditionChargeUpdate">Save changes</a>
            </div>{{--modal-footer--}}
        </div>
    </div>
</div>
