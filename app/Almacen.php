<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    //
    public function designs(){
    	return $this->belongsTo(Design::class, 'design_id');
    }

    public function marcas(){
    	return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function medidas(){
    	return $this->belongsTo(Medida::class, 'medida_id');
    }

    public function construcciones(){
    	return $this->belongsTo(Construccion::class, 'construccion_id');
    }

    public function tipos(){
    	return $this->belongsTo(Tipo::class, 'tipo_id');
    }

}
