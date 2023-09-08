<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incentive_type extends Model
{
	use SoftDeletes;
    protected $table = 'incentive_types';

    protected $fillable = [
        'id',
        'name'
    ];

    // Consulta todos los incentivos según tipo
    public function incentives()
    {
        return $this->hasMany(Incentive::class, 'type_id');
    }
}
