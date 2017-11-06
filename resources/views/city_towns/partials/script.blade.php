@push('scripts')
<script>

    var _town_id_edit =null
    $(document).ready(function () {

        $('#country').select2();
        $('#city').select2();
        $('#type').select2();
        $('#country').select2('open');

        $('#city').on('select2:close', function(event) {
            $('#port_name').focus();
        });

    });

    $('select[name="country"]').change(function () {
        var _country = $(this).val();
        $('#city').empty().select2();
        $.ajax({
            url: '{{route('ports.name')}}',
            type: 'GET',
            data: { country: _country }
        }).done(function (resp) {
            $.each(resp, function (i, item) {
                selected = (i != 0) ? '' : ' selected';
                $('#city').append('<option value="' + item.id + '" ' + selected + '>' + item.port_name.toUpperCase() + '</option>');
            });
            $('#city').select2('open');
        })

        table(_country);
    });//select COUNTRY

    $('#country_port_id').hover(function () {
        var country = $('select[name="country_port_id"]').val();
        if (country == null) {
            $.ajax({
                url: '{{route('ports.name')}}',
                type: 'GET',
                data: { country: country }
            }).done(function (resp) {
                $.each(resp, function (i, item) {
                    selected = (i != 0) ? '' : ' selected';
                    $('#port_name_id').append('<option value="' + item.id + '" ' + selected + '>' + item.port_name.toUpperCase() + '</option>');
                });
            })
        }else{
            $('select[name="country_port_id"]').hover(function () {
                $(this).select2();
            });
        }

    });//select CITY


    function editCountry()
    {
        swal({
            title: 'Edit Name Country',
            html:
            '<input id="swal_edit_name_country" class="form-control" placeholder="Name"><br>',
            preConfirm: function () {
                return new Promise(function (resolve, reject) {
                    var _name = $('#swal_edit_name_country').val();
                    var _id = $('#country').val();
                    $.ajax({
                        url: '{{ route('edit.country')}}',
                        type: 'POST',
                        data: {
                            port_name: _name,
                            id: _id
                        }
                    }).done(function () {
                        resolve([_name]);
                    }).fail(function (response){
                        var errors = response.responseJSON;
                        var html = '';
                        $.each(errors, function(index, value){
                            html += '<span>'+ value +'</span><br>';
                        });
                        reject('<div>'+ html +'</div>');
                    });
                })
            }
        }).then(function () {
            swal({
                title: 'Added',
                text: 'Country edit successfully',
                type: 'success'
            }).then(function () {
                location.reload();
            });
        }).catch(swal.noop)
    }// Edit Name

    function addCountry()
    {
        swal({
            title: 'Add country',
            html:
            '<input id="swal_name" class="form-control" placeholder="Name"><br>' +
            '<input id="swal_code" class="form-control" placeholder="Abbreviation"><br>',
            preConfirm: function () {
                return new Promise(function (resolve, reject) {
                    var _name = $('#swal_name').val();
                    var _code = $('#swal_code').val();
                    $.ajax({
                        url: '{{ route('add.country') }}',
                        type: 'POST',
                        data: {
                            port_name: _name,
                            code: _code
                        }
                    }).done(function () {
                        resolve([_name, _code]);
                    }).fail(function (response){
                        var errors = response.responseJSON;
                        var html = '';
                        $.each(errors, function(index, value){
                            html += '<span>'+ value +'</span><br>';
                        });
                        reject('<div>'+ html +'</div>');
                    });
                })
            }
        }).then(function () {
            swal({
                title: 'Added',
                text: 'Country added successfully',
                type: 'success'
            }).then(function () {
                location.reload();
            });
        }).catch(swal.noop)
    } // Add Country

    function editCity()
    {
        swal({
            title: 'Edit Name City',
            html:
            '<input id="swal_edit_name_city" class="form-control" placeholder="Name"><br>',
            preConfirm: function () {
                return new Promise(function (resolve, reject) {
                    var _name = $('#swal_edit_name_city').val();
                    var _id = $('#city').val();
                    $.ajax({
                        url: '{{ route('edit.city')}}',
                        type: 'POST',
                        data: {
                            port_name: _name,
                            id: _id
                        }
                    }).done(function () {
                        resolve([_name]);
                    }).fail(function (response){
                        var errors = response.responseJSON;
                        var html = '';
                        $.each(errors, function(index, value){
                            html += '<span>'+ value +'</span><br>';
                        });
                        reject('<div>'+ html +'</div>');
                    });
                })
            }
        }).then(function () {
            swal({
                title: 'Edit',
                text: 'City edit successfully',
                type: 'success'
            }).then(function () {
                location.reload();
            });
        }).catch(swal.noop)
    }// Edit Name City

    function addCity()
    {
        swal({
            title: 'Add city',
            html:
            '{!! Form::select('swal_select_country', $country ? $country : [''], null, ['class'=>'form-control']) !!}<br>' +
            '<input id="swal_city_name" class="form-control" placeholder="City name"><br>'+
            '{!! Form::select('swal_type',$type ? $type:[''], null,['class'=>'form-control', 'required','id'=>'swal_type', 'placeholder'=> ' ']) !!}<br>',
            preConfirm: function () {
                return new Promise(function (resolve, reject) {
                    var city_name = $('#swal_city_name').val();
                    var selected_country = $('select[name="swal_select_country"]').val();
                    var selected_type = $( "#swal_type option:selected" ).val();

                    $.ajax({
                        url: '{{ route('add.city') }}',
                        type: 'POST',
                        data: {
                            port_name: city_name,
                            country_ports_id: selected_country,
                            type_id: selected_type
                        }
                    }).done(function () {
                        resolve([city_name, selected_country,selected_type]);
                    }).fail(function (response){
                        var errors = response.responseJSON;
                        var html = '';
                        $.each(errors, function(index, value){
                            html += '<span>'+ value +'</span><br>';
                        });
                        reject('<div>'+ html +'</div>');
                    });
                })
            }
        }).then(function () {
            swal({
                title: 'Added',
                text: 'City added successfully',
                type: 'success'
            }).then(function () {
                location.reload();
            });
        }).catch(swal.noop)
    } //Add City

    $('#country_port_id').hover(function () {
        var country = $('select[name="country_port_id"]').val();
        if (country == null) {
            $.ajax({
                url: '{{route('ports.name')}}',
                type: 'GET',
                data: { country: country }
            }).done(function (resp) {
                $.each(resp, function (i, item) {
                    selected = (i != 0) ? '' : ' selected';
                    $('#port_name_id').append('<option value="' + item.id + '" ' + selected + '>' + item.port_name.toUpperCase() + '</option>');
                });
            })
        }else{
            $('select[name="country_port_id"]').hover(function () {
                $(this).select2();
            });
        }

    });//select CITY

    function editType()
    {
        swal({
            title: 'Edit Name Type',
            html:
            '<input id="swal_edit_name_type" class="form-control" placeholder="Name"><br>',
            preConfirm: function () {
                return new Promise(function (resolve, reject) {
                    var _name = $('#swal_edit_name_type').val();
                    var _id = $('#type').val();
                    $.ajax({
                        url: '{{ route('edit.type')}}',
                        type: 'POST',
                        data: {
                            name: _name,
                            id: _id
                        }
                    }).done(function () {
                        resolve([_name]);
                    }).fail(function (response){
                        var errors = response.responseJSON;
                        var html = '';
                        $.each(errors, function(index, value){
                            html += '<span>'+ value +'</span><br>';
                        });
                        reject('<div>'+ html +'</div>');
                    });
                })
            }
        }).then(function () {
            swal({
                title: 'Added',
                text: 'Type edit successfully',
                type: 'success'
            }).then(function () {
                location.reload();
            });
        }).catch(swal.noop)
    }// Edit Name Type

    function addType()
    {
        swal({
            title: 'Add Type Location',
            html:
            '<input id="swal_name" class="form-control" placeholder="Name"><br>',
            preConfirm: function () {
                return new Promise(function (resolve, reject) {
                    var _name = $('#swal_name').val();
                    $.ajax({
                        url: '{{ route('add.type') }}',
                        type: 'POST',
                        data: {
                            name: _name,
                        }
                    }).done(function () {
                        resolve([_name]);
                    }).fail(function (response){
                        var errors = response.responseJSON;
                        var html = '';
                        $.each(errors, function(index, value){
                            html += '<span>'+ value +'</span><br>';
                        });
                        reject('<div>'+ html +'</div>');
                    });
                })
            }
        }).then(function () {
            swal({
                title: 'Added',
                text: 'Type added successfully',
                type: 'success'
            }).then(function () {
                location.reload();
            });
        }).catch(swal.noop)
    } //Add Type

    $('body').delegate('.editTown','click',function(){
        town_id = $(this).attr('town_id');
        $.ajax({
            url: 'towns/'+town_id+'/edit',
            type : 'GET',
            dataType: 'json',
        }).done(function(data){
            $('#mdl_country').val(data.country_ports_id).trigger("change")
            _town_id_edit = data.id;
            $('#mdl_type').val(data.type_id)
            $('#mdlIdTown').val(data.id)
        });
    });//MODAL

    $('select[name="mdl_country"]').change(function () {
        var _country = $(this).val();
        $('#mdl_city').empty().select2();
        $.ajax({
            url: '{{route('ports.name')}}',
            type: 'GET',
            data: { country: _country }
        }).done(function (resp) {
            $.each(resp, function (i, item) {
                selected = (i != 0) ? '' : ' selected';
                $('#mdl_city').append('<option value="' + item.id + '" ' + selected + '>' + item.port_name.toUpperCase() + '</option>');
            });
            table(_country);
        })

    });//select COUNTRY MODAL

    $('body').delegate('#townsChargeUpdate','click',function(){
        mdlIdTown = $('#mdlIdTown').val();
        $.ajax({
            url : '/towns/' + mdlIdTown,
            type : 'PUT',
            dataType: 'json',
            data : {
                id:  $('#mdlIdTown').val(),
                mdl_country:$('#mdl_country').val(),
                mdl_type:$('#mdl_type').val(),
                mdl_city:$('#mdl_city').val(),
            }
        }).done(function(data){
            $('#cities_towns_modal').modal('hide');
            sAlert(data.title, data.type, data.text);
            table($('#mdl_country').val());
        }).fail(function (data) {
            var errors = data.responseJSON;
            $.each(errors, function(index, value){
                $('[name="'+ index +'"]').after('<span class="help-block">'+value+'</span>')
                    .parent().addClass('has-error');
            });
        });
    });//MODAL Update

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
    }//Alert

    function table(_country)
    {
        dTable = $("#city_town_table").DataTable({
            ajax: '{{ route('town.filter',['country'=>'']) }}'+_country,
            type: 'GET',
            destroy: true,
            "bProcessing": true,
            "bServerSide": true,
            columns: [
                {data: 'name'},
                {data: 'port_name'},
                {data: 'get_type.name', orderable: false},
                {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
            ],"columnDefs": [{
                "targets": 0,
                "data": "name",
                "render": function(data, type, full, meta) {
                    return full.get_country.port_name.toUpperCase();
                }
            },{
                "targets": 1,
                "data": "port_name",
                "render": function(data, type, full, meta) {
                    return full.port_name.toUpperCase();
                }
            },{
                "targets": 2,
                "data": "get_type.name",
                "render": function(data, type, full, meta) {
                    if(full.get_type===null){
                        return "NO ASSIGNED"
                    }else {
                        return full.get_type.name;
                    }
                }
            }]
        });
    }// Refresh Table

    $('body').delegate('.editCountry','click',function(){
        country = $('#country').val();
        $.ajax({
            url: 'countries/'+country+'/edit',
            type : 'GET',
            dataType: 'json',
        }).done(function(data){
            $('#swal_edit_name_country').val(data.port_name)
        });
    });//GET Edit Country

    $('body').delegate('.editCity','click',function(){
        city = $('#city').val();
        $.ajax({
            url: 'towns/'+city+'/edit',
            type : 'GET',
            dataType: 'json',
        }).done(function(data){
            $('#swal_edit_name_city').val(data.port_name.toUpperCase())
        });
    });//GET Edit City

    $('body').delegate('.editType','click',function(){
        type = $('#type').val();
        $.ajax({
            url: 'locations/'+type+'/edit',
            type : 'GET',
            dataType: 'json',
        }).done(function(data){
            $('#swal_edit_name_type').val(data.name)
        });
    });//GET Edit Type

    $('body').delegate('.delete-town','click',function(){
        town_id = $(this).attr('town_id');
        swal({
            title: 'Are you sure?',
            text: "it won't be possible to reverse this action.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, delete this Port!'
        }).then(function () {
            $.ajax({
                url: '/towns/' + town_id,
                type: 'DELETE',
                dataType: 'json',
                data: {id: town_id}
            }).done(function(data){
                sAlert(data.title, data.type, data.text);
                table($('#country').val())
            });
        });
    });//BUTTON .delete


</script>
@endpush
