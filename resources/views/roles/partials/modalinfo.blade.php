<div class="modal fade" id="mostrar_rol">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-nuvem"  style="background: #1792a4; color: white;">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Role Details</h4>
            </div>
            <div class="modal-body">
                <div class="row" id="etq">
                    <div class="form-group col-md-6">
                        {{--<div class="input-group-addon">Nombre de Rol:</div>--}}
                        <small class="lbl_modal">Role Name:</small>
                        {!! Form::label('name', null, ['class'=>'form-control', 'id'=>'name']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        <small class="lbl_modal">Display Name:</small>
                        {!! Form::label('display_name', null, ['class'=>'form-control', 'id'=>'display_name']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <small class="lbl_modal">Description:</small>
                    {!! Form::label('description', null, ['class'=>'form-control', 'id'=>'description']) !!}
                </div>
            </div>
            <div class="modal-footer background-nuvem">
                <a href="#" data-dismiss="modal" class="btn btn-default">Cerrar</a>
            </div>
        </div>
    </div>
</div>
