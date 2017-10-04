@push('scripts')
<script>
    Inputmask("9{1,10}[\.9{2}]").mask($('#mcc_cost'));
    var con_id = '{!! (isset($con_id)) ? $con_id : null!!}';
    var dTable = $("#mcc-table").DataTable({
        ajax: {
            url: '/mcc',
            data: {
                id: con_id
            }
        },
        columns: [
            {data: 'cost'},
            {data: 'currency'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
        ],
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



    $('body').delegate('.delete-mcc','click',function(){
        mcc_id = $(this).attr('mcc_id');
        swal({
            title: 'Are you sure?',
            text: "it won't be possible to reverse this action.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, delete this mcc!'
        }).then(function () {
            $.ajax({
                url: '/mcc/' + mcc_id,
                type: 'DELETE',
                dataType: 'json',
                data: {id: mcc_id}
            }).done(function(data){
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });//BUTTON .delete-shipper

    $('body').delegate('.activate-mcc','click',function(){
        mcc_id = $(this).attr('mcc_id');
        swal({
            title: 'Are you sure?',
            text: "it won't be possible to reverse this action.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, activate this mcc!'
        }).then(function () {
            $.ajax({
                url: '/mcc/' + mcc_id,
                type: 'DELETE',
                dataType: 'json',
                data: {id: mcc_id}
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
