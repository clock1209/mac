@push('scripts')
<script>
    var rail_truck_table = $("#rail-truck-table").DataTable({
        ajax: '/inlandscharges',
        columns: [
            {data: 'type'},
            {data: 'dischargeport'},
            {data: 'currency'},
            {data: 'container'},
            {data: 'rangeup'},
            {data: 'cost'},
            {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false}
        ] ,
        "columnDefs": [{
        "targets": 1,
        "data": "dischargeport_id",
        "render": function ( data, type, full, meta )
        {
          return full.nameone+" - "+full.nametwo;
        }
      },
      {
      "targets": 3,
      "data": "rangeup",
      "render": function ( data, type, full, meta )
      {
        return full.rangeup+" - "+full.rangeto;
      }
    }
  ],
  initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                console.log(column[0][0])
                if(column[0][0] == 'All truck'){
                  console("fltrar")
                }
            });
        }
    });/*datatable Rail*/


    $('body').delegate('.status-inlands','click',function(){
        id_inlands = $(this).attr('id_inlands');

        swal({
            title: 'Are you sure?',
            text: "you want to remove the overweight?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, remove!'
        }).then(function () {
            $.ajax({
                url: '/inlandscharges/' + id_inlands ,
                type: 'GET',
                dataType: 'json',
                data: {id: id_overweight}
            }).done(function(data){
                sAlert(data.title, data.type, data.text);
                rail_truck_table.ajax.reload();
            });
        });
    });//BUTTON .active-bankAccount

    $(document).ready(function () {
        var currency = {{ require('./js/currency.json') }};
        $('#currency_id').empty();
        $('#currency_id').select2();
        $.each( currency, function (i, item)
        {
            selected = (i != 0) ? '' : ' selected';
            $('#currency_id').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
        });

    });



</script>
@endpush
