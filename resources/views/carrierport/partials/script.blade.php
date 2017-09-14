@push('scripts')
<script>
var searchParams = new URLSearchParams(window.location.search);
var id=searchParams.get("id")

 $("#ruta").attr("href", "carrierport/create?id="+id);

console.log(id)
    var dTable = $("#carrierport-table").DataTable({
        ajax: '/carrierport?id='+id,
        columns: [
            {data: 'name'},
            {data: 'departures'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
        ]
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



    $('body').delegate('.delete-carrier','click',function(){
        carrier_id = $(this).attr('carrier_id');
        swal({
            title: 'Are you sure?',
            text: "it won't be possible to reverse this action.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, delete this carrier!'
        }).then(function () {
            $.ajax({
                url: '/carrierport/' + carrier_id,
                type: 'DELETE',
                dataType: 'json',
                data: {id: carrier_id}
            }).done(function(data){
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });//BUTTON .delete-shipper

    $(document).ready(function () {
        var currency = {{ require('./js/currency.json') }};
        $('#currency').empty();
        $('#currency').select2();
        $.each( currency, function (i, item) {
            selected = (i != 0) ? '' : ' selected';
            $('#currency').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
        });
    });

</script>
@endpush
