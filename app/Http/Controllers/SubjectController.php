<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Remark;
use App\Subject;
use App\Concepts;
use App\PortName;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $value = $request->session()->get('carrier_id');
        if($request->ajax())
            session()->put('tab', 2);
            return $this->toDatatable($value);

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
        $value = $request->session()->get('carrier_id');
        $subject =Subject::create($request->all());
        $subject->carrier_id = $value;
        $subject->save();

        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Subject created successfully.'
        ];

        return redirect('/remarks?id='.$value)->with(['tab' => 2,'message'=> $msg,'overweight' => 1,'concepts'=>0,'subject'=>0,'inlands'=>0]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        $subject->status = ($subject->status == 1) ? 0 : 1;
        $subject->save();

        $msg = [
            'title' => 'Deleted!',
            'type' => 'success',
            'text' => 'Subject deleted successfully.'
        ];

        return response()->json($msg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $concepts = Concepts::orderBy('name','ASC')->where('status',1)->pluck('name', 'id');
        $ports = [0 => ' '];
        $ports = array_merge($ports, PortName::pluck('name', 'id')->toArray());
        return view('remarks.index',['tab'=> 2,'overweight' => 0,'subject' => $subject,
        'concepts' => $concepts,'inlands' => 0,'port' => $ports,'idCarrier'=> $subject->carrier_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $this->validate($request, $this->rules());
        $subject->fill($request->all());
        $subject->save();

        $msg = [
            'title' => 'Edited!',
            'type' => 'success',
            'text' => 'Subject edited successfully.'
        ];
        return redirect('/remarks?id='.$subject->carrier_id)->with(['tab'=> 2,'message'=> $msg,'overweight' => 0,
            'concepts'=>0,'subject'=>$subject,'inlands'=>0]);
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

    public function toDatatable($id)
    {

        $subject = DB::table('subjectto')
            ->select('subjectto.id','subjectto.cost','subjectto.status', 'subjectto.currency', 'concepts.name')
            ->join('concepts', 'concepts.id', '=', 'subjectto.concept_id')
            ->where('subjectto.status',1)->where('subjectto.carrier_id',$id)->get();
        return Datatables::of($subject)
            ->addColumn('actions', function ($subject) {
                return view('subject.partials.buttons', ['subject' => $subject]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules()
    {
        return [
            'concept_id' => 'required|not_in:0',
            'cost' => 'required|regex:/^\d*(\.\d{2})?$/|max:999999.99|numeric|',
            'currency' => 'required',
        ];
    }

}
