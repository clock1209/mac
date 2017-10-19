@push('scripts')
<script>
    var searchParams = new URLSearchParams(window.location.search);
    var id=searchParams.get("id");
    var note_table = $("#note-table").DataTable({
        ajax: '/remarks?id='+id,
        columns: [
            {data: 'id'},
            {data: 'note'},
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                serchable: false,
                bSearchable: false
            }
        ]
    }); /*datatable Note*/

    var condition_table = $("#condition-table").DataTable({
        ajax: '/conditions?id='+id,
        columns: [
            {data: 'id'},
            {data: 'free_demurrage'},
            {data: 'after_eta'},
            {data: 'eta_day'},
            {data: 'operation'},
            {data: 'price_day'},
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                serchable: false,
                bSearchable: false
            }
        ],
        "columnDefs": [{
            "targets": 2,
            "data": "after_eta",
            "render": function(data, type, full, meta) {
                  return data = (data== 0) ? 'No' : 'Yes';

            }
        },{
            "targets": 3,
            "data": "eta_day",
            "render": function(data, type, full, meta) {
                  return data = (data== 0) ? 'No' : 'Yes';

            }
        },{
            "targets": 4,
            "data": "operation",
            "render": function(data, type, full, meta) {
                  return data = (data== 0) ? 'No' : 'Yes';

            }
        }]
    }); /*datatable Note*/

    $('body').delegate('.delete-remarks','click',function(){
        id_remarks = $(this).attr('id_remarks');
        swal({
            title: 'Are you sure?',
            text: "it won't be possible to reverse this action.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, delete this note!'
        }).then(function () {
            $.ajax({
                url: '/remarks/' + id_remarks,
                type: 'DELETE',
                dataType: 'json',
                data: {id: id_remarks}
            }).done(function(data){
                sAlert(data.title, data.type, data.text);
                note_table.ajax.reload();
            });
        });
    });//BUTTON .delete-note

    $('body').delegate('.delete-condition','click',function(){
        id_condition = $(this).attr('id_condition');
        swal({
            title: 'Are you sure?',
            text: "it won't be possible to reverse this action.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, delete this condition!'
        }).then(function () {
            $.ajax({
                url: '/conditions/' + id_condition,
                type: 'DELETE',
                dataType: 'json',
                data: {id: id_condition}
            }).done(function(data){
                sAlert(data.title, data.type, data.text);
                condition_table.ajax.reload();
            });
        });
    });//BUTTON .delete-condition

    $('body').delegate('.edit-remarks','click',function(){
        id_remarks = $(this).attr('id_remarks');
        $.ajax({
            url : '/remarks/' + id_remarks,
            type : 'GET',
            dataType: 'json',
            data : {id: id_remarks}
        }).done(function(data){
            $('#mdl_notes').val(data.note);
            $('#mdlIdNote').val(id_remarks);
        });
    });//MODAL

    $('body').delegate('.edit-condition','click',function(){
        id_condition = $(this).attr('id_condition');
        $.ajax({
            url : '/conditions/' + id_condition,
            type : 'GET',
            dataType: 'json',
            data : {id: id_condition}
        }).done(function(data){
            console.log(data)
            $( "#mdl_after_eta" ).prop( "checked",false );
            $( "#mdl_eta_day" ).prop( "checked",false );
            $( "#mdl_operation" ).prop( "checked",false );
            $('#mdl_free_demurrage').val(data.free_demurrage);
            $('#mdl_after_eta').val(data.after_eta);
            $('#mdl_eta_day').val(data.eta_day);
            $('#mdl_operation').val(data.operation);
            $('#mdl_price_day').val(data.price_day);
            if(data.after_eta!= 0)
            $( "#mdl_after_eta" ).prop( "checked",true );
            if(data.eta_day!= 0)
            $( "#mdl_eta_day" ).prop( "checked",true );
            if(data.operation!= 0)
            $( "#mdl_operation" ).prop( "checked",true );
            $("input[name=type_demurrage][value='"+data.type_demurrage+"']").prop("checked",true);
            $('#mdlIdCondition').val(id_condition);
        });
    });//MODAL

    //Update
    $('body').delegate('#noteChargeUpdate','click',function(){
        mdlIdNote = $('#mdlIdNote').val();
        $.ajax({
            url : '/remarks/' + mdlIdNote,
            type : 'PUT',
            dataType: 'json',
            data : {
                note:  $('#mdl_notes').val(),
            }
        }).done(function(data){
            $('#note_modal').modal('hide');
            sAlert(data.title, data.type, data.text);
            note_table.ajax.reload();
        }).fail(function (data) {
            var errors = data.responseJSON;
            $.each(errors, function(index, value){
                $('[name="'+ index +'"]').after('<span class="help-block">'+value+'</span>')
                    .parent().addClass('has-error');
            });
        });
    });//MODAL Update Note

    $('body').delegate('#conditionChargeUpdate','click',function(){
        mdlIdCondition = $('#mdlIdCondition').val();
        $.ajax({
            url : '/conditions/' + mdlIdCondition,
            type : 'PUT',
            dataType: 'json',
            data : {

                free_demurrage:  $('#mdl_free_demurrage').val(),
                after_eta:  $('#mdl_after_eta').val(),
                eta_day:  $('#mdl_eta_day').val(),
                operation:  $('#mdl_operation').val(),
                price_day:  $('#mdl_price_day').val(),
                type_demurrage: $('.radio_demurrage:checked').val()
            }
        }).done(function(data){
            $('#condition_modal').modal('hide');
            sAlert(data.title, data.type, data.text);
            condition_table.ajax.reload();
        }).fail(function (data) {
            var errors = data.responseJSON;
            $.each(errors, function(index, value){
                $('[name="'+ index +'"]').after('<span class="help-block">'+value+'</span>')
                    .parent().addClass('has-error');
            });
        });
    });//MODAL Update Condition

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

    $('input[type=checkbox]').click(function(){
        if ($('#mdl_after_eta').is(':checked')) {
            $('#mdl_after_eta').val(1);
        }
        else{
            $('#mdl_after_eta').val(0);
        }

        if ($('#mdl_eta_day').is(':checked')) {
            $('#mdl_eta_day').val(1);
        }
        else{
            $('#mdl_eta_day').val(0);
        }

        if ($('#mdl_operation').is(':checked')) {
            $('#mdl_operation').val(1);
        }
        else{
            $('#mdl_operation').val(0);
        }
    });


</script>
@endpush
