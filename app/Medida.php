<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    //
    public function almacen(){
    	return $this->hasMany(Almacen::class);
    }
}
