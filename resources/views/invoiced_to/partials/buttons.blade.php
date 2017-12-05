{{--<a href="{{ route('invoiced.edit', $invoiced->id) }}" class="btn btn-success btn-sm">--}}
    {{--<span class="fa fa-edit"></span> Edit--}}
{{--</a>--}}
<a data-toggle="modal" onclick="getInvoiced({{ $invoiced->id }});" data-target="#invoiced_modal"
   class="btn btn-success btn-sm">
    <i class="fa fa-edit"></i> Edit
</a>
<a class="btn btn-danger btn-sm" onclick="deleteInvoiced({{ $invoiced->id }});">
    <span class="fa fa-trash"></span> Delete
</a>