<div class="modal fade" id="invoiced_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-title">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4>Edit Invoiced</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">Name*:</label>
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">Business name:</label>
                        {!! Form::text('business_name',null,['class'=>'form-control']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">RFC:</label>
                        {!! Form::text('rfc',null,['class'=>'form-control']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">phone:</label>
                        {!! Form::text('phone',null,['class'=>'form-control phone-mask']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">street:</label>
                        {!! Form::text('street',null,['class'=>'form-control']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">Number:</label>
                        {!! Form::text('outside_number',null,['class'=>'form-control']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">Suburb:</label>
                        {!! Form::text('suburb',null,['class'=>'form-control']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">City:</label>
                        {!! Form::select('city', [''],null,['class'=>'form-control selectCity']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">State:</label>
                        {!! Form::text('state',null,['class'=>'form-control']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">Country:</label>
                        {!! Form::select('country', $countries, null, ['class'=>'form-control']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">Country code:</label>
                        {!! Form::select('country_code', $countriesCode,null,['class'=>'form-control']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">Zip code:</label>
                        {!! Form::text('zip_code',null,['class'=>'form-control']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">Email:</label>
                        {!! Form::email('email',null,['class'=>'form-control']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">Contact name:</label>
                        {!! Form::text('contact_name',null,['class'=>'form-control']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="input-control">Contact job:</label>
                        {!! Form::text('contact_job',null,['class'=>'form-control']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>{{--modal-body--}}
            <div class="modal-footer">
                <a class="btn btn-primary" id="btn_model">Save changes</a>
            </div>{{--modal-footer--}}
        </div>
    </div>
</div>
