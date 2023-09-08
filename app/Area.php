<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{

	use SoftDeletes;
    
    protected $table = 'areas';

    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    // Consulta todos los incentivos según el área
    public function incentives()
    {
        return $this->hasMany(Incentive::class, 'area_id');
    }
}
