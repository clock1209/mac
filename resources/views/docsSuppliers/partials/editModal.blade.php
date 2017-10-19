<div class="modal fade" id="view_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-title">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4>Concepts</h4>
            </div>
            <div class="modal-body">
                <div id="view-form">
                    <div class="row">
                        <div class="col-md-12" style="margin:2%;">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 {{ $errors->has('concept_id') ? ' has-error' : '' }}">
                                    <label for="concept_lbl" class="control-label">Concept*:</label>
                                    {!! Form::select('concept_id[]', $concepts , 0, ['class'=>'js-example-basic-multiple','multiple'=>'multiple','id'=>'mdlconcept_id']) !!}
                                </div>
                            </div>
                        </div>
                    </div>{{--form-group--}}
                </div>{{--note-form--}}
            </div>{{--modal-body--}}
            <div class="modal-footer">

            </div>{{--modal-footer--}}
        </div>
    </div>
</div>
