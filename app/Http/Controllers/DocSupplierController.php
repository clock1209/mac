<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Storage;
use App\DocSuppliers;
use App\Supplier;
use App\Concepts;
use File;
use Illuminate\Support\Facades\Input;

class DocSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      if(!auth()->user())
        return abort(404);
        if ($request->ajax()) {
            return $this->toDatatable($request->id);
        }
        $concepts = [0 => 'Select Concept'];
        $concepts = array_merge($concepts, Concepts::pluck('name', 'id')->toArray());

      return view('docsSuppliers.index',['docssupplier' => null,'concepts' => $concepts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, $this->rules());
      $extension = Input::file('doc')->getClientOriginalExtension();
      $path = Storage::putFile($request->name, $request->file('doc'));
      Storage::move($path, $request->name."/".$request->name.".".$extension);


      $doc =DocSuppliers::create($request->all());
      $doc->name = $request->name;
      $doc->supplier_id = $request->supplier_id;
      $doc->doc = storage_path("signature/".$request->name."/".$request->name.".".$extension);
      $id=$doc->save();
      //dd($id);
       $msg = [
           'title' => 'Created!',
           'type' => 'success',
           'text' => 'Doc Supplier created successfully.'
       ];

       return redirect('/docssupplier?id='.$request->supplier_id)->with('message', $msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $doc  = DocSuppliers::find($id);
      return response()->download($doc->doc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $doc = DocSuppliers::find($id);
      File::delete($doc->doc);
      $doc->status = 0;
      $doc->name = $doc->name."_del";
      $doc->save();

      $msg = [
          'title' => 'Delete!',
          'type' => 'success',
          'text' => 'Doc deleted successfully.'
      ];

      return redirect('/docssupplier?id='.$doc->supplier_id)->with('message', $msg);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function toDatatable($id)
    {

        $docs = Supplier::find($id)->customDocs()->where('status', 1)->get();
          return Datatables::of($docs)
            ->addColumn('actions', function ($docs) {
                return view('docsSuppliers.partials.buttons', ['docs' => $docs]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules()
    {
        return [
            'reference_number' => 'required|numeric',
            'bill' => 'required|',
            'bank_account' => 'required|',
            'concept_id' => 'required|not_in:0',
            'doc'    => 'required|max:10000|mimes:doc,docx',
        ];
    }
}
