<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{

    use SoftDeletes;

    protected $table = 'applications';

    protected $fillable = [
        'id',
        'call_id',
        'incentives_id',
        'user_id',
        'user_type_id',
        'status_id'
    ];

    // Consulta la convocatoria de la aplicación
    public function call()
    {
        return $this->belongsTo(Call::class, 'call_id');
    }

    // Consulta el incentivo de la aplicación
    public function incentive()
    {
        return $this->belongsTo(Incentive::class, 'incentive_id');
    }

    // Consulta el ususario de la aplicación
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Consulta el tipo de ususario de la aplicación
    public function user_type()
    {
        return $this->belongsTo(User_type::class, 'user_type_id');
    }

    // Consulta el status de la aplicación
    public function status()
    {
        return $this->belongsTo(Status_type::class, 'status_type_id');
    }

    // Consulta todos los incentivos según el área
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'application_id');
    }

    public function members()
    {
        return $this->hasMany(Member::class, 'application_id');
    }

    // Consulta los jueces de una aplicación
		public function judges()
		{
				return $this->belongsToMany(User::class, 'application_judge', 'application_id', 'user_id');
		}

    public function grade_application()
    {
        return $this->hasMany(Grade_application::class, 'application_id');
    }

    public function register()
    {
        return $this->hasMany(Register::class, 'application_id');
    }

}
