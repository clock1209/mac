<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConceptsBill extends Model
{
    protected $table = 'concepts_bill';

    protected $fillable = [
        'docs_supplier_id',
        'concept_id',
    ];

    public function getconceptsname()
    {
        return $this->hasOne('App\Concepts');
    }
}
