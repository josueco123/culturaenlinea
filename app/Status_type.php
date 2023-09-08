<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status_type extends Model
{

	use SoftDeletes;
    
    protected $table = 'status_types';

    protected $fillable = [
        'id',
        'name',
        'description',        
        'color'
    ];

    // Consulta todas las aplicaciones según el estado
    public function applications()
    {
        return $this->hasMany(Application::class, 'status_id');
    }
}
