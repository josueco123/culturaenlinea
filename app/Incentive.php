<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incentive extends Model
{

	use SoftDeletes;
    
    protected $table = 'incentives';

    protected $fillable = [
        'id',
        'call_id',
        'type_id',
        'name',
        'slug',
        'code',
        'start_at',
        'finish_at',
        'line_id',
        'value',
        'quantity',
        'area_id',
        'execution_start',
        'execution_finish',
        'method',
        'contact',
        'description',
		'information'
    ];

    // Consulta el área del estímulo
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    // Consulta el tipo de estímulo
    public function type()
    {
        return $this->belongsTo(Incentive_type::class, 'type_id');
    }

    // Consulta el tipo de estímulo
    public function line_action()
    {
        return $this->belongsTo(Line_action::class, 'line_id');
    }

    // Consulta todas los tipos de usuarios del estímulo
    public function user_types()
    {
        return $this->belongsToMany(User_type::class, 'incentive_user_type', 'incentive_id', 'user_type_id');
    }

    // Consulta todas las convocatorias del estímulo
    public function call()
    {
        return $this->belongsTo(Call::class, 'call_id');
    }

    // Consulta todos los campos de formulario del estímulo
    public function fields()
    {
        return $this->belongsToMany(Field::class, 'incentive_field', 'incentive_id', 'field_id');
    }

    // Consulta todos los criterios del estimulo
    public function criteria()
    {
    return $this->hasMany(Criteria::class, 'incentive_id');
    }
}
