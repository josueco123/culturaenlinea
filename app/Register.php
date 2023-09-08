<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'registers';

    protected $fillable = [
      'application_id',
      'form_id',
      'field_id',
      'data'
  ];
  
  public function field()
  {
      return $this->belongsTo(Field::class, 'field_id');
  }
}
