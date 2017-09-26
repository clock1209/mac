@push('scripts') <script>
    var rail_truck_table = $("#rail-truck-table").DataTable({
        ajax: '/inlandscharges',
        columns: [{
                data: 'type'
            },
            {
                data: 'dischargeport'
            },
            {
                data: 'currency'
            },
            {
                data: 'container'
            },
            {
                data: 'rangeup'
            },
            {
                data: 'cost'
            },
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                serchable: false,
                bSearchable: false
            }
        ],
        "columnDefs": [{
                "targets": 1,
                "data": "dischargeport_id",
                "render": function(data, type, full, meta) {
                    return full.nameone + " - " + full.nametwo;
                }
            },
            {
                "targets": 3,
                "data": "rangeup",
                "render": function(data, type, full, meta) {
                    return full.rangeup + " - " + full.rangeto;
                }
            }
        ],
        initComplete: function() {
            var table2 = $('#all-truck-table').DataTable();
            var table3 = $('#rail-ramp-table').DataTable();
            this.api().rows().every(function() {
                var rows = this.data();
                var row = this;
                var rowNode = row.node();
                console.log(rows.type);
                if (rows.type == 'Rail &amp; truck') {

                } else if (rows.type == 'All truck') {

                    table2.row.add(rowNode).draw();
                } else {

                    table3.row.add(rowNode).draw();
                }
            });

        }
    }); /*datatable Rail*/

$('body').delegate('.status-inlands', 'click', function() {
    id_inlands = $(this).attr('id_inlands');

    swal({
        title: 'Are you sure?',
        text: "you want to remove the Inlands?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Yes, remove!'
    }).then(function() {
        $.ajax({
            url: '/inlandscharges/' + id_inlands,
            type: 'DELETE',
            dataType: 'json',
            data: {
                id: id_inlands
            }
        }).done(function(data) {
            sAlert(data.title, data.type, data.text);
            location.reload();
        });
    });
}); //BUTTON

$(document).ready(function() {
    var currency = {{ require('./js/currency.json') }};
    $('#currency_id').empty();
    $('#currency_id').select2();
    $.each(currency, function(i, item) {
        selected = (i != 0) ? '' : ' selected';
        $('#currency_id').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
    });

});

</script>
@endpush
