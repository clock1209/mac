@permission('edit_suppliers')
<a href="suppliers/{{$supplier->id }}/edit" class="btn btn-success btn-sm"><span class="fa fa-edit"></span> Edit</a>
@endpermission
@permission('delete_suppliers')
<a id_supplier="{{ $supplier->id }}" class="btn btn-danger btn-sm status-supplier" supplier_name="{{ $supplier->tradename }}">
    <span class="fa fa-trash"></span> Delete
</a>
@endpermission
<a href="#" class="btn btn-info btn-sm"><span class="fa fa-file"></span> Docs</a>
