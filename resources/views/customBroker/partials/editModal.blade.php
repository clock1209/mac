<div class="modal fade" id="customBroker_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-title">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4>Edit Custom Broker</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <div class="col-md-4 col-sm-12 {{ $errors->has('nameBroker') ? ' has-error' : '' }}">
                      <label for="select_name_lbl" class="control-label">Name*:</label>
                      {!! Form::text('nameBroker', null, ['class'=>'form-control','id' => 'mdlNameBroker']) !!}
                  </div>
                  <div class="col-md-4 col-sm-12 {{ $errors->has('patent') ? ' has-error' : '' }}">
                      <label for="contact_name_lbl" class="control-label">patent*:</label>
                      {!! Form::text('patent', null,['class'=>'form-control','id' => 'mdlPatent']) !!}
                  </div>
                  <div class="col-md-4 col-sm-12{{ $errors->has('emailBroker') ? ' has-error' : '' }}">
                      <label for="email_lbl" class="control-label">E-mail*:</label>
                      {!! Form::email('emailBroker', null,['class'=>'form-control','id' => 'mdlEmailBroker']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-md-4 col-sm-12 ">
                      <label for="Role_lbl" class="input-control">Country code*:</label>
                      {!!Form::select('countrycodebroker',$countriesCode,null,['class'=>'form-control','id' => 'mdlCountryCodeBroker'])!!}
                  </div>
                  <div class="col-md-4 col-sm-12{{ $errors->has('phoneBroker') ? ' has-error' : '' }}">
                      <label for="phone_lbl" class="control-label">Phone*:</label>
                      {!! Form::text('phoneBroker', null,['class'=>'form-control','id' => 'mdlPhoneBroker']) !!}
                  </div>
                  <div class="col-md-4 col-sm-12 {{ $errors->has('contact_text') ? ' has-error' : '' }}">
                      <label for="contact_namelbl" class="control-label">Contact*:</label>
                      {!! Form::text('contact', null,['class'=>'form-control','id' => 'mdlContact']) !!}
                  </div>
              </div>
            </div>{{--modal-body--}}
            {!! Form::hidden('idCustomBroker', null, ['id' => 'MdlIdCustomBroker']) !!}
            <div class="modal-footer">
                <a class="btn btn-primary" id="customBrokerUpdate">Save changes</a>
            </div>{{--modal-footer--}}
        </div>
    </div>
</div>
