<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
  protected $table = 'criterias';

  protected $fillable = [
      'id',
      'name',
      'description',      
  ];
}
