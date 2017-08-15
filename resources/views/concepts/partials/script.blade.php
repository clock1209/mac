@push('scripts')
<script>
    var dTable = $("#concepts-table").DataTable({
        ajax: "{{ route('datatable.concepts') }}",
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'actions', name: 'actions', orderable: false,
            serchable: false,  bSearchable: false},
        ],
        columnDefs:
				[
          {
	                "targets": [ 0,],
	                "visible": false,
	                "searchable": false
	         },
          {
            "targets": 2,
            "width": "20%",
            "data": null,
            "defaultContent":
            "  <a  class='btn btn-danger' id='eliminar' data-toggle='modal' data-target='#myModal2'><i class='glyphicon glyphicon-remove'></i> Delete  <t class='hidden-xs'></t></a>"

           }
        ]
    });


    $('#concepts-table tbody').on( 'click', 'a', function () {
    				    var data = dTable.row( $(this).parents('tr') ).data();
    				    var button_id = this.id; // get the id of the button clicked
    						//console.log(button_id)
    						var data = dTable.row( $(this).parents('tr') ).data();
    					       //alert( data.id +"'s salary is: "+ data.nombre );
                    // console.log(data)
    				   	if (button_id=='eliminar')
                {
                   //console.log('eliminando: '+data.id)
                   Eliminar(data.id);
    						}

              }
    				);

function Add()
{
  var name_concept=   document.getElementById("name_concept").value;
   if(name_concept=="" || name_concept == null)
   {

       swal("Oops...", "El cambo Nombre de concepto es requerido", "error");
       return false;
   }
   $.post('concepts/updates/{!! Auth::user()->id !!}',
   {
     _token: $('meta[name=csrf-token]').attr('content'),
     val_name :name_concept,
     tipo:'Agregar'
    }
   )
   .done(function(data) {

       swal('Correcto', 'Concepto Agregador con Exito!!', 'success');
       $('#name_concept').val('');
       dTable.ajax.reload();

   })
   .fail(function() {
       swal("Error Interno", "Consultar con el Administrador", "error");
   });


}
function Eliminar(idconcepts)
{

  //console.log(idconcepts)
    $.post('concepts/updates/{!! Auth::user()->id !!}',
    {
      _token: $('meta[name=csrf-token]').attr('content'),
      val_concepts :idconcepts,
      tipo:'Eliminar'
     }
    )
    .done(function(data) {

        swal('Correcto', 'Concepto Eliminado con Exito!!', 'success');
        dTable.ajax.reload();
    })
    .fail(function() {
        swal("Error Interno", "Consultar con el Administrador", "error");
    });
}


</script>
@endpush
