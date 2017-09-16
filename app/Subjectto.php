<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjectto extends Model
{
  protected $table = 'subjectto';

  protected $fillable = [
      'name',
      'concept_id',
      'cost'
  ];

}
