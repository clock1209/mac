<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Storage;
use App\DocSuppliers;
use App\Supplier;
use App\Concepts;
use App\BankAccount;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\ConceptsBill;


class DocSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $url='https://view.officeapps.live.com/op/view.aspx?src=http://maritimo.nuvem.mx/storage/signature/';

    public function index(Request $request)
    {

        if(!auth()->user())
        return abort(404);
        if ($request->ajax()) {
            session()->put('tab', 0);
            return $this->toDatatable($request->id);
        }

        $concepts = Concepts::where('status',1)->pluck('name', 'id')->toArray();
        $bank_account = BankAccount::where('status',1)->pluck('clabe', 'clabe')->toarray();

        return view('docsSuppliers.index',['docssupplier' => null,'concepts' => $concepts,
            'tab'=> $request->session()->get('tab'),'supplier_id'=>$request->id,'bank_account'=>$bank_account]);
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
            session()->put('tab', 0);
            $this->validate($request, $this->rules_reference());
            $path = $request->file('doc_reference')->store($request->supplier_id);
            $doc =DocSuppliers::create([
                'name'=> $request->name_reference,
                'reference_number' =>0,
                'cost' => 0,
            ]);

            $doc->fill($request->all());
            $doc->doc = $path;
            $doc->save();

        }
        else{

            session()->put('tab', 1);
            $this->validate($request, $this->rules());
            $path = $request->file('doc')->store($request->supplier_id);
            $doc =DocSuppliers::create($request->all());
            $doc->fill($request->all());
            $doc->doc = $path;
            $doc->name = $request->doc->getClientOriginalName();
            $doc->save();
            $dataSet = [];

            foreach ($request->concept_id as $concept) {
                array_push($dataSet, ['docs_supplier_id' => $doc->id, 'concept_id' => $concept]);
            }

            ConceptsBill::insert($dataSet);
        }

        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Doc Supplier created successfully.'
        ];

        return redirect()->route('docs-suppliers.index',['id'=>$request->supplier_id])->with(['message'=> $msg,'tab'=>$request->session()->get('tab')]);
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
        $content_types=null;
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
             return redirect($this->url.$doc->doc);
         }
         else{

             if($content_types==null){
                 $msg = [
                     'title' => 'Error!',
                     'type' => 'error',
                     'text' => 'can not view file, try to download file'
                 ];
                 return redirect()->route('docs-suppliers.index',['id'=>$doc->supplier_id])->with('message', $msg);
             }
             return response()->file(storage_path('signature/'.$doc->doc), [
                 'Content-Type' => $content_types
             ]);
         }

    }

    public function show($id)
    {
        $doc  = DocSuppliers::find($id);
        return response()->download(storage_path('signature/'.$doc->doc));
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

        return redirect()->route('docs-suppliers.index',['id'=>$doc->supplier_id])->with('message', $msg);
    }

    public function docSupplierBillConcepts(Request $request)
    {
        $data = DB::table('concepts_bill')
            ->join('concepts', 'concepts.id', '=', 'concepts_bill.concept_id')
                ->select('concepts_bill.id','concepts.name')->where('docs_supplier_id',$request->id)->get();
        return response()->json($data);
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
            ->select('docs_supplier.id','docs_supplier.name','reference_number','bill',
                'bank_account','cost','doc','supplier_id','docs_supplier.status')->where('supplier_id',$id)
                    ->where('docs_supplier.status',1)->whereNotNull('bill')->get();

        return Datatables::of($docs)
            ->addColumn('concepts', function ($docs) {

                $data = DB::table('concepts_bill')
                    ->join('concepts', 'concepts.id', '=', 'concepts_bill.concept_id')
                    ->select('concepts_bill.id','concepts.name')->where('docs_supplier_id',$docs->id)->get();

                    return view('docsSuppliers.partials.buttons_concept', ['concepts' => $data]);
            })
            ->addColumn('doc', function ($docs) {
                return view('docsSuppliers.partials.buttons_link', ['docs' => $docs]);
            })
            ->addColumn('actions', function ($docs) {
                return view('docsSuppliers.partials.buttons', ['docs' => $docs]);
            })
            ->rawColumns(['actions','concepts','doc'])
            ->make(true);
    }

    public function supplierTableFilter($id)
    {

        $docs = Supplier::find($id)->customDocs()->where('status', 1)->whereNull('bill')->get();
        return Datatables::of($docs)
            ->addColumn('actions', function ($docs) {
                return view('docsSuppliers.partials.buttons', ['docs' => $docs]);
            })
            ->addColumn('doc', function ($docs) {
                return view('docsSuppliers.partials.buttons_link', ['docs' => $docs]);
            })
            ->rawColumns(['actions','doc'])
            ->make(true);
    }

    private function rules()
    {
        return [
            'reference_number' => 'required|numeric|max:999999',
            'bill' => 'required|',
            'bank_account' => 'required|not_in:0',
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
