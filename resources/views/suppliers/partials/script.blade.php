@push('scripts')
<script>
    var dTable = $("#suppliers-table").DataTable({
        ajax: '/suppliers',
        columns: [
            {data: 'abbreviation'},
            {data: 'name'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
        ]
    });/*datatable*/

    var dTable = $("#bank-accounts-table").DataTable({
        ajax: '/suppliers/create',
        columns: [
            {data: 'pay_of'},
            {data: 'account'},
            {data: 'bank'},
            {data: 'clabe'},
            {data: 'aba'},
            {data: 'swift'},
            {data: 'reference'},
            {data: 'currency'},
            {data: 'beneficiary'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false}
        ]
    });/*datatable*/

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