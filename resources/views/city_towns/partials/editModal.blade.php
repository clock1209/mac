<div class="modal fade" id="cities_towns_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-title">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4>Edit Country and Towns</h4>
            </div>
            <div class="modal-body">
                <div>
                  <div class="row">
                      <div class="col-md-7 col-sm-10" style="background: rgba(128, 128, 128, 0.14); padding: 15px;
                            border-radius: 15px; margin-left: 30px; margin-bottom:10px;">
                          <div class="col-md-8 text-left">
                              <label for="demurrage_lbl" class="control-label">Country*</label>
                              {!! Form::select('mdl_country', $country, null ,['class'=>'form-control', 'required','id' => 'mdl_country','placeholder' => '','disable' => 'disabled']) !!}
                          </div>
                          <div class="col-md-8 text-left">
                              <label for="demurrage_lbl" class="control-label">Location*</label>
                              {!! Form::select('mdl_city',[], null,['class'=>'form-control', 'required','id'=>'mdl_city','disable' =>'disabled']) !!}
                          </div>
                          <div class="col-md-8 text-left">
                              <label for="demurrage_lbl" class="control-label">Type</label>
                              {!! Form::select('mdl_type',$type ? $type:[''], null,['class'=>'form-control', 'required','id'=>'mdl_type', 'placeholder'=> ' ']) !!}
                          </div>
                      </div>
                  </div>
                </div>{{--note-form--}}
                {!! Form::hidden('idTown', null, ['id' => 'mdlIdTown']) !!}
            </div>{{--modal-body--}}
            <div class="modal-footer">
                <a class="btn btn-primary" id="townsChargeUpdate">Save changes</a>
            </div>{{--modal-footer--}}
        </div>
    </div>
</div>
