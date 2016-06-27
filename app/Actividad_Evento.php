<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad_Evento extends Model
{
    protected $table = 'actividades_eventos';
    protected $fillable = [
    	'evento_id','fechas','actividades',
    ];
   public function evento()
   {
   	return $this->belongsTo('App\Eventos', 'evento_id');
   }
}
