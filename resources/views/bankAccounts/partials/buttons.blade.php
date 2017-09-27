<a data-toggle="modal" id_bankAccount="{{ $bankAccount->id }}" data-target="#bankAccount_modal"
   class="btn btn-success btn-sm get-bankAccount">
    <i class="fa fa-edit"></i> Edit
</a>
<a id_bankAccount="{{ $bankAccount->id }}" class="btn btn-danger btn-sm status-bankAccount" bankAccount_name="{{ $bankAccount->tradename }}">
    <span class="fa fa-trash"></span> Delete
</a>
