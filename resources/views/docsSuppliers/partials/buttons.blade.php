<a href="{{ route('doc-view',['id'=>$docs->id]) }}" id="viewdoc" target="_blank" class="btn btn-success btn-sm"><span class="fa fa-file"></span> View</a>
<a doc_id="{{ $docs->id }}" class="btn btn-danger btn-sm delete-doc"><span class="fa fa-trash"></span> Delete</a>
