<h4 class="n-caption col-md-9">Invoiced to</h4>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">Name*:</label>
                {!! Form::text('name_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="form-group">
                <label class="input-control">Business name*:</label>
                {!! Form::text('business_name_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">RFC*:</label>
                {!! Form::text('rfc_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label class="input-control">Country code*:</label>
                        {!!Form::select('country_code_inv',$countriesCode,$customer ? '_'.$customer->countrycode : null,
                            ['class'=>'form-control select2'])!!}
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label class="input-control">Phone*:</label>
                        {!! Form::text('phone_inv',null,['class'=>'form-control', 'id'=>'phone_customer']) !!}
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">Street*:</label>
                {!! Form::text('street_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="form-group">
                <label class="input-control">Number*:</label>
                {!! Form::text('outside_number_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">Suburb*:</label>
                {!! Form::text('suburb_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="form-group">
                <label class="control-label">City*:</label><br>
                {!! Form::select('city_inv', $customer ? [$customer->city] : [null => ' '], $customer ? [$customer->city] : null,
                    ['class'=>'form-control select_city', 'id' => 'selectCity_inv']) !!}
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">State*:</label>
                {!! Form::text('state_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="form-group">
                <label class="control-label">Country*:</label>
                {!! Form::select('country_inv', $countries, $customer ? $customer->country : null, ['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">Zip Code*:</label>
                {!! Form::text('zip_code_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="form-group">
                <label class="input-control">E-mail*:</label>
                {!! Form::email('email_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class="input-control">Contact name*:</label>
                {!! Form::text('contact_name_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-offset-1">
            <div class="form-group">
                <label class="input-control">Contact job*:</label>
                {!! Form::text('contact_job_inv',null,['class'=>'form-control']) !!}
                <span class="help-block"></span>
            </div>
        </div>
    </div>

</div>

<div class="form-group">
    <div class="col-md-4 col-sm-12">

    </div>
    <div class="col-md-4 col-md-offset-1 col-sm-12" style="border-color: transparent">

    </div>
</div>
<span class="btn btn-success" onclick="saveInvoiced();"><span class="glyphicon glyphicon-plus"></span> Add</span><br><br>
<div class="box box-solid">
    <div class="panel-body" style="overflow-x: auto; height:100%;">
        <table class="table table-bordered table-hover" id="invoiced-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Business name</th>
                <th>RFC/TAX ID</th>
                <th>Phone</th>
                <th>Contact name</th>
                <th>Contact job</th>
                <th>E-mail</th>
                <th width="210px;">Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

@include('invoiced_to.partials.editModal')

@push('scripts')
    <script>
        Inputmask("(999) 999-9999", {"removeMaskOnSubmit": true, "nullable": true}).mask('.phone-mask');

        function saveInvoiced()
        {
            clearErrors();
            var frm = new FormData($("form").serialize());
            $.each($("form").serializeArray(), function(key, input) {
                frm.append(input.name, input.value);
            });
            $.ajax({
                url: '/invoiced',
                type: 'POST',
                dataType: 'json',
                data: frm,
                processData: false,
                contentType: false
            }).done(function(response){
                sAlert(response.title, response.type, response.text);
                iTable.ajax.reload();
            }).fail(function(response) {
                showErrorsInv(response.responseJSON);
            });
        }

        function getInvoiced(id)
        {
            $.ajax({
                url: '/invoiced/' + id + '/edit',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    id: id
                }
            }).done( function (invoiced) {
                var city = invoiced.city;
                console.log(city);
                console.log(invoiced.city);
                $.each(invoiced, function (index, value) {
                    if (index == 'country_code') {
                        $('#invoiced_modal select[name="'+ index +'"]').val(value);
                    } else if (index == 'country') {
                        console.log('dentro ' + city);
                        $('#invoiced_modal select[name="'+ index +'"]').val(value);
                        $('#invoiced_modal select[name="'+ index +'"]').val(value).trigger('change.select2');
                        getCitiesByCountry($('#invoiced_modal select[name="'+ index +'"]'));
                        $('#invoiced_modal select[name="city"]').val(city).trigger('change.select2').css('width', '100%');
                    } else {
                        $('#invoiced_modal input[name="'+ index +'"]').val(value);
                    }
                    $('#invoiced_modal select[name="city"]').val('Granjas').trigger('change.select2').css('width', '100%');
                });
                $('#btn_model').attr('onclick', "updateInvoiced('"+ id +"')");
            });
            $('#invoiced_modal select[name="city"]').val('Granjas').trigger('change.select2').css('width', '100%');
        }

        function updateInvoiced(id)
        {
            clearErrors();
            var inputs = $('#invoiced_modal :input');
            var obj = {};
            $.each(inputs, function(key, input) {
                obj[input.name] = input.value;
            });
            $.ajax({
                url: '/invoiced/' + id,
                type: 'PUT',
                dataType: 'JSON',
                data: obj,
            }).done( function (response) {
                sAlert(response.title, response.type, response.text);
                iTable.ajax.reload();
                $('#invoiced_modal').modal('hide');
            }).fail(function(response) {
                showErrorsInvMdl(response.responseJSON);
            });
        }

        function showErrorsInv(errors)
        {
            var list = '';
            $.each(errors, function(index, value){
                var input = $('[name="' + index + '"]');
                input.closest('.form-group').addClass('has-error').find('.help-block').text(value[0]);
                list += '<li>'+ value[0] +'</li>';
            });
            $('.ajax_errors').fadeIn().find('.list-content').html(list).fadeIn();
        }

        function showErrorsInvMdl(errors)
        {
            var list = '';
            $.each(errors, function(index, value){
                var input = $('#invoiced_modal [name="' + index + '"]');
                input.closest('.form-group').addClass('has-error').find('.help-block').text(value[0]);
                list += '<li>'+ value[0] +'</li>';
            });
        }

        function deleteInvoiced(id)
        {
            swal({
                title: 'Are you sure?',
                text: "you want to remove this element?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, remove!'
            }).then(function () {
                $.ajax({
                    url: '/invoiced/' + id,
                    type: 'DELETE',
                    dataType: 'JSON',
                    data: {
                        id: id
                    }
                }).done(function(response){
                    sAlert(response.title, response.type, response.text);
                    iTable.ajax.reload();
                });
            });
        }

        $('select[name="country"]').change(function () {
            var country = $(this).val();
            $('.selectCity').empty().select2();
            $.ajax({
                url: '/cities-by-country',
                type: 'GET',
                data: { country: country }
            }).done(function (resp) {
                $.each( JSON.parse(resp), function (i, item) {
                    selected = (i != 0) ? '' : ' selected';
                    $('.selectCity').append('<option value="' + item.name + '" ' + selected + '>' + item.name + '</option>');
                });
            })
        });//select COUNTRY

        function getCitiesByCountry(input)
        {
            var country = $(input).val();
            $('.selectCity').empty().select2();
            $.ajax({
                url: '/cities-by-country',
                type: 'GET',
                data: { country: country }
            }).done(function (resp) {
                $.each( JSON.parse(resp), function (i, item) {
                    selected = (i != 0) ? '' : ' selected';
                    $('.selectCity').append('<option value="' + item.name + '" ' + selected + '>' + item.name + '</option>');
                });
            })
        }
    </script>
@endpush