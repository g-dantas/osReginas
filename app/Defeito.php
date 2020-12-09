<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defeito extends Model
{
    protected $primaryKey = 'id_defeito';
    protected $table = 'defeitos';
    protected $fillable = [
        'desc_defeito'
    ];
}
