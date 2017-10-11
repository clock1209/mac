@push('scripts')
<script>
    Inputmask("(999) 999-9999", {"removeMaskOnSubmit": true, "nullable": true}).mask('#phone');

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
    });/*datatable*/

    $('body').delegate('.status-shipper','click',function()
    {
        id_shipper = $(this).attr('id_shipper');
        shipper_name = $(this).attr('shipper_name');
        swal({
            title: 'Are you sure?',
            text: "you want to remove the shipper?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, remove!'
        }).then(function () {
            $.ajax({
                url: '/shippers/' + id_shipper + '/status',
                type: 'GET',
                dataType: 'json',
                data: {id: id_shipper}
            }).done(function(data)
            {
                console.log(data);
                sAlert(data.title, data.type, data.text);
                dTable.ajax.reload();
            });
        });
    });//BUTTON .active-shipper

    $('select[name="country"]').change(function () {
        var country = $(this).val();
        var city = $('#selectCity').val();
        $('#selectCity').empty().select2();
        $.ajax({
            url: '/cities-by-country',
            type: 'GET',
            data: { country: country }
        }).done(function (resp) {
            $.each( JSON.parse(resp), function (i, item) {
                selected = (i != 0) ? '' : ' selected';
                $('#selectCity').append('<option value="' + item.name + '" ' + selected + '>' + item.name + '</option>');
            });
            ordenarSelect('selectCity');
        })
    });//select COUNTRY

    $('select[name="country"]').hover(function () {
        $(this).select2();
    });

    $('#selectCity').hover(function () {
        var selectedCity = $('#selectCity option:selected').html();
        $(this).select2();
        var country = $('select[name="country"]').val();
        if (country != '') {
            $('#selectCity').empty().select2();
            $.ajax({
                url: '/cities-by-country',
                type: 'GET',
                data: { country: country }
            }).done(function (resp) {
                $.each( JSON.parse(resp), function (i, item) {
                    selected = (item.name != selectedCity) ? '' : ' selected';
                    $('#selectCity').append('<option value="' + item.name + '" ' + selected + '>' + item.name + '</option>');
                });
            })
        }
    });//select CITY

    function addCountry()
    {
        swal({
            title: 'Add country',
            html:
            '<input id="swal_name" class="form-control" placeholder="Name"><br>' +
            '<input id="swal_code" class="form-control" placeholder="Abbreviation"><br>' +
            '<input id="swal_area_code" class="form-control" placeholder="Area code"><br>',
            preConfirm: function () {
                return new Promise(function (resolve, reject) {
                    var name = $('#swal_name').val();
                    var code = $('#swal_code').val();
                    var area_code = $('#swal_area_code').val();
                    $.ajax({
                        url: '{{ route('countries.store') }}',
                        type: 'POST',
                        data: {
                            name: name,
                            code: code,
                            area_code: area_code
                        }
                    }).done(function () {
                        resolve([name, code, area_code]);
                    }).fail(function (response){
                        console.log(response.responseJSON);
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
            '{!! Form::select('swal_select_country', $countries ? $countries : [''], null, ['class'=>'form-control']) !!}<br>' +
            '<input id="swal_city_name" class="form-control" placeholder="City name"><br>',
            preConfirm: function () {
                return new Promise(function (resolve, reject) {
                    var city_name = $('#swal_city_name').val();
                    var selected_country = $('select[name="swal_select_country"]').val();
                    $.ajax({
                        url: '{{ route('cities.store') }}',
                        type: 'POST',
                        data: {
                            name: city_name,
                            country: selected_country
                        }
                    }).done(function () {
                        resolve([city_name, selected_country]);
                    }).fail(function (response){
                        console.log(response.responseJSON);
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
