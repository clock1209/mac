@push('scripts')
<script>

    $(document).ready(function(){
        var Dtable = $('#roles').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "/roles",
            "columns":[
                {data: 'id', visible: false},
                {data: 'display_name'},
                {data: 'action', name: 'action', orderable: false, serchable: false,  bSearchable: false},
            ],
        });

        $('body').delegate('.get-rol-datos','click',function(){
            id_rol = $(this).attr('id_rol');
            $.ajax({
                url : '{{ URL::to("/roles") }}' + '/' + id_rol ,
                type : 'GET',
                dataType: 'json',
                data : {id: id_rol}
            }).done(function(data){
                console.log(data);
                $("#name").html(data.name );
                $("#display_name").html(data.display_name);
                $("#description").html(data.description);
            });

        });

        rol_id = null;
        $('#select-permisos').multiSelect({
            selectableHeader: "<h4 class='text-center'><b> <span class='text-danger'>Unassigned </span> permissions</h4></b>",
            selectionHeader: "<h4  class='text-center'><b>Assigned permissions</h4></b>",
            afterSelect:function(value){//enviamos al servidor el id del permiso seleccionado
                $.ajax({
                    url : '{{ URL::to("/permisos/asignar") }}',
                    type : 'GET',
                    dataType: 'json',
                    data : {permission_id: value[0], role_id: rol_id}
                }).done(function(data){
                    console.log(data);
                });
            },
            afterDeselect:function(value){//enviamos al servidor el id del permiso seleccionado
                $.ajax({
                    url : '{{ URL::to("/permisos/desasignar") }}',
                    type : 'GET',
                    dataType: 'json',
                    data : {permission_id: value[0], role_id: rol_id}
                }).done(function(data){
                    console.log(data);
                });
            }
        });

        $('body').delegate('.get-permisos','click',function(){
            rol_id = $(this).attr('rol_id');
            $('#select-permisos option').prop('selected', false);
            $.ajax({
                url : '{{ URL::to("/permisos") }}',
                type : 'GET',
                dataType: 'json',
                data : {id: rol_id}
            }).done(function(data){
                $.each(data.permisosAsignados ,function(index, value){
                    console.log(value);
                    $('#select-permisos option[value="'+value.id+'"]').prop('selected', true);
                });
                $('#select-permisos').multiSelect('refresh');
            });
        } );



        $('body').delegate('#msj-authorized','click', function(){
            $(this).hide();
        });

        $('body').delegate('#btnActionDelete','click',function(){
            rol_id = $(this).attr('rol_id');
            swal({
                title: 'Are you sure?',
                text: "it won't be possible to reverse this action.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, delete role!'
            }).then(function () {
                $.ajax({
                    url: '/roles/' + rol_id ,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {id: rol_id}
                }).done(function(data){
                    console.log(data);
                    sAlert(data.title, data.type, data.text);
                    Dtable.ajax.reload();
                });
            });
        });//BUTTON .delete-roles

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