@push('scripts')
<script>
    var dTable = $("#customers-table").DataTable({
        ajax: '/customers?dt=index',
        columns: [
            {data: 'name'},
            {data: 'business_name'},
            {data: 'rfc'},
            {data: 'phone'},
            {data: 'contact_name'},
            {data: 'contact_job'},
            {data: 'email'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
        ]
    });/*datatable*/

    $('body').delegate('.status-supplier','click',function(){
        id_supplier = $(this).attr('id_supplier');
        supplier_name = $(this).attr('supplier_name');
        swal({
            title: 'Are you sure?',
            text: "you want to remove the supplier?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, remove!'
        }).then(function () {
            $.ajax({
                url: '/suppliers/' + id_supplier + '/status',
                type: 'GET',
                dataType: 'json',
                data: {id: id_supplier}
            }).done(function(data){
                console.log(data);
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });//BUTTON .active-supplier

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