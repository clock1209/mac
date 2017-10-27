@push('scripts')
<script>
    var searchParams = new URLSearchParams(window.location.search);
    var id=searchParams.get("id")

    var dTable = $("#ports-table").DataTable({
        ajax: '/ports?shipper=' + {{$shipper->id}},
        columns: [
            {data: 'place_of_load'},
            {data: 'shipper_id'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
        ]
    });/*datatable*/

    $('body').delegate('.delete-port','click',function(){
        port_id = $(this).attr('port_id');
        swal({
            title: 'Are you sure?',
            text: "it won't be possible to reverse this action.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, delete this port!'
        }).then(function () {
            $.ajax({
                url: '/ports/' + port_id,
                type: 'DELETE',
                dataType: 'json',
                data: {id: port_id}
            }).done(function(data){
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });//BUTTON .delete-shipper

    $('body').delegate('.activate-port','click',function(){
        port_id = $(this).attr('port_id');
        swal({
            title: 'Are you sure?',
            text: "it won't be possible to reverse this action.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, activate this port!'
        }).then(function () {
            $.ajax({
                url: '/ports/' + port_id,
                type: 'DELETE',
                dataType: 'json',
                data: {id: port_id}
            }).done(function(data){
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });//BUTTON .delete-shipper

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

    $('select[name="country_port"]').change(function () {
        var country = $(this).val();
        $('#place_of_load').empty().select2();
        $.ajax({
            url: '{{route('ports.name')}}',
            type: 'GET',
            data: { country: country }
        }).done(function (resp) {
            $.each(resp, function (i, item) {
                selected = (i != 0) ? '' : ' selected';
                $('#place_of_load').append('<option value="' + item.port_name.toUpperCase() + '" ' + selected + '>' + item.port_name.toUpperCase() + '</option>');
            });
        })
    });//select country port

    $('select[name="country_port"]').hover(function () {
        $(this).select2();
    });

</script>
@endpush
