<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field_type extends Model
{
    protected $table = 'field_types';

    protected $fillable = [
        'id',
        'name',
    ];
}
