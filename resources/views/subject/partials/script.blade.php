@push('scripts') <script>
    var TableSubject = $("#subject-table").DataTable({
        ajax: '/subject',
        columns: [
            { data: 'name' },
            { data: 'cost' },
            { data: 'currency' },
            { data: 'actions', name: 'actions', orderable: false, serchable: false, bSearchable: false }
        ]
    }); /*datatable*/

$('body').delegate('.status-subject', 'click', function() {
    id_subject = $(this).attr('id_subject');

    swal({
        title: 'Are you sure?',
        text: "you want to remove the subject?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Yes, remove!'
    }).then(function() {
        $.ajax({
            url: '/subject/' + id_subject,
            type: 'GET',
            dataType: 'json',
            data: {
                id: id_subject
            }
        }).done(function(data) {
            sAlert(data.title, data.type, data.text);
            TableSubject.ajax.reload();
        });
    });
}); //BUTTON .active-bankAccount

    $(document).ready(function () {
        var currency = {{ require('./js/currency.json') }};
        $('#currency-st').empty();
        $('#currency-st').select2();
        $.each( currency, function (i, item) {
            selected = (i != 0) ? '' : ' selected';
            $('#currency-st').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
        });
    });

</script>
@endpush
