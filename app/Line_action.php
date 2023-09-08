<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Line_action extends Model
{

	use SoftDeletes;
    
    protected $table = 'lines_action';

    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    // Consulta todos los incentivos según la línea de acción
    public function incentives()
    {
        return $this->hasMany(Incentive::class, 'line_id');
    }
}
