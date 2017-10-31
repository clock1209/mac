<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RemarkCondition;
use Yajra\Datatables\Datatables;

class RemarkConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax())
            return $this->toDatatable($request->id);
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
        $remark = new RemarkCondition($request->all());
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
    public function show($id)
    {
        $remarkcondition = RemarkCondition::find($id);
        return response()->json($remarkcondition);
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
    public function update(Request $request,$id)
    {
        $this->validate($request, $this->rules());
        $RemarkCondition = RemarkCondition::find($id);
        $RemarkCondition->fill($request->all());
        $RemarkCondition->save();

        $msg = [
            'title' => 'Edited!',
            'type' => 'success',
            'text' => 'Condition edited successfully.'
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
        $condition = RemarkCondition::find($id);
        $condition->status = 0;
        $condition->save();

        $msg = [
            'title' => 'Delete!',
            'type' => 'success',
            'text' => 'Condition deleted successfully.'
        ];

        return response()->json($msg);
    }

    private function rules()
    {
        return [
            'free_demurrage' => 'required',
            'price_day' => 'required|regex:/^\d*(\.\d{2})?$/|max:999999.99|numeric',
            //'type_demurrage' => 'required',
        ];
    }

    public function toDatatable($id)
    {
        $condition = RemarkCondition::where('carrier_id', $id)->where('status', 1)->get();
        return Datatables::of($condition)
            ->addColumn('actions', function ($condition) {
                return view('remarks.partials.buttons_conditions', ['condition' => $condition]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
