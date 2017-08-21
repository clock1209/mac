@push('scripts')
<script>
    var dTable = $("#concepts-table").DataTable({
        ajax: '/concepts',
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
          if (button_id=='eliminar'){
                   Eliminar(data.id);
                 }
               });

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
              url: 'concepts/'+idconcepts+'/edit',
              type: 'GET',
              dataType: 'json',
              data: {val_concepts :idconcepts}
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
