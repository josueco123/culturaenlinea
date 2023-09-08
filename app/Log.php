<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';

    protected $fillable = [
        'id',
        'log_user_id',
        'log_ip_user',
        'log_action',
        'log_id_register',
        'log_old_data',
        'log_new_data',
    ];
}
