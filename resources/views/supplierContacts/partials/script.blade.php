@push('scripts')
<script>
    addInputmask();

    var dTableContact = $("#contacts-table").DataTable({
        ajax: '/contacts?&supplier_id=' + $('[name="supplier_id"]').val(),
        columns: [
            {data: 'select_an_area'},
            {data: 'name'},
            {data: 'email'},
            {data: 'phone'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false}
        ]
    });/*datatable*/

    $('#btn-contact').click( function() {
        $('div.has-error').removeClass('has-error');
        $('span.help-block').remove();
        Inputmask("9999999999", {"nullable": true, "greedy": false}).mask('#supplierPhone');
        $.ajax({
            url: '/contacts',
            type: 'POST',
            dataType: 'json',
            data: {
                select_an_area:  $('[name="select_an_area"]').val(),
                name: $('div#sc-form [name="contact_name"]').val(),
                email: $('[name="email"]').val(),
                phone: $('[name="phone"]').val(),
                area_code: $('[name="area_code"]').val(),
                supplier_id: $('[name="supplier_id"]').val()
            }
        }).done(function (data) {
            resetContatInputs();
            sAlert(data.title, data.type, data.text);
            dTableContact.ajax.reload();
            addInputmask();
        }).fail(function (data) {
            var errors = data.responseJSON;
            $.each(errors, function(index, value){
                var contactInput = (index == 'name') ? 'contact_' : '';
                $('div#sc-form [name="' + contactInput + index +'"]').after('<span class="help-block">'+value+'</span>')
                    .parent().addClass('has-error');
            });
            addInputmask();
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
                sAlert(data.title, data.type, data.text);
                dTableContact.ajax.reload();
            });
        });
    });//BUTTON .active-contact

    //shows contact modal to edit data
    $('body').delegate('.get-contact','click',function(){
        id_contact = $(this).attr('id_contact');
        $.ajax({
            url : '/contacts/' + id_contact + '/edit-contact',
            type : 'GET',
            dataType: 'json',
            data : {id: id_contact}
        }).done(function(data){
            $('#mdl_select_an_area').val(data[0].select_an_area);
            $('#mdl_contact_name').val(data[0].name);
            $('#mdl_email').val(data[0].email);
            $('#mdl_supplierPhone').val(data[2]);
            $('#mdl_area_code').val(data[1]);
            $('#mdlIdContact').val(id_contact);
        });
    });//MODAL .get-contact

    //Update contact data changed on modal
    $('body').delegate('#contactUpdate','click',function(){
        id_contact = $('#mdlIdContact').val();
        Inputmask("9999999999", {"nullable": true, "greedy": false}).mask('#mdl_supplierPhone');
        $.ajax({
            url : '/contacts/' + id_contact + '/update-contact',
            type : 'PUT',
            dataType: 'json',
            data : {
                select_an_area:  $('#mdl_select_an_area').val(),
                name: $('#mdl_contact_name').val(),
                email: $('#mdl_email').val(),
                phone: $('#mdl_supplierPhone').val(),
                area_code: $('#mdl_area_code').val()
            }
        }).done(function(data){
            $('#contact_modal').modal('hide');
            sAlert(data.title, data.type, data.text);
            dTableContact.ajax.reload();
            addInputmask();
        }).fail(function (data) {
            var errors = data.responseJSON;
            $.each(errors, function(index, value){
                $('[name="'+ index +'"]').after('<span class="help-block">'+value+'</span>')
                    .parent().addClass('has-error');
            });
            addInputmask();
        });
    });//MODAL .get-contact

    function resetContatInputs() {
        $('[name="select_an_area"]').val('');
        $('div#sc-form [name="contact_name"]').val('');
        $('[name="email"]').val('');
        $('[name="phone"]').val('');
        $('[name="area_code"]').val('');
    }

    function addInputmask()
    {
        Inputmask("(999) 999-9999", {"removeMaskOnSubmit": true, "nullable": true}).mask('#supplierPhone');
        Inputmask("(999) 999-9999", {"removeMaskOnSubmit": true, "nullable": true}).mask('#mdl_supplierPhone');
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
