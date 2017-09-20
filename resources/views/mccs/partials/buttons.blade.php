@if($mcc->status)
    <a mcc_id="{{ $mcc->id }}" class="btn btn-danger btn-sm delete-mcc  "><span class="fa fa-trash"></span> Delete</a>
@else
    <a mcc_id="{{ $mcc->id }}" class="btn btn-success btn-sm activate-mcc"><span class="fa fa-check"></span> Activate</a>
@endif
