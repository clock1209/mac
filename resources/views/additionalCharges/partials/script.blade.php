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

    //shows additionalCharge modal to edit data
    $('body').delegate('.get-additionalCharge','click',function(){
        id_additionalCharge = $(this).attr('id_additionalCharge');
        $.ajax({
            url : '/additional-charges/' + id_additionalCharge + '/edit',
            type : 'GET',
            dataType: 'json',
            data : {id: id_additionalCharge}
        }).done(function(data){
            console.log(data);
            $('#mdl_concept option[value="' + data.concept + '"]').attr('selected', 'selected');
            $('#mdl_collect_prepaid option[value="' + data.collect_prepaid + '"]').attr('selected', 'selected');
            $('#mdl_import_export option[value="' + data.import_export + '"]').attr('selected', 'selected');
            $('#mdl_amount').val(data.amount);
            $('#mdl_currency-ac').val(data.currency);
            $('#mdl_last_updated').val(data.last_updated);
            $('#mdl_charge_type option[value="' + data.charge_type + '"]').attr('selected', 'selected');
            $('#mdl_charge option[value="' + data.charge + '"]').attr('selected', 'selected');
            $('#mdl_notes').val(data.notes);
            $('#mdlIdAdditionalCharge').val(id_additionalCharge);
            $('#mdl_concept').val(data.concept);
        });
    });//MODAL .get-additionalCharge

    //Update additionalCharge data changed on modal
    $('body').delegate('#additionalChargeUpdate','click',function(){
        id_additionalCharge = $('#mdlIdAdditionalCharge').val();
        $.ajax({
            url : '/additional-charges/' + id_additionalCharge,
            type : 'PUT',
            dataType: 'json',
            data : {
                concept:  $('#mdl_concept').val(),
                collect_prepaid: $('#mdl_collect_prepaid').val(),
                import_export: $('#mdl_import_export').val(),
                amount: $('#mdl_amount').val(),
                currency: $('#mdl_currency-ac').val(),
                last_updated: $('#mdl_last_updated').val(),
                charge_type: $('#mdl_charge_type').val(),
                charge: $('#mdl_charge').val(),
                notes: $('#mdl_notes').val(),
            }
        }).done(function(data){
            console.log(data);
            $('#additionalCharge_modal').modal('hide');
            sAlert(data.title, data.type, data.text);
            dTableCharge.ajax.reload();
        }).fail(function (data) {
            var errors = data.responseJSON;
            $.each(errors, function(index, value){
                $('[name="'+ index +'"]').after('<span class="help-block">'+value+'</span>')
                    .parent().addClass('has-error');
            });
        });
    });//MODAL .get-additionalCharge

    function resetAdditionalChargeInputs() {
        $('[name="amount"]').val('');
        $('[name="last_updated"]').val('{!! \Carbon\Carbon::now() !!}');
        $('[name="notes"]').val('');
    }

    $(document).ready(function () {
        var currency = {{ require('./js/currency.json') }};
        $('#currency-ac').empty();
        $('#mdl_currency-ac').empty();
        $('#currency-ac').select2();
        $('#mdl_currency-ac').select2();

        $('#currency-ac').append('<option value=" " selected ></option>');
        $('#mdl_currency-ac').append('<option value=" " selected ></option>');

        $.each( currency, function (i, item) {
            selected = (i != 0) ? '' : ' selected';
            $('#currency-ac').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
            $('#mdl_currency-ac').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
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
