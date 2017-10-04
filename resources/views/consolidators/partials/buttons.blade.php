@if(!str_contains(url()->previous(),'create'))
    <a href="{{$consolidator->edit_url}}" class="btn btn-success btn-sm"><span class="fa fa-edit"></span> Edit</a>
@endif
@if($consolidator->status)
    <a consolidator_id="{{ $consolidator->id }}" class="btn btn-danger btn-sm delete-consolidator"><span class="fa fa-trash"></span> Delete</a>
@else
    <a consolidator_id="{{ $consolidator->id }}" class="btn btn-success btn-sm activate-consolidator"><span class="fa fa-check"></span> Activate</a>
@endif
    <a consolidator_id="{{ $consolidator->id }}" href="{{$consolidator->stuff_url}}" class="btn btn-default btn-sm">
        <span class="fa fa-check"></span> Stuff
    </a>
    <a consolidator_id="{{ $consolidator->id }}" href="{{$consolidator->mcc_url}}" class="btn btn-default btn-sm">
        <span class="fa fa-check"></span> Mcc
    </a>