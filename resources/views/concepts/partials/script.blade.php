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
        ]
    });


    $('#concepts-table tbody').on( 'click', 'a', function () {
    				    var data = dTable.row( $(this).parents('tr') ).data();
    				    var button_id = this.id;

    						var data = dTable.row( $(this).parents('tr') ).data();

    				   	if (button_id=='eliminar')
                {

                   Eliminar(data.id);
    						}

              }
    				);

function Add()
{
  var name_concept=   document.getElementById("name_concept").value;
   if(name_concept=="" || name_concept == null)
   {

       swal("Oops...", "Concept name is required", "error");
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

       swal('Success', 'Concept added successfully!!', 'success');
       $('#name_concept').val('');
       dTable.ajax.reload();

   })
   .fail(function() {
       swal("Interno Error", "Consult with administrator", "error");
   });


}
function Eliminar(idconcepts)
{


      swal({
          title: 'Are you sure?',
          text: "you want to remove the concepts?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Yes, remove!'
      }).then(function () {
          $.ajax({
              url: 'concepts/updates/{!! Auth::user()->id !!}',
              type: 'POST',
              data: {

                val_concepts :idconcepts,
                tipo:'Eliminar'
              }
          }).done(function(data){
              console.log(data);
              swal('Success', 'Concept deleted!!', 'success');
              dTable.ajax.reload();
          })
          .fail(function() {
              swal("Internal Error", "Consult with administrator", "warning");
          });
      });

}


</script>
@endpush
