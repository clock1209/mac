@push('scripts') <script >
    var dTableBank = $("#overweight-table").DataTable({
        ajax: '/overweight',
        columns: [
            {data: 'container'},
            {data: 'currency'},
            {data: 'rangeup'},
            {data: 'cost'},
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                serchable: false,
                bSearchable: false
            }
        ],
        "columnDefs": [{
            "targets": 2,
            "data": "rangeup",
            "render": function(data, type, full, meta) {
                return full.rangeup + " - " + full.rangeto;
            }
        }]
    }); /*datatable*/

$('body').delegate('.status-overweight', 'click', function() {
    id_overweight = $(this).attr('id_overweight');

    swal({
        title: 'Are you sure?',
        text: "you want to remove the overweight?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Yes, remove!'
    }).then(function() {
        $.ajax({
            url: '/overweight/' + id_overweight,
            type: 'GET',
            dataType: 'json',
            data: {
                id: id_overweight
            }
        }).done(function(data) {
            sAlert(data.title, data.type, data.text);
            dTableBank.ajax.reload();
        });
    });
}); //BUTTON .active-bankAccount

$(document).ready(function() {
    var currency = {{ require('./js/currency.json') }};
    $('#currency').empty();
    $('#currency').select2();
    $('#currency').append('<option value=" "></option>');
    $.each(currency, function(i, item) {
        selected = (i != 0) ? '' : ' selected';
        $('#currency').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
    });

    @if($overweight)
        $('#currency').val('{{$overweight->currency}}');
    @endif
});

@if(Session::has('message'))
sAlert(
    "{{ Session::get('message.title') }}",
    "{{ Session::get('message.type') }}",
    "{{ Session::get('message.text') }}"
);
@endif

function sAlert(title, type, text) {
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
