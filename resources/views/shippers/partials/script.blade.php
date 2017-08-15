@push('scripts')
<script>
    var dTable = $("#shippers-table").DataTable({
        ajax: '/shippers',
        columns: [
            {data: 'tradename'},
            {data: 'name'},
            {data: 'email'},
            {data: 'phone'},
            {data: 'business_name'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
        ]
    });/*datatable*/

    $('body').delegate('.delete-shipper','click',function(){
        id_shipper = $(this).attr('id_shipper');
        swal({
            title: 'Are you sure?',
            text: "it won't be possible to reverse this action.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, delete shipper!'
        }).then(function () {
            $.ajax({
                url: '/shippers/' + id_shipper,
                type: 'DELETE',
                dataType: 'json',
                data: {id: id_shipper}
            }).done(function(data){
                console.log(data);
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
    }
</script>
@endpush