@permission('create_user')
    <a href="users/{{$users->id }}/edit" class="btn btn-primary btn-sm"   style="background-color: green">
        <span class="glyphicon glyphicon-pencil"></span>Edit
    </a>

    <a id_user="{{ $users->id }}" class="btn btn-danger delete-user btn-sm">
        <span class="glyphicon glyphicon-trash"></span> Delete
    </a>
@endpermission
