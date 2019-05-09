<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusOS extends Model
{
    protected $primaryKey = 'id_status';
    protected $table = 'status_os';
    protected $fillable = [
        'desc_status'
    ];
}
