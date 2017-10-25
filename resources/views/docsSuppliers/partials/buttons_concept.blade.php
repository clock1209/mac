@foreach ($concepts as $concept)
    <a doc_id="{{ $concept->id }}" class="btn btn-primary"><span class="fa fa-money"></span> {{ $concept->name }}</a>
@endforeach
