@push('scripts')
<script>
    Inputmask("(999) 999-9999", {"removeMaskOnSubmit": true, "nullable": true}).mask('#phone_customer');

    var dTable = $("#customers-table").DataTable({
        ajax: '/customers?dt=index',
        columns: [
            {data: 'name'},
            {data: 'business_name'},
            {data: 'rfc'},
            {data: 'phone'},
            {data: 'contact_name'},
            {data: 'contact_job'},
            {data: 'email'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
        ],"columnDefs": [{
                "targets": 3,
                "data": "phone",
                "render": function(data, type, full, meta) {
                    return full.countrycode + "  " + full.phone;
                }
            }
        ],
    });/*datatable*/

    var iTable = $("#invoiced-table").DataTable({
        ajax: '/invoiced',
        columns: [
            {data: 'name'},
            {data: 'business_name'},
            {data: 'rfc'},
            {data: 'phone'},
            {data: 'contact_name'},
            {data: 'contact_job'},
            {data: 'email'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
        ]
    });/*datatable*/

    $('body').delegate('.status-supplier','click',function(){
        id_customer = $(this).attr('id_customer');
        swal({
            title: 'Are you sure?',
            text: "you want to remove the supplier?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, remove!'
        }).then(function () {
            $.ajax({
                url: '/customers/' + id_customer + '/status',
                type: 'GET',
                dataType: 'json',
                data: {id: id_customer}
            }).done(function(data){
                console.log(data);
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });//BUTTON .active-supplier

    $('select[name="country"]').change(function () {
        var country = $(this).val();
        $('#selectCity').empty().select2();
        $.ajax({
            url: '/cities-by-country',
            type: 'GET',
            data: { country: country }
        }).done(function (resp) {
            $.each( JSON.parse(resp), function (i, item) {
                selected = (i != 0) ? '' : ' selected';
                $('#selectCity').append('<option value="' + item.name + '" ' + selected + '>' + item.name + '</option>');
            });
        })
    });//select COUNTRY

    $('select[name="country_inv"]').change(function () {
        var country = $(this).val();
        $('#selectCity_inv').empty().select2();
        $.ajax({
            url: '/cities-by-country',
            type: 'GET',
            data: { country: country }
        }).done(function (resp) {
            $.each( JSON.parse(resp), function (i, item) {
                selected = (i != 0) ? '' : ' selected';
                $('#selectCity_inv').append('<option value="' + item.name + '" ' + selected + '>' + item.name + '</option>');
            });
        })
    });//select COUNTRY

    $('select[name="country"]').hover(function () {
        $(this).select2();
    });

    $('select[name="country_inv"]').hover(function () {
        $(this).select2();
    });

    $('.select2').hover(function () {
        $(this).select2();
    });

    $('#selectCity').hover(function () {
        var selectedCity = $('#selectCity option:selected').html();
        $(this).select2();
        var country = $('select[name="country"]').val();
        if (country != '') {
            $('#selectCity').empty().select2();
            $.ajax({
                url: '/cities-by-country',
                type: 'GET',
                data: { country: country }
            }).done(function (resp) {
                $.each( JSON.parse(resp), function (i, item) {
                    selected = (item.name != selectedCity) ? '' : ' selected';
                    $('#selectCity').append('<option value="' + item.name + '" ' + selected + '>' + item.name + '</option>');
                });
            })
        }

    });//select CITY

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

    function saveInvoiced()
    {
        clearErrors();
        var frm = new FormData($("form").serialize());
        $.each($("form").serializeArray(), function(key, input) {
            frm.append(input.name, input.value);
        });
        $.ajax({
            url: '/invoiced',
            type: 'POST',
            dataType: 'json',
            data: frm,
            processData: false,
            contentType: false
        }).done(function(data){
            console.log('pasa');
            console.log(data);
            iTable.ajax.reload();
//            if($(button).attr('hold') == 'false') {
//                $('#mdlCreatePerson').modal('hide');
//                clearForm();
//            }
//            sAlert(data.title, data.text, data.type);
//            getPerson();
        }).fail(function(data) {
            console.log(data);
            showErrorsInv(data.responseJSON);
        });

        function showErrorsInv(errors)
        {
            var list = '';
            $.each(errors, function(index, value){
                console.log(index);
                var input = $('[name="' + index + '"]');
                input.closest('.form-group').addClass('has-error').find('.help-block').text(value[0]);
                list += '<li>'+ value[0] +'</li>';
            });
            $('.ajax_errors').fadeIn().find('.list-content').html(list).fadeIn();
        }

        function clearErrors()
        {
            $('.has-error').removeClass('has-error').find('.help-block').text('');
            $('.ajax_errors').fadeOut();
        }
    }
</script>
@endpush
