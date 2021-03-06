@push('scripts')
<script>
    var con_id = '{!! (isset($con_id)) ? $con_id : null!!}';
    var dTable = $("#stuff-table").DataTable({
        ajax: {
            url: '/stuffs',
            data: {id: con_id}
        },
        columns: [
            {data: 'id'},
            {data: 'concepts'},
            {data: 'cost'},
            {data: 'type'},
            {data: 'agreed_cost'},
            {data: 'currency'},
            {data: 'actions', name: 'actions', orderable: false,
            serchable: false,  bSearchable: false},
        ],
        columnDefs:
				[{
            "targets": [ 0,],
	           "visible": false,
	           "searchable": false
	      },{
            "targets": 6,
            "width": "30%",
            "data": null,
        }]
    });


    $('body').delegate('.status-stuffs','click',function()
    {
        id_stuffs = $(this).attr('id_stuffs');

        swal({
            title: 'Are you sure?',
            text: "you want to remove the stuffs?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, remove!'
        }).then(function () {
            $.ajax({
                url: '/stuffs/'+id_stuffs,
                type: 'DELETE',
                data: {id: id_stuffs}
            }).done(function(data)
            {
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });

    $(document).ready(function() {
        var currency = {{ require('./js/currency.json') }};
        $('#currency').empty();
        $('#currency').select2();
        $.each(currency, function(i, item) {
            selected = (i != 0) ? '' : ' selected';
            $('#currency').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
        });

        @if(!empty($stuff))
            $('#currency').val('{{$stuff->currency}}');
        @endif

        $('#currency').each(function () {
            var s = $(this);
            s.data().select2.on("focus", function (e) {
                s.select2("open");
            });
            s.data().select2.on("close", function (e) {
                $("#btn_save").focus();
            });
        });

    });

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

    @if (Session::has('message'))
        sAlert(
        "{{ Session::get('message.title') }}",
        "{{ Session::get('message.type') }}",
        "{{ Session::get('message.text') }}"
    );
    @endif

</script>
@endpush
