<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade_criteria extends Model
{
  protected $table = 'grade_criterias';

  protected $fillable = [
      'id',
      'score',
      'comment',
  ];
}
