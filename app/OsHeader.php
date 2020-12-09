<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OsHeader extends Model
{
    protected $primaryKey = 'id_header_os';
    protected $table = 'os_header';
    protected $fillable = [
      'id_usuario_header',
      'data_hora_abertura_header',
      'status_header',
      'fila_atendimento_header',
      'id_defeito_header'
    ];
}
