@push('scripts')
<script>
    var dTableBank = $("#bank-accounts-table").DataTable({
        ajax: '/suppliers?dt=bank&supplier_id=' + $('[name="supplier_id"]').val(),
        columns: [
            {data: 'pay_of'},
            {data: 'account'},
            {data: 'bank'},
            {data: 'clabe'},
            {data: 'aba'},
            {data: 'swift'},
            {data: 'reference'},
            {data: 'currency'},
            {data: 'beneficiary'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false}
        ]
    });/*datatable*/

    $('#btn-bank-account').click( function() {
        $('div.has-error').removeClass('has-error');
        $('span.help-block').remove();
        $.ajax({
            url: '/bank-accounts',
            type: 'POST',
            dataType: 'json',
            data: {
                pay_of:  $('[name="pay_of"]').val(),
                account: $('[name="account"]').val(),
                bank: $('[name="bank"]').val(),
                clabe: $('[name="clabe"]').val(),
                aba: $('[name="aba"]').val(),
                swift: $('[name="swift"]').val(),
                reference: $('[name="reference"]').val(),
                currency: $('[name="currency"]').val(),
                beneficiary: $('[name="beneficiary"]').val(),
                supplier_id: $('[name="supplier_id"]').val()
            }
        }).done(function (data) {
            console.log(data);
            resetBankAccountInputs();
            dTableBank.ajax.reload();
        }).fail(function (data) {
            var errors = data.responseJSON;
            $.each(errors, function(index, value){
                $('[name="'+ index +'"]').after('<span class="help-block">'+value+'</span>')
                    .parent().addClass('has-error');
            });
        });
    });//BUTTON .active-bankAccount

    $('body').delegate('.status-bankAccount','click',function(){
        id_bankAccount = $(this).attr('id_bankAccount');
        bankAccount_name = $(this).attr('bankAccount_name');
        swal({
            title: 'Are you sure?',
            text: "you want to remove the bankAccount?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, remove!'
        }).then(function () {
            $.ajax({
                url: '/bank-accounts/' + id_bankAccount + '/status',
                type: 'GET',
                dataType: 'json',
                data: {id: id_bankAccount}
            }).done(function(data){
                console.log(data);
                sAlert(data.title, data.type, data.text);
                dTableBank.ajax.reload();
            });
        });
    });//BUTTON .active-bankAccount

    function resetBankAccountInputs() {
        $('[name="account"]').val('');
        $('[name="bank"]').val('');
        $('[name="clabe"]').val('');
        $('[name="aba"]').val('');
        $('[name="swift"]').val('');
        $('[name="reference"]').val('');
        $('[name="currency"]').val('');
        $('[name="beneficiary"]').val('');
        $('[name="supplier_id"]').val('');
    }

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