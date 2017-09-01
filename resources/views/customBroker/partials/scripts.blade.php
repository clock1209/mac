@push('scripts')
<script>
    var dTableBroker = $("#broker-table").DataTable({
        ajax: '/broker',
        columns: [
            {data: 'name'},
            {data: 'patent'},
            {data: 'email'},
            {data: 'phone'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false}
        ]
    });

    $('#btn-customBroker').click( function() {
        $.ajax({
            url: '/broker',
            type: 'POST',
            dataType: 'json',
            data: {

                name: $('[name="name"]').val(),
                patent: $('[name="patent"]').val(),
                email: $('[name="email"]').val(),
                phone: $('[name="phone"]').val(),
            }
        }).done(function (data) {
            console.log(data);
            resetBrokerInputs();
            sAlert(data.title, data.type, data.text);
            dTableBroker.ajax.reload();
        })
    });//BUTTON btn-contact

    $('body').delegate('.status-broke','click',function(){
        id_broke = $(this).attr('id_broke');
        swal({
            title: 'Are you sure?',
            text: "you want to remove the contact?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, remove!'
        }).then(function () {
            $.ajax({
                url: '/broker/' + id_broke + '/status',
                type: 'GET',
                dataType: 'json',
                data: {id: id_broke}
            }).done(function(data){
                console.log(data);
                sAlert(data.title, data.type, data.text);
                dTableBroker.ajax.reload();
            });
        });
    });//BUTTON .active-contact

    function resetBrokerInputs() {
        $('[name="name"]').val('');
        $('[name="patent"]').val('');
        $('[name="email"]').val('');
        $('[name="phone"]').val('');
    }

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