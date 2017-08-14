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
    });
</script>
@endpush