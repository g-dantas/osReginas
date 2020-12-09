<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $primaryKey = 'id_depto';
    protected $fillable = [
        'desc_depto'
    ];
}
