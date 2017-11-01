@push('scripts')
<script>

    $(document).ready(function () {

        $('#country').select2();
        $('#city').select2();
        $('#country').select2('open');

        $('#city').on('select2:close', function(event) {
            $('#port_name').focus();
        });


    });

    $('select[name="country"]').change(function () {
        var _country = $(this).val();
        $('#city').empty().select2();
        $.ajax({
            url: '{{route('ports.name')}}',
            type: 'GET',
            data: { country: _country }
        }).done(function (resp) {
            $.each(resp, function (i, item) {
                selected = (i != 0) ? '' : ' selected';
                $('#city').append('<option value="' + item.id + '" ' + selected + '>' + item.port_name.toUpperCase() + '</option>');
            });
            $('#city').select2('open');
        })

        dTable = $("#city_town-table").DataTable({
            ajax: '{{ route('town.filter',['country'=>'']) }}'+_country,
            type: 'GET',
            destroy: true,
            columns: [
                {data: 'name'},
                {data: 'port_name'},
                {data: 'port_name'},
                {data: 'name'},
                {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
            ]
        });

    });//select COUNTRY

    $('#country_port_id').hover(function () {
        var country = $('select[name="country_port_id"]').val();
        if (country == null) {
            $.ajax({
                url: '{{route('ports.name')}}',
                type: 'GET',
                data: { country: country }
            }).done(function (resp) {
                $.each(resp, function (i, item) {
                    selected = (i != 0) ? '' : ' selected';
                    $('#port_name_id').append('<option value="' + item.id + '" ' + selected + '>' + item.port_name.toUpperCase() + '</option>');
                });
            })
        }else{
            $('select[name="country_port_id"]').hover(function () {
                $(this).select2();
            });
        }

    });//select CITY

</script>
@endpush
