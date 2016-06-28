<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    protected $table = 'eventos';
    protected $fillable = [
    'nombre', 'tipo_evento', 'cant_participante', 'fecha_inicio', 'fecha_fin', 'hora_inicio', 'hora_fin', 'telf_responsable', 'cliente_id', 'responsable'
    ];
    
    public function cliente()
    {
    	return $this->belongsTo('App\Cliente', 'cliente_id');
    }
    public function eventoUsuarios()
    {
    	return $this->hasMany('App\usuario_evento', 'evento_id');
    }
    public function eventoInventarios()
    {
        return $this->hasMany('App\evento_inventario', 'inventario_id');
    }
}
