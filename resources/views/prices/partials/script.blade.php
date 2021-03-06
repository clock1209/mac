@push('scripts')
<script>
    var dTable = $("#prices-table").DataTable({
        ajax: '/prices',
        columns: [
            {data: 'name'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
        ]
    });/*datatable*/

    $('body').delegate('.delete-port','click',function(){
        port_id = $(this).attr('port_id');
        swal({
            title: 'Are you sure?',
            text: "You'll deactivate this price.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, Deactivate!'
        }).then(function () {
            $.ajax({
                url: '/prices/' + port_id,
                type: 'DELETE',
                dataType: 'json',
                data: {id: port_id,
                    type:'1'}
            }).done(function(data){
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });//BUTTON .delete-shipper

    $('body').delegate('.delete-port_level2','click',function(){
        port_id = $(this).attr('port_id');
        swal({
            title: 'Are you sure?',
            text: "You'll delete this price.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, Delete!'
        }).then(function () {
            $.ajax({
                url: '/prices/' + port_id,
                type: 'DELETE',
                dataType: 'json',
                data: {id: port_id,
                    type:'2'}
            }).done(function(data){
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });//BUTTON .delete-shipper

    $('body').delegate('.activate-port','click',function(){
        port_id = $(this).attr('port_id');
        swal({
            title: 'Are you sure?',
            text: "You'll activate this price.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, activate!'
        }).then(function () {
            $.ajax({
                url: '/prices/' + port_id,
                type: 'DELETE',
                dataType: 'json',
                data: {id: port_id,
                    type:'1'}
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
    }
</script>
@endpush
