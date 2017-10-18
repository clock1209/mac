@push('scripts')
<script>
var searchParams = new URLSearchParams(window.location.search);
var id=searchParams.get("id")
$( "#supplier_id" ).val(id);
    var dTable = $("#docsSuppliers-table").DataTable({
        ajax: '/docs-suppliers?id='+id,
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
                return '<a href="docs-suppliers/'+full.id+'">'+full.name+'</a>';
            }
      }]

    });

        var dTable_ = $("#supplierReference-table").DataTable({
            ajax: '/docs-suppliers/'+id+'/filter',
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
                    return '<a href="docs-suppliers/'+full.id+'">'+full.name+'</a>';
                }
          }],
        });

        $('body').delegate('.delete-doc','click',function(){
            id = $(this).attr('doc_id');
            swal({
                title: 'Are you sure?',
                text: "it won't be possible to reverse this action.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, delete this doc!'
            }).then(function () {
                $.ajax({
                    url: '/docs-suppliers/'+id,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {id: id}
                }).done(function(data){
                    sAlert(data.title, data.type, data.text);
                    dTable.ajax.reload();
                    dTable_.ajax.reload();
                });
            });
        });//BUTTON .delete-docs

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

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
        $(".select2-container--default").css({
            minWidth: "350px",
        });

    });

    $('body').delegate('.view-concepts','click',function(){
        id_view = $(this).attr('id_view');
        $.ajax({
            url: '{{ route('bill.concepts',['id'=>'+id_view+']) }}',
            type : 'GET',
            dataType: 'json',
            data : {id: id_view}
        }).done(function(data){
            var datos = [];
            $.each(data, function( key, value ) {
                datos.push(key);
            });
            $("#mdlconcept_id").val(datos);
            $('#mdlconcept_id').trigger('change.select2');
        });
    });//MODAL

</script>
@endpush
