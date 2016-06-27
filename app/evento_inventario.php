<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evento_inventario extends Model
{
   protected $table = 'evento_inventario';
   protected $fillable = [
   'evento_id', 'inventario_id'
   ];
   public function evento()
   {
   	return $this->belongsTo('App\Eventos', 'evento_id');
   }
   public function inventario()
   {
   	return $this->belongsTo('App\Inventario', 'inventario_id');
   }
}
