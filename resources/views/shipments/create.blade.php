@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Shipping Info
@endsection

@section('contentheader_title')
    Shipping Info
@endsection

@section('main-content')
    @include('alerts.messages')
    {!! Form::open(['route'=>'shipments.store', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
        <div class="form-group">
            <div class="col-md-4 col-sm-12">
                <label for="reference_number_lbl" class="input-control">Reference number*:</label>
                {!! Form::text('reference_number',null,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-4 col-md-offset-1 col-sm-12 ">
                <label for="type_lbl" class="input-control">Type*:</label>
                {!!Form::select('type',['FCL' => 'FCL', 'LCL' => 'LCL'], null,['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 col-sm-12">
                <label for="consignee_lbl" class="input-control">Consignee*:</label>
                {!!Form::select('consignee', ['', ''], null,['class'=>'form-control'])!!}
            </div>
            <div class="col-md-4 col-md-offset-1 col-sm-12 ">
                <label for="rate_lbl" class="input-control">Rate*:</label>
                {!!Form::select('rate',['Asia' => 'Asia', 'Special' => 'Special'], null,['class'=>'form-control'])!!}
            </div>
            <div class="col-md-3 col-sm-12" style="display: none; position: relative; left: 300px;" id="number_quote">
                <label for="number_of_quote_lbl" class="input-control">Number of quote*:</label>
                {!!Form::select('number_of_quote',['123', '456', '789'], null,['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4 col-sm-12">
                <label for="shipper_lbl" class="input-control">Shipper*:</label>
                {!!Form::select('shipper', ['', ''], null,['class'=>'form-control'])!!}
            </div>
            <div class="col-md-4 col-md-offset-1 col-sm-12 ">
                <label for="pay_lbl" class="input-control">Pay*:</label>
                {!!Form::select('pay',['Prepaid', 'Collect'], null,['class'=>'form-control'])!!}
            </div>
        </div>
        <h4>Origin</h4>
        <div class="form-group">
            <div class="col-md-5 col-sm-12">
                <label for="place_of_receipt_lbl" class="input-control">Place of receipt*:</label>
                {!!Form::text('place_of_receipt',null,['class'=>'form-control'])!!}
            </div>
            <div class="col-md-5 col-md-offset-2 col-sm-12">
                <label for="pol_lbl" class="input-control">POL*:</label>
                {!!Form::text('pol',null,['class'=>'form-control'])!!}
            </div>
        </div>
        <h4>Destination</h4>
        <div class="form-group">
            <div class="col-md-5 col-sm-12">
                <label for="pod_lbl" class="input-control">POD*:</label>
                {!!Form::text('pod',null,['class'=>'form-control'])!!}
            </div>
            <div class="col-md-5 col-md-offset-2 col-sm-12">
                <label for="final_destination_lbl" class="input-control">Final destination*:</label>
                {!!Form::text('final_destination',null,['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5 col-sm-12">
                <label for="po_number_lbl" class="input-control">PO Number*:</label>
                {!!Form::text('po_number',null,['class'=>'form-control'])!!}
            </div>
        </div>
        <div id="fcl">
            <h4>FCL</h4>
            <div class="form-group">
                <div class="col-md-3 col-sm-6">
                    <label for="20_lbl" class="input-control">20&#039*:</label>
                    {!!Form::text('20',null,['class'=>'form-control'])!!}
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="40_lbl" class="input-control">40&#039*:</label>
                    {!!Form::text('40',null,['class'=>'form-control'])!!}
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="40HC_lbl" class="input-control">40 HC&#039*:</label>
                    {!!Form::text('40HC',null,['class'=>'form-control'])!!}
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="type_of_container_lbl" class="input-control">Type of container*:</label>
                    {!!Form::select('type_of_container', [1,2], null, ['class'=>'form-control'])!!}
                </div>
            </div>
        </div> {{--#fcl--}}
        <div id="lcl" style="display: none;">
            <h4>LCL</h4>
            <div class="form-group">
               <div class="col-md-4 col-ms-12">
                   <label for="lcl_package_lbl" class="input-control">Package*:</label>
                   {!! Form::text('lcl_package', null, ['class' => 'form-control']) !!}
               </div>
                <div class="col-md-4 col-sm-12">
                    <label for="lcl_weight_lbl" class="input-control">Weight*:</label>
                    {!! Form::text('lcl_weight', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-4 col-sm-12">
                    <label for="lcl_cbm_lbl" class="input-control">CBM*:</label>
                    {!! Form::text('lcl_cbm', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div> {{--#fcl--}}
    <div class="form-group">
            <div class="col-md-3 col-sm-6">
                <label for="cargo_ready_lbl" class="input-control">Cargo Ready:</label>
                {!!Form::date('cargo_ready', \Carbon\Carbon::now() ,['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5 col-sm-12">
                <label for="incoterm_lbl" class="input-control">Incoterm*:</label>
                {!!Form::select('incoterm', [1, 2], null, ['class'=>'form-control'])!!}
            </div>
        </div>

        <h2>Schedule Options</h2>
        <div class="well">
            <h4>Equipment</h4>
            <div class="form-group">
                <div class="col-md-3 col-sm-6">
                    <label for="carrier_lbl" class="input-control">Carrier*:</label>
                    {!!Form::select('carrier',[1,2], null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="vessel_lbl" class="input-control">Vessel*:</label>
                    {!!Form::text('vessel',null,['class'=>'form-control'])!!}
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="voyage_lbl" class="input-control">Voyage*:</label>
                    {!!Form::text('voyage',null,['class'=>'form-control'])!!}
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="etd_lbl" class="input-control">ETD*:</label>
                    {!!Form::date('etd',null,['class'=>'form-control'])!!}
                </div>
            </div>{{--div.form-group--}}
            <div class="form-group">
                <div class="col-md-3 col-sm-6">
                    <label for="departures_lbl" class="input-control">Departures*:</label>
                    {!!Form::select('departures',['Monday','Tuesday', 'etc'], null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="eta_lbl" class="input-control">ETA*:</label>
                    {!!Form::date('eta',null,['class'=>'form-control'])!!}
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="ams_closing_lbl" class="input-control">AMS Closing*:</label>
                    {!!Form::date('ams_closing',null,['class'=>'form-control'])!!}
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="cy_closing_lbl" class="input-control">CY Closing*:</label>
                    {!!Form::date('cy_closing',null,['class'=>'form-control'])!!}
                </div>
            </div>{{--div.form-group--}}
            <div id="fcl">
                <h4>Shipment cost</h4>
                <div class="form-group">
                    <div class="col-md-3 col-sm-6">
                        <label for="20_lbl" class="input-control">20&#039*:</label>
                        {!!Form::text('20_sc',null,['class'=>'form-control'])!!}
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="40_lbl" class="input-control">40&#039*:</label>
                        {!!Form::text('40_sc',null,['class'=>'form-control'])!!}
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="40HC_lbl" class="input-control">40 HC&#039*:</label>
                        {!!Form::text('40HC_sc',null,['class'=>'form-control'])!!}
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="other_lbl" class="input-control">Other:</label>
                        {!!Form::text('other_sc',null,['class'=>'form-control'])!!}
                    </div>
                </div>{{--div.form-group--}}
            </div>
            <h4>Inland cost</h4>
            <div class="form-group">
                <div class="col-md-3 col-sm-6">
                    <label for="20_lbl" class="input-control">20&#039*:</label>
                    {!!Form::text('20_ic',null,['class'=>'form-control'])!!}
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="40_lbl" class="input-control">40&#039*:</label>
                    {!!Form::text('40_ic',null,['class'=>'form-control'])!!}
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="40HC_lbl" class="input-control">40 HC&#039*:</label>
                    {!!Form::text('40HC_ic',null,['class'=>'form-control'])!!}
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="other_lbl" class="input-control">Other:</label>
                    {!!Form::text('other_ic',null,['class'=>'form-control'])!!}
                </div>
            </div>{{--div.form-group--}}
            <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add</a><br><br>
        </div>{{--div.well--}}

    <br>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
    <a href="{{ url()->previous() }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
    {!! Form::close() !!}

    @include('shipments.partials.script')
@endsection
