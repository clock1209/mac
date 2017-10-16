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
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

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
        $concepts = [0 => ' '];
        $concepts = array_merge($concepts, Concepts::pluck('name', 'id')->toArray());

        return view('docsSuppliers.index',['docssupplier' => null,'concepts' => $concepts,'tab'=> $request->session()->get('tab'),'supplier_id'=>$request->id]);
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
        if($request->name_reference)
        {
            Session::put('tab', 0);
            $this->validate($request, $this->rules_reference());
            $extension = Input::file('doc_reference')->getClientOriginalExtension();
            $path = Storage::putFile($request->name_reference, $request->file('doc_reference'));
            Storage::move($path, $request->name_reference."/".$request->file('doc_reference')->getClientOriginalName());
            $doc =DocSuppliers::create([
                'name'=> $request->name_reference,
                'reference_number' =>0,
                'cost' => 0,
            ]);
            $doc->name = $request->file('doc_reference')->getClientOriginalName();
            $doc->supplier_id = $request->supplier_id;
            $doc->doc = "signature/".$request->name_reference."/".$request->file('doc_reference')->getClientOriginalName();
            $id=$doc->save();

        }
        else {

            Session::put('tab', 1);
            $this->validate($request, $this->rules());
            $extension = Input::file('doc')->getClientOriginalExtension();
            $path = Storage::putFile($request->name, $request->file('doc'));
            Storage::move($path, $request->name."/".$request->file('doc')->getClientOriginalName());
            $doc =DocSuppliers::create($request->all());
            $doc->name = $request->file('doc')->getClientOriginalName();
            $doc->supplier_id = $request->supplier_id;
            $doc->doc = "signature/".$request->name."/".$request->file('doc')->getClientOriginalName();
            $id=$doc->save();
        }
        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Doc Supplier created successfully.'
        ];

       return redirect('/docssupplier?id='.$request->supplier_id)->with(['message'=> $msg,'tab'=>$request->session()->get('tab')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function DocView($id, Request $request) {
        $doc = DocSuppliers::find($id);
        $ext = File::extension($doc->doc);
        if ($ext == 'pdf') {
            $content_types = 'application/pdf';
        }
         elseif($ext == 'doc') {
            $content_types = 'application/msword';
        }
        elseif($ext == 'docx') {
            $content_types = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
        }
        elseif($ext == 'xls') {
            $content_types = 'application/vnd.ms-excel';
        }
        elseif($ext == 'xlsx') {
            $content_types = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
        }
        elseif($ext == 'jpg') {
            $content_types = 'image/jpg';
        }
        elseif($ext == 'jpeg') {
            $content_types = 'image/jpeg';
        }
        elseif($ext == 'png') {
            $content_types = 'image/png';
        }
         if($ext == 'doc' || $ext == 'docx' || $ext == 'xls' || $ext == 'xlsx' ){
             $url='https://view.officeapps.live.com/op/view.aspx?src='.
                 'http://maritimo.nuvem.mx'.$doc->doc;
             return Redirect::to($url);
         }
         else {
             return response()->file(storage_path($doc->doc), [
                 'Content-Type' => $content_types,
                 'target' => '_blank'
             ]);
         }

    }

    public function show($id)
    {
        $doc  = DocSuppliers::find($id);
        return response()->download(storage_path($doc->doc));
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

        return response()->json($msg);

    }

    public function toDatatable($id)
    {
        $docs = DB::table('docs_supplier')
            ->join('concepts', 'concepts.id', '=', 'docs_supplier.concept_id')
            ->select('docs_supplier.id','docs_supplier.name','reference_number','bill',
            'bank_account','concepts.name as concepts','cost','doc',
            'supplier_id','docs_supplier.status')->where('supplier_id',$id)
            ->where('docs_supplier.status',1)->whereNotNull('bill')->get();
        return Datatables::of($docs)
            ->addColumn('actions', function ($docs) {
                return view('docsSuppliers.partials.buttons', ['docs' => $docs]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function supplierTableFilter($id)
    {

        $docs = Supplier::find($id)->customDocs()->where('status', 1)->whereNull('bill')->get();
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
            'doc'    => 'required|max:10000',
            'cost' => 'required|regex:/^\d*(\.\d{2})?$/|max:999999.99|numeric|',
        ];
    }

    private function rules_reference()
    {
        return [
            'name_reference' => 'required',
            'doc_reference'    => 'required|max:10000',
        ];
    }
}
