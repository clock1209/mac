<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\SupplierContact;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class SupplierContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->toDatatable($request->supplier_id);
        }
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
        $this->validate($request, $this->rules(), $this->ruleMessages());

        $data = $request->all();
        $areacode = str_replace('_', '', $data['area_code']);
        $data['phone'] = $areacode . ' ' . $data['phone'];
        SupplierContact::create($data);

        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Additional charge created successfully.'
        ];

        return response()->json($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupplierContact  $supplierContact
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierContact $supplierContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupplierContact  $supplierContact
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierContact $supplierContact)
    {
        list($areacode, $phone) = explode(' ', $supplierContact->phone);
        $areacode = '_' . $areacode;
        return response()->json([$supplierContact, $areacode, $phone]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupplierContact  $supplierContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupplierContact $supplierContact)
    {
        $this->validate($request, $this->rules(), $this->ruleMessages());

        $data = $request->all();
        $areacode = str_replace('_', '', $data['area_code']);
        $data['phone'] = $areacode . ' ' . $data['phone'];
        $supplierContact->fill($data);
        $supplierContact->save();

        $msg = [
            'title' => 'Edited!',
            'type' => 'success',
            'text' => 'Contact edited successfully.'
        ];

        return response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupplierContact  $supplierContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplierContact $supplierContact)
    {
        //
    }

    /*
     * Changes supplierContact status
     */
    public function supplierContactStatus(SupplierContact $supplierContact)
    {
        $supplierContact->status = ($supplierContact->status == 1) ? 0 : 1;
        $supplierContact->save();

        $msg = [
            'title' => 'Deleted!',
            'type' => 'success',
            'text' => 'Contact deleted successfully.'
        ];

        return response()->json($msg);
    }

    /*
     * by: Octavio Cornejo
     * Creates datatable
     */
    public function toDatatable($id)
    {
        $contacts = SupplierContact::where('supplier_id', $id)->where('status', 1)->get();
        return Datatables::of($contacts)
            ->addColumn('actions', function ($contact) {
                return view('supplierContacts.partials.buttons', ['contact' => $contact]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules()
    {
        return [
            'select_an_area' => 'required|min:2|regex:/^[\pL\s\-]+$/u',
            'name' => 'required|min:2|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'phone' => 'nullable|numeric'
        ];
    }

    private function ruleMessages()
    {
        return [
            'numeric' => 'The phone must be 10 numbers long'
        ];
    }
}
