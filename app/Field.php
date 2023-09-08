<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'fields';

    protected $fillable = [
        'id',
        'form_id',
        'label',
        'slug',
        'type',
        'name',
        'description',
        'placeholder',
        'options',
        'required',
        'order',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id');
    }

    // Consulta todos los incentivos del campo de formulario
    public function incentives()
    {
        return $this->belongsToMany(Incentive::class, 'incentive_field', 'field_id', 'incentive_id');
    }

}
