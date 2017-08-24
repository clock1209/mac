@push('scripts')
<script>
    var dTableCharge = $("#additional-charges-table").DataTable({
        ajax: '/additional-charges?dt=charge&supplier_id=' + $('[name="supplier_id"]').val(),
        columns: [
            {data: 'concept'},
            {data: 'collect_prepaid'},
            {data: 'import_export'},
            {data: 'amount'},
            {data: 'currency'},
            {data: 'last_updated'},
            {data: 'charge_type'},
            {data: 'charge'},
            {data: 'notes'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false}
        ]
    });/*datatable*/

    $('#btn-additional-charge').click( function() {
        $('div.has-error').removeClass('has-error');
        $('span.help-block').remove();
        $.ajax({
            url: '/additional-charges',
            type: 'POST',
            dataType: 'json',
            data: {
                concept:  $('[name="concept"]').val(),
                collect_prepaid: $('[name="collect_prepaid"]').val(),
                import_export: $('[name="import_export"]').val(),
                amount: $('[name="amount"]').val(),
                currency: $('div#ac-form [name="currency"]').val(),
                last_updated: $('[name="last_updated"]').val(),
                charge_type: $('[name="charge_type"]').val(),
                charge: $('[name="charge"]').val(),
                notes: $('[name="notes"]').val(),
                supplier_id: $('[name="supplier_id"]').val()
            }
        }).done(function (data) {
            console.log(data);
            resetAdditionalChargeInputs();
            sAlert(data.title, data.type, data.text);
            dTableCharge.ajax.reload();
        }).fail(function (data) {
            var errors = data.responseJSON;
            $.each(errors, function(index, value){
                $('div#ac-form [name="'+ index +'"]').after('<span class="help-block">'+value+'</span>')
                    .parent().addClass('has-error');
            });
        });
    });//BUTTON btn-additional-charge

    $('body').delegate('.status-additionalCharge','click',function(){
        id_additionalCharge = $(this).attr('id_additionalCharge');
        additionalCharge_name = $(this).attr('additionalCharge_name');
        swal({
            title: 'Are you sure?',
            text: "you want to remove the charge?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, remove!'
        }).then(function () {
            $.ajax({
                url: '/additional-charges/' + id_additionalCharge + '/status',
                type: 'GET',
                dataType: 'json',
                data: {id: id_additionalCharge}
            }).done(function(data){
                console.log(data);
                sAlert(data.title, data.type, data.text);
                dTableCharge.ajax.reload();
            });
        });
    });//BUTTON .active-additionalCharge

    function resetAdditionalChargeInputs() {
        $('[name="collect_prepaid"]').val('');
        $('[name="import_export"]').val('');
        $('[name="amount"]').val('');
        $('[name="last_updated"]').val('');
        $('[name="notes"]').val('');
    }

    $(document).ready(function () {
        var currency = {{ require('./js/currency.json') }};
        $('#currency-ac').empty();
        $('#currency-ac').select2();
        $.each( currency, function (i, item) {
            selected = (i != 0) ? '' : ' selected';
            $('#currency-ac').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
        });
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