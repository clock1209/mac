<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrier;
use Yajra\Datatables\Facades\Datatables;

class CarrierController extends Controller
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

      return view('carriers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carriers.create');
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
          $carrier = new Carrier;
          $carrier->abbreviation = $request->abbreviation;
          $carrier->name = $request->name;
          $carrier->save();

          $msg = [
              'title' => 'Created!',
              'type' => 'success',
              'text' => 'Carrier created successfully.'
          ];

          return redirect('/carriers')->with('message', $msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrier $carrier)
    {
      return view('carriers.edit', ['carriers' => $carrier]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrier $carrier)
    {

      $request->flash();
      $this->validate($request, $this->rules());


      $carrier->update([
        'abbreviation' => $request['abbreviation'],
        'name' => $request['name'],
    ]);

      $msg = [
          'title' => 'Edited!',
          'type' => 'success',
          'text' => 'Carrier edited successfully.'
      ];

      return redirect('carriers')->with('message', $msg);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrier $carrier)
    {
      if ($carrier) {
          $status = $carrier->status ? 0 : 1;

          if($status) {
              $msg = [
                  'title' => 'Activated!',
                  'type' => 'success',
                  'text' => 'Carrier activaded successfully.'
              ];
          } else {
              $msg = [
                  'title' => 'Deleted!',
                  'type' => 'success',
                  'text' => 'Carrier deleted successfully.'
              ];
          }

          $carrier->status = $status;
          $carrier->save();

          return response()->json($msg);
      }
      return abort(404);

    }

    private function rules()
    {
        return [
            'abbreviation' => 'required',
            'name'    => 'required',
        ];
    }

    public function toDatatable()
    {
        $carrier = Carrier::where('status', 1)->get();
        return Datatables::of($carrier)
            ->addColumn('actions', function ($carrier) {
                return view('carriers.partials.buttons', ['carrier' => $carrier]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
