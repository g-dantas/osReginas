<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OsHeader extends Model
{
    protected $primaryKey = 'id_header_os';
    protected $table = 'os_header';

    public function status() {
        return $this->hasOne('App\OsHeader', 'status_header', 'id_status');
    }
}
