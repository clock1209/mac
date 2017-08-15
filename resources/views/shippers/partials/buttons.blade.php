<a href="shippers/{{$shipper->id }}/edit" class="btn btn-success btn-sm"><span class="fa fa-edit"></span> Edit</a>
<a href="#" class="btn btn-info btn-sm"><span class="fa fa-anchor"></span> Ports</a>
<a id_shipper="{{ $shipper->id }}" class="btn btn-danger btn-sm status-shipper" shipper_name="{{ $shipper->tradename }}">
    <span class="fa fa-trash"></span> Delete
</a>