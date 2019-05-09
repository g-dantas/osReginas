<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $primaryKey = 'id_tp_usuario';
    protected $fillable = [
        'desc_tp_usuario'
    ];
}
