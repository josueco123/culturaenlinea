<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    protected $table = 'user_types';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'description'
    ];

    public function call()
    {
        return $this->belongsTo(Call::class, 'call_id');
    }

    // Consulta todas los estímulos del typo de usuario
    public function incentives()
    {
        return $this->belongsToMany(Incentive::class, 'incentive_user_type', 'user_type_id', 'incentive_id');
    }

    // Consulta todos los formularios del tipo de usuario
    public function forms()
    {
        return $this->belongsToMany(Form::class, 'form_user_type', 'user_type_id', 'form_id');
    }
}
