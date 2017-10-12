@push('scripts')
<script>
var searchParams = new URLSearchParams(window.location.search);
var id=searchParams.get("id")
$( "#supplier_id" ).val(id);
    var dTable = $("#docsSuppliers-table").DataTable({
        ajax: '/docssupplier?id='+id,
        columns: [
            {data: 'reference_number'},
            {data: 'bill'},
            {data: 'bank_account'},
            {data: 'concepts'},
            {data: 'cost'},
            {data: 'doc'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
        ],
        "columnDefs": [{
            "targets": 5,
            "data": "doc",
            "render": function ( data, type, full, meta )
            {
                return '<a href="docssupplier/'+full.id+'">'+full.name+'</a>';
            }
      }],
    });
        var dTable = $("#supplierReference-table").DataTable({
            ajax: '/docssupplier/'+id+'/filter',
            columns: [
                {data: 'name'},
                {data: 'doc'},
                {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
            ],
            "columnDefs": [{
                "targets": 1,
                "data": "doc",
                "render": function ( data, type, full, meta )
                {
                    return '<a href="docssupplier/'+full.id+'">'+full.name+'</a>';
                }
          }],
        });

    @if (Session::has('message'))
        sAlert(
            "{{ Session::get('message.title') }}",
            "{{ Session::get('message.type') }}",
            "{{ Session::get('message.text') }}"
        );
    @endif

    function sAlert(title, type, text)
    {
        swal({
            title: title,
            type: type,
            text: text,
            confirmButtonText: "Continue",
            timer: 3000
        });
    }

</script>
@endpush
