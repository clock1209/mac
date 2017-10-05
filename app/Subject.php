<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
  protected $table = 'subjectto';

  protected $fillable = [
      'name',
      'concept_id',
      'cost',
      'currency',
  ];

  public function concepts()
  {
    return $this->hasMany(Concepts::class,'concept_id','id');
  }

}
