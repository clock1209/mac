<div class="modal fade" id="note_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-title">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4>Edit Note</h4>
            </div>
            <div class="modal-body">
                <div id="note-form">
                    <div class="row">
                        <div class="col-md-12 col-sm-12{{ $errors->has('notes') ? ' has-error' : '' }}">
                            <label for="notes_lbl" class="control-label">Note*:</label>
                            {!! Form::textarea('note', null, ['class'=>'form-control', 'id' => 'mdl_notes', 'rows'=>'3']) !!}
                        </div>
                    </div>{{--form-group--}}
                </div>{{--note-form--}}
                {!! Form::hidden('idNote', null, ['id' => 'mdlIdNote']) !!}
            </div>{{--modal-body--}}
            <div class="modal-footer">
                <a class="btn btn-primary" id="noteChargeUpdate">Save changes</a>
            </div>{{--modal-footer--}}
        </div>
    </div>
</div>
