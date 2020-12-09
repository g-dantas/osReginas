<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OsBody extends Model
{
    protected $table = "os_body";
    protected $primaryKey = "id_os_body";
    protected $fillable = [
        "id_header_os",
        "data_os_body",
        "id_usuario_body",
        "texto_body"
    ];
}
