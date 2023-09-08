<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'forms';

    protected $fillable = [
        'id',
        'name',
        'description',
        'order'
    ];

    // Consulta todos campos sugún el formulario
    public function fields()
    {
        return $this->hasMany(Field::class, 'form_id');
    }

    // Consulta todas los tipos de usuarios del formulario
    public function user_types()
    {
        return $this->belongsToMany(User_type::class, 'form_user_type', 'form_id', 'user_type_id');
    }
}
