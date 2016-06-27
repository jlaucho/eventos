<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';

    protected $fillable = [
    'nombre', 'identificacion', 'direccion', 'telf1', 'telf2', 'correo', 'observacion'
    ];
    public function eventos()
    {
    	return $this->hasMany('App\Eventos', 'cliente_id');
    }
}
