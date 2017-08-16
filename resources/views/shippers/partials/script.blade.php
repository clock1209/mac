@push('scripts')
<script>
    var dTable = $("#shippers-table").DataTable({
        ajax: '/shippers',
        columns: [
            {data: 'tradename'},
            {data: 'name'},
            {data: 'email'},
            {data: 'phone'},
            {data: 'business_name'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
        ]
    });/*datatable*/

    $('body').delegate('.status-shipper','click',function(){
        id_shipper = $(this).attr('id_shipper');
        shipper_name = $(this).attr('shipper_name');
        swal({
            title: 'Are you sure?',
            text: "you want to remove the shipper?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, remove!'
        }).then(function () {
            $.ajax({
                url: '/shippers/' + id_shipper + '/status',
                type: 'GET',
                dataType: 'json',
                data: {id: id_shipper}
            }).done(function(data){
                console.log(data);
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });//BUTTON .active-shipper

    $('select[name="country"]').change(function () {
        var country = $(this).val();
        var cities = {{ require('./js/cities.json') }};
        $('#selectCity').empty();
        $.each( cities[country], function (i, item) {
            selected = (i != 0) ? '' : ' selected';
            $('#selectCity').append('<option value="' + item + '" ' + selected + '>' + item + '</option>');
        });
    });//select COUNTRY

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