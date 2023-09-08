<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Call extends Model
{

	use SoftDeletes;
    
    protected $table = 'calls';

    protected $fillable = [
        'id',
        'name'
        // ...
    ];

    // Consulta todas los estímulos de la convocatoria
    public function incentives()
    {
        return $this->hasMany(Incentive::class, 'call_id');
    }
}
