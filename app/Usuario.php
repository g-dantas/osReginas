<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Departamento;
use App\TipoUsuario;

class Usuario extends Model
{
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'nome_usuario',
        'login_usuario',
        'senha_usuario'
    ];

    public function departamento() {
        return $this->hasOne(Departamento::class);
    }

    public function tipoUsuario() {
        return $this->hasOne(TipoUsuario::class);
    }
}
