@push('scripts') <script>
    var rail_truck_table = $("#rail-truck-table").DataTable({
        ajax: '/inlandscharges',
        columns: [
            {data: 'type'},
            {data: 'dischargeport'},
            {data: 'currency'},
            {data: 'container'},
            {data: 'rangeup'},
            {data: 'cost'},
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                serchable: false,
                bSearchable: false
            }
        ],"columnDefs": [{
            "targets": 1,
            "data": "dischargeport_id",
            "render": function(data, type, full, meta) {
                return full.nameone + " - " + full.nametwo;
            }
        },{
            "targets": 4,
            "data": "rangeup",
            "render": function(data, type, full, meta) {
                return full.rangeup + " - " + full.rangeto;
            }
        }],
        initComplete: function() {
            var table2 = $('#all-truck-table').DataTable();
            var table3 = $('#rail-ramp-table').DataTable();
            this.api().rows().every(function() {
                var rows = this.data();
                var row = this;
                var rowNode = row.node();
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
        $('#currency_id').append('<option value=" " ></option>');
        $.each(currency, function(i, item) {
            selected = (i != 0) ? '' : ' selected';
            if (i != 'USD')
                $('#currency_id').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
        });

        @if($inlands)
            $('#currency_id').val('{{$inlands->currency}}');
        @endif

        $('#currency-st').each(function () {
            var s = $(this);
            s.data().select2.on("focus", function (e) {
                s.select2("open");
            });
        });

        $('#discharge_country_ports_id').select2();
        $('#delivery_country_ports_id').select2();
        $('#dischargeport_id').select2();
        $('#delivery_id').select2();
        $('.select2-container--default').css('min-width', '220px');

        $('#currency_id').each(function () {
            var s = $(this);
            s.data().select2.on("focus", function (e) {
                s.select2("open");
            });
            s.data().select2.on("close", function (e) {
                $("#discharge_country_ports_id").select2('open');
            });
        });


        $('#dischargeport_id').each(function () {
            $(this).on('select2:close', function(event) {
                $("#delivery_country_ports_id").select2('open');
            });
        });

        $('#delivery_id').each(function () {
            $(this).on('select2:close', function(event) {
                $("#rangeup").focus();
            });
        });



    });

    $('select[name="discharge_country_ports_id"]').change(function () {
        var country = $(this).val();
        $('#dischargeport_id').empty().select2();
        $.ajax({
            url: '{{route('ports.name')}}',
            type: 'GET',
            data: { country: country }
        }).done(function (resp) {
            $.each(resp, function (i, item) {
                selected = (i != 0) ? '' : ' selected';
                $('#dischargeport_id').append('<option value="' + item.id + '" ' + selected + '>' + item.port_name.toUpperCase() + '</option>');
            });
            $("#dischargeport_id").select2('open');
        })
    });//select COUNTRY

    $('select[name="delivery_country_ports_id"]').change(function () {
        var country = $(this).val();
        $('#delivery_id').empty().select2();
        $.ajax({
            url: '{{route('ports.name')}}',
            type: 'GET',
            data: { country: country }
        }).done(function (resp) {
            $.each(resp, function (i, item) {
                selected = (i != 0) ? '' : ' selected';
                $('#delivery_id').append('<option value="' + item.id + '" ' + selected + '>' + item.port_name.toUpperCase() + '</option>');
            });
            $("#delivery_id").select2('open');
        })
    });//select COUNTRY

</script>
@endpush
