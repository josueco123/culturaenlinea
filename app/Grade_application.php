<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade_application extends Model
{
  protected $table = 'grade_applications';

  protected $fillable = [
      'id',
      'score',
      'comment',
      'recommend',
  ];

  // Consulta todos campos sugún el formulario
  public function grade_criteria()
  {
      return $this->hasMany(Grade_criteria::class, 'grade_application_id');
  }

  // Consulta todos campos sugún el formulario
  public function user()
  {
      return $this->belongsTo(User::class, 'user_id');
  }
}
