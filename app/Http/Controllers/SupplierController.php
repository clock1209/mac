<?php

namespace App\Http\Controllers;

use App\AdditionalCharge;
use App\BankAccount;
use App\Concepts;
use App\Country;
use App\Supplier;
use App\SupplierContact;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class SupplierController extends Controller
{
    protected $ba_type = [
        null         => '',
        'Co Loader'         => 'Co Loader',
        'Carrier'           => 'Carrier',
        'Custom Broker'     => 'Custom Broker',
        'Truck Service'     => 'Truck Service',
        'Werehouse'         => 'Werehouse',
        'Port terminal'     => 'Port terminal',
        'Insurence company' => 'Insurence company',
        'Agent'             => 'Agent'
    ];

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
        return view('suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $supplier = new Supplier();
        $supplier->clearOptionalDatatables();
        $area_codes = [null => ' '];
        $area_codes = array_merge($area_codes, Country::pluck('area_code', 'code')->toArray());
        $concepts = [null=> ''];
        $concepts = array_merge($concepts, Concepts::orderBy('name','asc')->
            pluck('name', 'name')->toArray());
        $array = [];
        foreach ($area_codes as $code => $area_code) {
            $array = array_merge($array, ['_'.$area_code => $code . ' +' . $area_code]);
        }
        return view('suppliers.create',
            [
                'types'         => $this->ba_type,
                'concepts'      => $concepts,
                'area_codes'    => $array
            ]);
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

        $supplier = Supplier::create($request->all());
        $supplier->assignBankAccounts($supplier->id);
        $supplier->assignAdditionalCharges($supplier->id);
        $supplier->assignContacts($supplier->id);

        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Supplier created successfully.'
        ];

        return redirect('suppliers')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Supplier $supplier)
    {
        $concepts = [null=> ''];
        $concepts = array_merge($concepts, Concepts::pluck('name', 'name')->toArray());
        $area_codes = Country::pluck('area_code', 'code')->toArray();
        $array = [];
        foreach ($area_codes as $code => $area_code) {
            $array = array_merge($array, ['_'.$area_code => $code . ' +' . $area_code]);
        }
        $data = [
            'concepts'  => $concepts,
            'supplier'  => $supplier,
            'types'     => $this->ba_type,
            'area_codes' => $array,
        ];
        return view('suppliers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request, $this->rules());

        $supplier->fill($request->all());
        $supplier->save();

        $msg = [
            'title' => 'Edited!',
            'type' => 'success',
            'text' => 'Supplier edited successfully.'
        ];

        return redirect('suppliers')->with('message', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }

    /*
     * Changes supplier status
     */
    public function supplierStatus(Supplier $supplier)
    {
        $supplier->status = ($supplier->status == 1) ? 0 : 1;
        $supplier->save();

        $msg = [
            'title' => 'Deleted!',
            'type' => 'success',
            'text' => 'Supplier deleted successfully.'
        ];

        return response()->json($msg);
    }

    /*
     * by: Octavio Cornejo
     * Creates datatable
     */
    public function toDatatable()
    {
        $suppliers = Supplier::where('status', 1)->where('id', '!=', 1)->get();
        return Datatables::of($suppliers)
            ->addColumn('actions', function ($supplier) {
                return view('suppliers.partials.buttons', ['supplier' => $supplier]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules()
    {
        return [
            'abbreviation' => 'nullable|min:2|regex:/^[\pL\s\-0-9]+$/u',
            'name' => 'required|min:2|regex:/^[\pL\s\-]+$/u',
            'type' =>'required|nullable'
        ];
    }
}
