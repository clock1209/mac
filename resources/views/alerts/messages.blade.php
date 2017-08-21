@if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        <div class="text-center">
            <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br>
        </div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="alert alert-danger alert-dismissible hidden" role="alert" id="customAlert">
    <button type="button" class="close" ><span>&times;</span></button>
    <div class="text-center">
        <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br>
    </div>
    <ul id="errorsList">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>