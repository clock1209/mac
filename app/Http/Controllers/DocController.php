<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Storage;
use Session;
use View;
use App\Doc;
use App\Customer;
use File;
use Illuminate\Support\Facades\Input;

class DocController extends Controller
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

          if($request->ajax()) {
              return $this->toDatatable($request->id);
          }

          return view('docs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $path = $request->file('doc')->store($request->customer_id);
        $doc = new Doc;
        $doc->fill($request->all());
        $doc->doc = $path;
        $doc->save();

        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Doc created successfully.'
        ];


        return redirect()->route('docs.index',['id'=>$request->customer_id])->with('message', $msg);
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

        return redirect()->route('docs.index',['id'=>$doc->customer_id])->with('message', $msg);
    }

    public function DocView($id, Request $request) {

        $doc = Doc::find($id);
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

            if($content_types==null)
                $msg = [
                    'title' => 'Error!',
                    'type' => 'error',
                    'text' => 'can not view file, try to download file'
                ];
                return redirect()->route('docs.index',['id'=>$doc->customer_id])->with('message', $msg);

            return response()->file(storage_path('/signature/').$doc->doc, [
                'Content-Type' => $content_types
            ]);
        }

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

        return redirect()->route('docs.index',['id'=>$doc->customer_id])->with('message', $msg);
    }

    public function toDatatable($id)
    {

        $docs = Customer::find($id)->customDocs()->where('status', 1)->get();

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
            'doc'    => 'required|max:5000',
        ];
    }

}
