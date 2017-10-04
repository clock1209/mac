@push('scripts')
<script>
    var cities = {{ include('./js/countryCities.json') }};

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
        $.each( cities[country], function (i, item) {
            selected = (i != 0) ? '' : ' selected';
            $('#selectCity').append('<option value="' + item + '" ' + selected + '>' + item + '</option>');
        });
    });//select COUNTRY

    $('select[name="country"]').hover(function () {
        $(this).select2();
    });

    $('#selectCity').hover(function () {
        var selectedCity = $('#selectCity option:selected').html();
        $(this).select2();
        var country = $('select[name="country"]').val();
        if (country != '') {
            $('#selectCity').empty().select2();
            $.each( cities[country], function (i, item) {
                selected = (item != selectedCity) ? '' : ' selected';
                $('#selectCity').append('<option value="' + item + '" ' + selected + '>' + item + '</option>');
            });
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
</script>
@endpush
