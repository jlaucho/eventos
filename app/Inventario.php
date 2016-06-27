<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $fillable = [
    'nombre', 'cantidad', 'observacion'
    ];
    public function inventarioEventos()
    {
    	return $this->hasMany('App\evento_inventario', 'evento_id');
    }
}
