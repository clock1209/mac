<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Storage;
use App\Doc;
use File;
use Illuminate\Support\Facades\Input;

class DocController extends Controller
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
            return $this->toDatatable();
        }

        return view('docs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $doc = new Doc;
        $doc->name = $request->name;
        $doc->doc = storage_path("docs/".$request->name."/".$request->name.".".$extension);
        $doc->save();

         $msg = [
             'title' => 'Created!',
             'type' => 'success',
             'text' => 'Doc created successfully.'
         ];

         return redirect('docs')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $doc  = Doc::find($id);
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

        $doc = Doc::find($id);
        File::delete($doc->doc);
        $doc->status = 0;
        $doc->name = $doc->name."_del";
        $doc->save();


        $msg = [
            'title' => 'Delete!',
            'type' => 'success',
            'text' => 'Doc deleted successfully.'
        ];

        return redirect('docs')->with('message', $msg);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function toDatatable()
    {
        $docs = Doc::where('status', 1)->get();
        return Datatables::of($docs)
            ->addColumn('actions', function ($docs) {
                return view('docs.partials.buttons', ['docs' => $docs]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules()
    {
        return [
            'name' => 'required|unique:docs,name',
            'doc'    => 'required|mimes:pdf,doc,docx|max:5000',
        ];
    }
}
