@push('scripts')
<script>
    var dTable = $("#shipments-table").DataTable({
        ajax: '/shipments',
        columns: [
            {data: 'reference_number'},
            {data: 'consignee'},
            {data: 'etd'},
            {data: 'atd'},
            {data: 'eta'},
            {data: 'final_arrived'},
            {data: 'booking_no'},
            {data: 'status'},
            {data: 'released_to_aa'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
        ],
    });

    $('select[name="rate"]').change(function () {
        if($(this).val() == 'Special') {
            $('#number_quote')
                .animate({left: '0px'}, {queue: false})
                .fadeIn('slow');
        } else {
            $('#number_quote')
                .animate({left: '300px'}, {queue: false})
                .fadeOut('fast');
        }
    });

    $('select[name="type"]').change(function () {
        if($(this).val() == 'FCL') {
            $('div#lcl').hide();
            $('div#fcl').show();
        } else {
            $('div#fcl').hide();
            $('div#lcl').show();
        }
    });

</script>
@endpush