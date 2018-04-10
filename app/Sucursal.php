<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    //
    public function empresas(){
    	return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
