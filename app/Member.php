<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  protected $table = 'members';

  protected $fillable = [
      'id',
      'application_id',
      'first_name',
      'last_name',
      'sexo',
      'id_type',
      'id_number',
      'expedition_place',
      'birth_date',
      'age',
      'birth_country',
      'birth_state',
      'birth_city',
      'location_country',
      'location_state',
      'location_city',
      'area',
      'adress',
      'Comunity',
      'neighborhood',
      'cellphone_number',
      'phone_number'   ,
      'email'
  ];
}
