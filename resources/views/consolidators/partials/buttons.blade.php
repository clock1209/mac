@if(!str_contains(url()->previous(),'create'))
    <a href="{{$consolidator->edit_url}}" class="btn btn-success btn-sm"><span class="fa fa-edit"></span> Edit</a>
@endif
@permission('delete_consolidators')
@if($consolidator->status)
    <a consolidator_id="{{ $consolidator->id }}" class="btn btn-danger btn-sm delete-consolidator"><span class="fa fa-trash"></span> Delete</a>
@else
    <a consolidator_id="{{ $consolidator->id }}" class="btn btn-success btn-sm activate-consolidator"><span class="fa fa-check"></span> Activate</a>
@endif
@endpermission
