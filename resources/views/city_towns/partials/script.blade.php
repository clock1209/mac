@push('scripts')
<script>

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

        dTable = $("#city_town-table").DataTable({
            ajax: '{{ route('town.filter',['country'=>'']) }}'+_country,
            type: 'GET',
            destroy: true,
            "bProcessing": true,
            "bServerSide": true,
            columns: [
                {data: 'name'},
                {data: 'port_name'},
                {data: 'get_type.name'},
                {data: 'actions', name: 'actions', orderable: false, serchable: false,  bSearchable: false},
            ],"columnDefs": [{
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

    function addCountry()
    {
        swal({
            title: 'Add country',
            html:
            '<input id="swal_name" class="form-control" placeholder="Name"><br>' +
            '<input id="swal_code" class="form-control" placeholder="Abbreviation"><br>',
            preConfirm: function () {
                return new Promise(function (resolve, reject) {
                    var name = $('#swal_name').val();
                    var code = $('#swal_code').val();
                    $.ajax({
                        url: '{{ route('add.country') }}',
                        type: 'POST',
                        data: {
                            port_name: name,
                            code: code
                        }
                    }).done(function () {
                        resolve([name, code]);
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
    }

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
                        resolve([city_name, selected_country]);
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
    }

</script>
@endpush
