@push('scripts')
<script>
    var dTable = $("#consolidators-table").DataTable({
        ajax: '/consolidators',
        columns: [
            {data: 'abbreviation'},
            {data: 'name'},
            {data: 'status'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
        ]
    });/*datatable*/

    $('body').delegate('.delete-consolidator','click',function(){
        consolidator_id = $(this).attr('consolidator_id');
        swal({
            title: 'Are you sure?',
            text: "it won't be possible to reverse this action.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, delete this consolidator!'
        }).then(function () {
            $.ajax({
                url: '/consolidators/' + consolidator_id,
                type: 'DELETE',
                dataType: 'json',
                data: {id: consolidator_id}
            }).done(function(data){
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });//BUTTON .delete-shipper

    $('body').delegate('.activate-consolidator','click',function(){
        consolidator_id = $(this).attr('consolidator_id');
        swal({
            title: 'Are you sure?',
            text: "it won't be possible to reverse this action.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, activate this consolidator!'
        }).then(function () {
            $.ajax({
                url: '/consolidators/' + consolidator_id,
                type: 'DELETE',
                dataType: 'json',
                data: {id: consolidator_id}
            }).done(function(data){
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });//BUTTON .delete-shipper

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
        $('#name').val('');
        $('#abbreviation').val('');

    }
</script>
@endpush
