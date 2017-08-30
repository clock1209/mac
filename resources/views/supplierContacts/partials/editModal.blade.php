

<div class="modal fade" id="contact_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-title">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4>Edit contact</h4>
            </div>
            <div class="modal-body">
                <div id="ba-form">
                    <div id="sc-form">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12{{ $errors->has('select_an_area') ? ' has-error' : '' }}">
                                <label for="select_an_area_lbl" class="control-label">Select an area*:</label>
                                {!! Form::text('select_an_area', null, ['class'=>'form-control', 'id' => 'mdl_select_an_area']) !!}
                            </div>
                            <div class="col-md-12 col-sm-12 {{ $errors->has('contact_name') ? ' has-error' : '' }}">
                                <label for="contact_name_lbl" class="control-label">Name*:</label>
                                {!! Form::text('contact_name', null,['class'=>'form-control', 'id' => 'mdl_contact_name']) !!}
                            </div>
                            <div class="col-md-12 col-sm-12{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email_lbl" class="control-label">E-mail*:</label>
                                {!! Form::email('email', null,['class'=>'form-control', 'id' => 'mdl_email']) !!}
                            </div>
                            <div class="col-md-12 col-sm-12{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone_lbl" class="control-label">(area code) Phone*:</label>
                                {!! Form::text('phone', null,['class'=>'form-control', 'id' => 'mdl_supplierPhone']) !!}
                            </div>
                        </div>{{--form-group--}}
                    </div>
                    {!! Form::hidden('idContact', null, ['id' => 'mdlIdContact']) !!}
                </div>{{--#ba-form--}}
            </div>{{--modal-body--}}
            <div class="modal-footer">
                <a class="btn btn-primary" id="contactUpdate">Save changes</a>
            </div>{{--modal-footer--}}
        </div>
    </div>
</div>