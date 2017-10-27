@push('scripts')
<script>
    var searchParams = new URLSearchParams(window.location.search);
    var id=searchParams.get("id")

    $("#ruta").attr("href", "carrierport/create?id="+id);
    $("#ruta_remark").attr("href", "remarks?id="+id);

    var dTable = $("#carrierport-table").DataTable({
        ajax: '/carrierport?id='+id,
        columns: [
            {data: 'port_name'},
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
            confirmButtonText: 'Yes, delete this carrier port!'
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


        $('input[type=checkbox]').click(function(){
            //MODAL CHECK'S
            if ($('#check_subagente').is(':checked')) {
                $("#div_subagente").css("display","block");
            }
            else{
                $("#div_subagente").css("display","none");
            }
        });

        if ($('#check_subagente').is(':checked')) {
            console.log("checked")
            $("#div_subagente").css("display","block");
        }
    });

    $('select[name="country_port"]').change(function () {
        var country = $(this).val();
        
        $.ajax({
            url: '{{route('ports.name')}}',
            type: 'GET',
            data: { country: country }
        }).done(function (resp) {
            $.each(resp, function (i, item) {
                selected = (i != 0) ? '' : ' selected';
                $('#portname_id').append('<option value="' + item.id + '" ' + selected + '>' + item.port_name.toUpperCase() + '</option>');
            });
        })
    });//select COUNTRY


    $('#country_port').hover(function () {
        var country = $('select[name="country_port"]').val();
        console.log(country)
        if (country == null) {
            $('#country_port').empty().select2();
            $.ajax({
                url: '{{route('ports.name')}}',
                type: 'GET',
                data: { country: country }
            }).done(function (resp) {
                $.each(resp, function (i, item) {
                    selected = (i != 0) ? '' : ' selected';
                    $('#portname_id').append('<option value="' + item.id + '" ' + selected + '>' + item.port_name.toUpperCase() + '</option>');
                });
            })
        }else{
            $('select[name="country_port"]').hover(function () {
                $(this).select2();
            });
        }

    });//select CITY


    $('select[name="portname_id"]').hover(function () {
        $(this).select2();
    });


</script>
@endpush
