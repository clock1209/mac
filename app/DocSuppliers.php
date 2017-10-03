<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocSuppliers extends Model
{
  protected $table = 'docs_supplier';

  protected $fillable = [

      'name',
      'reference_number',
      'bill',
      'bank_account',
      'concept_id',
      'cost',
  ];
}
