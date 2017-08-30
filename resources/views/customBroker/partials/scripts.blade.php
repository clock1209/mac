@push('scripts')
<script>
    var dTableContact = $("#broker-table").DataTable({
        ajax: '/Broker?dt=index',
        columns: [
            {data: 'name'},
            {data: 'patent'},
            {data: 'email'},
            {data: 'phone'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false}
        ]
    });/*datatable*/

    $('#btn-contact').click( function() {
        $('div.has-error').removeClass('has-error');
        $('span.help-block').remove();
        $.ajax({
            url: '/contacts',
            type: 'POST',
            dataType: 'json',
            data: {
                select_an_area:  $('[name="select_an_area"]').val(),
                name: $('div#sc-form [name="contact_name"]').val(),
                email: $('[name="email"]').val(),
                phone: $('[name="phone"]').val(),
                supplier_id: $('[name="supplier_id"]').val()
            }
        }).done(function (data) {
            console.log(data);
            resetContatInputs();
            sAlert(data.title, data.type, data.text);
            dTableContact.ajax.reload();
        }).fail(function (data) {
            var errors = data.responseJSON;
            $.each(errors, function(index, value){
                var contactInput = (index == 'name') ? 'contact_' : '';
                $('div#sc-form [name="' + contactInput + index +'"]').after('<span class="help-block">'+value+'</span>')
                    .parent().addClass('has-error');
            });
        });
    });//BUTTON btn-contact

    $('body').delegate('.status-contact','click',function(){
        id_contact = $(this).attr('id_contact');
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
                url: '/contacts/' + id_contact + '/status',
                type: 'GET',
                dataType: 'json',
                data: {id: id_contact}
            }).done(function(data){
                console.log(data);
                sAlert(data.title, data.type, data.text);
                dTableContact.ajax.reload();
            });
        });
    });//BUTTON .active-contact

    function resetContatInputs() {
        $('[name="select_an_area"]').val('');
        $('div#sc-form [name="contact_name"]').val('');
        $('[name="email"]').val('');
        $('[name="phone"]').val('');
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