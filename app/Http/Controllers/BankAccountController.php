<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Supplier;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        BankAccount::create($request->all());

        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Bank account created successfully.'
        ];

        return response()->json($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankAccount $bankAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccount $bankAccount)
    {
        //
    }
    /*
     * Changes bankAccount status
     */
    public function bankAccountStatus(BankAccount $bankAccount)
    {
        $bankAccount->status = ($bankAccount->status == 1) ? 0 : 1;
        $bankAccount->save();

        $msg = [
            'title' => 'Deleted!',
            'type' => 'success',
            'text' => 'Bank account deleted successfully.'
        ];

        return response()->json($msg);
    }


    private function rules()
    {
        return [
            'pay_of' => 'required',
            'account' => 'required|numeric',
            'bank' => 'required',
            'clabe' => 'required',
            'aba' => 'required|numeric',
            'swift' => 'required',
            'reference' => 'required',
            'currency' => 'required',
            'beneficiary' => 'required',
        ];
    }
}
