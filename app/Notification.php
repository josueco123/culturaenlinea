<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'id',
        'application_id',
        'message',
        'viewed'
    ];

    // Consulta la aplicación de la notificación
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
