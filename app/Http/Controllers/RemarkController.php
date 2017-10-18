<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Remark;
use App\Concepts;
use App\PortName;
use Yajra\Datatables\Datatables;

class RemarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        session(['carrier_id' => $request->id]);
        $ports = [0 => ' '];
        $ports = array_merge($ports, PortName::pluck('name', 'id')->toArray());

        $concepts = [0 => ' '];
        $concepts = array_merge($concepts, Concepts::orderby('name','ASC')->where('status',1)->pluck('name', 'id')->toArray());

        if ($request->ajax())
            return $this->toDatatable($request->id);

            return view('remarks.index',['tab' => $request->session()->get('tab'),'overweight' => 0,
                'concepts' => $concepts,'subject' => 0,'inlands' => 0,'port'=>$ports,'idCarrier'=> $request->id]);
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
        session()->put('tab', 0);
        $this->validate($request, $this->rules());
        $remark = new Remark($request->all());
        $remark->save();
        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Remark created successfully.'
        ];


        return redirect()->route('remarks.redirect',['id'=>$request->carrier_id])->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Remark $remark)
    {
        return response()->json($remark);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Remark $remark)
    {
        $this->validate($request, $this->rules());
        $remark->fill($request->all());
        $remark->save();

        $msg = [
            'title' => 'Edited!',
            'type' => 'success',
            'text' => 'Note edited successfully.'
        ];

        return response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Remark::find($id);
        $note->status = 0;
        $note->save();

        $msg = [
            'title' => 'Delete!',
            'type' => 'success',
            'text' => 'Note deleted successfully.'
        ];

        return response()->json($msg);
    }

    private function rules()
    {
        return [
            'note' => 'required'
        ];
    }

    public function toDatatable($id)
    {
        $note = Remark::where('carrier_id', $id)->where('status', 1)->get();
        return Datatables::of($note)
            ->addColumn('actions', function ($note) {
                return view('remarks.partials.buttons', ['note' => $note]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
