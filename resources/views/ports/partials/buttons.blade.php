@if($port->status)
    <a port_id="{{ $port->id }}" class="btn btn-danger btn-sm delete-port"><span class="fa fa-trash"></span> Delete</a>
@else
    <a port_id="{{ $port->id }}" class="btn btn-success btn-sm activate-port"><span class="fa fa-check"></span> Activate</a>
@endif
