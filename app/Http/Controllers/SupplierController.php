<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Supplier;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class SupplierController extends Controller
{
    protected $ba_type = [
        'Co Loader',
        'Carrier',
        'Custom Broker',
        'Truck Service',
        'Werehouse',
        'Port terminal',
        'Insurence company',
        'Agent'
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
        if ($request->ajax()) {
            return $this->toBankAccountDatatable();
        }
        return view('suppliers.create', ['types' => $this->ba_type]);
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

        Supplier::create($request->all());

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
    public function edit(Supplier $supplier)
    {
        //
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
        //
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
     * by: Octavio Cornejo
     * Creates datatable
     */
    public function toDatatable()
    {
        $suppliers = Supplier::where('status', 1)->get();
        return Datatables::of($suppliers)
            ->addColumn('actions', function ($supplier) {
                return view('suppliers.partials.buttons', ['supplier' => $supplier]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /*
     * by: Octavio Cornejo
     * Creates bankAccount datatable
     */
    public function toBankAccountDatatable()
    {
        $bankAccounts = BankAccount::with('supplier')->where('id', 1)->get();
        return Datatables::of($bankAccounts)
            ->addColumn('actions', function ($bankAccount) {
                return view('bankAccounts.partials.buttons', ['bankAccount' => $bankAccount]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules()
    {
        return [
            'abbreviation' => 'required',
            'type' => 'required',
            'name' => 'required'
        ];
    }
}
