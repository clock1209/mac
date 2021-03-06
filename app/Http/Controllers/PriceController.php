<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;
use Yajra\Datatables\Facades\Datatables;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if ($request->ajax()) {
          return $this->toDatatable();
      }
      return view('prices.index');
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
        Price::create($request->all());

        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Price created successfully.'
        ];

        return redirect('prices')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy(Request $request)
    {
        if($request->type==2){
            $price = Price::findOrFail($request->id);
            $price->status = 2;

            $msg = [
                'title' => 'Delete!',
                'type' => 'success',
                'text' => 'Price delete'
            ];

        }else {
            $price = Price::findOrFail($request->id);
            $price->status = ($price->status == 1) ? 0 : 1;

            $msg = [
                'title' => 'Change!',
                'type' => 'success',
                'text' => ($price->status == 1) ? 'Price activated.' : 'Price deactivated.'
            ];
        }

        $price->save();

        return response()->json($msg);
    }

    public function toDatatable()
    {
        $prices = Price::where('status', '<>', 2)->get();
        return Datatables::of($prices)
            ->addColumn('actions', function ($prices) {
                return view('prices.partials.buttons', ['port' => $prices]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules()
    {
        return [
            'name' => 'required|alpha_spaces',
        ];
    }
}
