@push('scripts')
<script>
var searchParams = new URLSearchParams(window.location.search);
var id=searchParams.get("id")

$( "#customer_id" ).val( id );

    var dTable = $("#docs-table").DataTable({
        ajax: '/docs?id='+id,
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
          return '<a href="docs/'+full.id+'">'+full.name+'</a>';
        }
      }]
    });

    @if (Session::has('message'))

        sAlert(
        "{{ Session::get('message.title') }}",
        "{{ Session::get('message.type') }}",
        "{{ Session::get('message.text') }}"
    );

    {{Session::forget('message')}}
    @endif

    function sAlert(title, type, text) {
        swal({
            title: title,
            type: type,
            text: text,
            confirmButtonText: "Continue",
            closeOnConfirm: true,
            timer: 2000
        }).then(
            function() {
                if (text == 'can not view file, try to download file') {
                    window.close();
                }
            },
            // handling the promise rejection
            function(dismiss) {
                if (text == 'can not view file, try to download file') {
                    window.close();
                }
            }
        )
    }


</script>
@endpush
