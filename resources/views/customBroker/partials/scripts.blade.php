@push('scripts')
<script>
    Inputmask("(999) 999-9999", {"removeMaskOnSubmit": true, "nullable": true}).mask('#phone_customer_broker');

    var dTableBroker = $("#broker-table").DataTable({
        ajax: '/broker?customer_id=' + $('[name="customer_id"]').val(),
        columns: [
            {data: 'name'},
            {data: 'patent'},
            {data: 'email'},
            {data: 'phone'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false}
        ]
    });

    $('#btn-customBroker').click( function() {
        $('div.has-error').removeClass('has-error');
        $('span.help-block').remove();
        Inputmask("9999999999", {"nullable": true, "greedy": false}).mask('#phone_customer_broker');
        $.ajax({
            url: '/broker',
            type: 'POST',
            dataType: 'json',
            data: {
                nameBroker: $('[name="nameBroker"]').val(),
                patent: $('[name="patent"]').val(),
                emailBroker: $('[name="emailBroker"]').val(),
                customer_id:$('[name="customer_id"]').val(),
                countrycodebroker:$('[name="countrycodebroker"]').val(),
                phoneBroker:$('[name="phoneBroker"]').val(),
            }
        }).done(function (data) {
            console.log(data);
            resetBrokerInputs();
            sAlert(data.title, data.type, data.text);
            dTableBroker.ajax.reload();
            Inputmask("(999) 999-9999", {"removeMaskOnSubmit": true, "nullable": true}).mask('#phone_customer_broker');
        }).fail(function (data) {
            var errors = data.responseJSON;
            $.each(errors, function(index, value){
                $('[name="'+ index +'"]').after('<span class="help-block">'+value+'</span>')
                    .parent().addClass('has-error');
            });
            Inputmask("(999) 999-9999", {"removeMaskOnSubmit": true, "nullable": true}).mask('#phone_customer_broker');
        });
    });//BUTTON btn-contact

    $('body').delegate('.status-broke','click',function(){
        id_broke = $(this).attr('id_broke');
        swal({
            title: 'Are you sure?',
            text: "you want to remove the contact?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, remove!'
        }).then(function () {
            $.ajax({
                url: '/broker/' + id_broke + '/status',
                type: 'GET',
                dataType: 'json',
                data: {id: id_broke}
            }).done(function(data){
                console.log(data);
                sAlert(data.title, data.type, data.text);
                dTableBroker.ajax.reload();
            });
        });
    });//BUTTON .active-contact

    function resetBrokerInputs() {
        $('[name="nameBroker"]').val('');
        $('[name="patent"]').val('');
        $('[name="emailBroker"]').val('');
        $('[name="phoneBroker"]').val('');
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