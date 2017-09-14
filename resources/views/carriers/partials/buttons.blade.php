<a href="carriers/{{$carrier->id}}/edit" carrierid="{{ $carrier->id }}" class="btn btn-success btn-sm"><span class="fa fa-edit"></span> Edit</a>
@if($carrier->status)
    <a carrier_id="{{ $carrier->id }}" class="btn btn-danger btn-sm delete-carrier  "><span class="fa fa-trash"></span> Delete</a>
@else
    <a carrier_id="{{ $carrier->id }}" class="btn btn-success btn-sm activate-carrier"><span class="fa fa-check"></span> Activate</a>
@endif
