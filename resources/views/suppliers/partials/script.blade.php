@push('scripts')
<script>
ordenarSelect('type');

var dTable = $("#suppliers-table").DataTable({
    ajax: '/suppliers?dt=index',
    columns: [
        {data: 'abbreviation'},
        {data: 'name'},
        {
            data: 'actions',
            name: 'actions',
            orderable: false,
            serchable: false,
            bSearchable: false
        },
    ]
}); /*datatable*/

$('body').delegate('.status-supplier', 'click', function() {
    id_supplier = $(this).attr('id_supplier');
    supplier_name = $(this).attr('supplier_name');
    swal({
        title: 'Are you sure?',
        text: "you want to remove the supplier?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Yes, remove!'
  }).then(function() {
    $.ajax({
        url: '/suppliers/' + id_supplier + '/status',
        type: 'GET',
        dataType: 'json',
        data: {  id: id_supplier }
    }).done(function(data) {
        console.log(data);
        sAlert(data.title, data.type, data.text);
        dTable.ajax.reload();

    });
  });
}); //BUTTON .active-supplier

@if(Session::has('message'))
    sAlert(
        "{{ Session::get('message.title') }}",
        "{{ Session::get('message.type') }}",
        "{{ Session::get('message.text') }}"
);
@endif

function sAlert(title, type, text) {
    swal({
        title: title,
        type: type,
        text: text,
        confirmButtonText: "Continue",
        timer: 3000
    });
}

function ordenarSelect(id_componente)
{
    var selectToSort = jQuery('#' + id_componente);
    var optionActual = selectToSort.val();
    selectToSort.html(selectToSort.children('option').sort(function (a, b) {
        return a.text === b.text ? 0 : a.text < b.text ? -1 : 1;
    })).val(optionActual);
}
</script>
@endpush
