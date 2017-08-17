@push('scripts')
<script>
    var dTable = $("#users-table").DataTable({
        ajax: '/users',
        columns: [
            {data: 'username'},
            {data: 'email'},
            {data: 'display_name'},
                @permission('create_user')
            {data: 'action'},
            @endpermission
        ],
    });

    $('body').delegate('.delete-user','click',function(){
        id_user = $(this).attr('id_user');
        swal({
            title: 'Are you sure?',
            text: "it won't be possible to reverse this action.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, delete user!'
        }).then(function () {
            $.ajax({
                url: '/users/' + id_user + '/status',
                type: 'GET',
                dataType: 'json',
                data: {id: id_user}
            }).done(function(data){
                console.log(data);
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });//BUTTON .delete-users


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