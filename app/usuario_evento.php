<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario_evento extends Model
{
    protected $table = 'usuario_evento';
    protected $fillable = [
    'usuario_id', 'evento_id'
    ];
    public function usuario()
    {
    	return $this->belongsTo('App\User', 'usuario_id');
    }
    public function evento()
    {
    	return $this->belongsTo('App\Eventos', 'evento_id');
    }
}
