<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'abbreviation',
        'type',
        'name',
    ];

    public function bankAccount()
    {
        return $this->hasMany("App\BankAccount");
    }

    public function additionalCharge()
    {
        return $this->hasMany('App\AdditionalCharge');
    }

    public function contact()
    {
        return $this->hasMany('App\SupplierContact');
    }

    public function assignBankAccounts($supplier_id)
    {
        $bankAccounts = BankAccount::where('supplier_id', 1)->get();
        foreach ($bankAccounts as $bankAccount) {
            $bankAccount->supplier_id = $supplier_id;
            $bankAccount->save();
        }
    }

    public function assignAdditionalCharges($supplier_id)
    {
        $additionalCharges = AdditionalCharge::where('supplier_id', 1)->get();
        foreach ($additionalCharges as $additionalCharge) {
            $additionalCharge->supplier_id = $supplier_id;
            $additionalCharge->save();
        }
    }

    public function assignContacts($supplier_id)
    {
        $supplierContacts = SupplierContact::where('supplier_id', 1)->get();
        foreach ($supplierContacts as $supplierContact) {
            $supplierContact->supplier_id = $supplier_id;
            $supplierContact->save();
        }
    }

    public function clearOptionalDatatables()
    {
        AdditionalCharge::where('supplier_id', 1)->delete();
        BankAccount::where('supplier_id', 1)->delete();
        SupplierContact::where('supplier_id', 1)->delete();
    }

    public function customDocs()
    {
        return $this->hasMany(DocSuppliers::class,'supplier_id','id');
    }
}
