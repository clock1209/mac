@permission('edit_customer')
    <a href="customers/{{$customer->id }}/edit" class="btn btn-success btn-sm"><span class="fa fa-edit"></span> Edit</a>
@endpermission
@permission('delete_customer')
    <a id_customer="{{ $customer->id }}" class="btn btn-danger btn-sm status-supplier" customer_name="{{ $customer->name }}">
        <span class="fa fa-trash"></span> Delete
    </a>
@endpermission
@permission('create_shipper')
    <a class="btn btn-default btn-sm" href="{{ route('shippers.index') }}?id={{$customer->id }}"><b>Shippers</b></a>
@endpermission
@permission('see_docs')
    <a href="docs?id={{$customer->id }}" class="btn btn-info btn-sm"><span class="fa fa-file"></span> Docs</a>
@endpermission
