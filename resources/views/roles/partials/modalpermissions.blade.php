<div class="modal fade" id="permisos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Manage Permissions</h4>
            </div>
            <div class="modal-body" >
                <div class="row" style=" overflow:hidden;
            text-align: center;
            margin:15%;" >
                    <select id="select-permisos" multiple="multiple"  >
                        @if(isset($permisos))
                            @foreach($permisos as $permiso)
                                <option value="{{ $permiso->id }}">{{ $permiso->display_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

            </div>
            <div class="modal-footer background-nuvem">
                <a href="#" data-dismiss="modal" class="btn btn-default">Cerrar</a>
            </div>
        </div>
    </div>
</div>
