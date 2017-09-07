<a href="customers/{{$customer->id }}/edit" class="btn btn-success btn-sm"><span class="fa fa-edit"></span> Edit</a>
<a id_customer="{{ $customer->id }}" class="btn btn-danger btn-sm status-supplier" customer_name="{{ $customer->name }}">
    <span class="fa fa-trash"></span> Delete
</a>
<a href="{{ url('docs') }}" class="btn btn-info btn-sm"><span class="fa fa-file"></span> Docs</a>
