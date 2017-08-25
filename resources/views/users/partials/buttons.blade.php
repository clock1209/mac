@permission('create_user')
    <a href="users/{{$users->id }}/edit" class="btn btn-primary btn-sm"   style="background-color: green">
        <span class="fa fa-edit"></span> Edit
    </a>

    <a id_user="{{ $users->id }}" class="btn btn-danger delete-user btn-sm">
        <span class="fa fa-trash"></span> Delete
    </a>
@endpermission
