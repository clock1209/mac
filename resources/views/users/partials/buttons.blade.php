@permission('create_user')
    <a href="users/{{$users->id }}/edit" class="btn btn-primary" data-toggle="tooltip" title="Editar" style="background-color: green">
        <span class="glyphicon glyphicon-pencil"></span>Edit
    </a>

    <a id_user="{{ $users->id }}" class="btn btn-danger delete-user">
        <span class="glyphicon glyphicon-trash"></span> Delete
    </a>
@endpermission
