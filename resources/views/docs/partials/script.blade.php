@push('scripts')
<script>
    var dTable = $("#docs-table").DataTable({
        ajax: '/docs',
        columns: [
            {data: 'name'},
            {data: 'doc'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},

        ],
        "columnDefs": [ {
        "targets": 1,
        "data": "doc",
        "render": function ( data, type, full, meta )
        {
          return '<a href="docs/'+full.id+'">'+full.name+'</a>';
        } } ]
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
