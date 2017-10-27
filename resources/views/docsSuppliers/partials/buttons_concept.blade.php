@foreach ($concepts as $concept)
    <a doc_id="{{ $concept->id }}" class="primary"><span class=""></span> {{ $concept->name }}</a>, 
@endforeach
