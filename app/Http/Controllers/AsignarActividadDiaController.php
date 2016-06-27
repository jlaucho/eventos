<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cliente;
use App\Eventos;
use App\User;
use Laracasts\Flash\Flash;
use App\Actividad_Evento;

class AsignarActividadDiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $id2)
    {
         $cliente = Cliente::find($id);
        $eventos = Eventos::find($id2);       
        $fecha = $eventos->fecha_inicio;
        $fecha2 = $eventos->fecha_fin;
        
        return view('evento.eventoDias')
            ->with('cliente',$cliente)
            ->with('evento',$eventos)
            ->with('fecha',$fecha)
            ->with('fecha2',$fecha2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->all();
        $cont = 0;
        foreach ($request->fechas as $f)
        {
            $fecha[$cont] = $f;
            $cont++;
        }

        $cont = 0;
        foreach ($request->actividad as $act) 
        {
            $ac = new Actividad_Evento;
            $ac->evento_id = $request->evento;
            $ac->fecha = $fecha[$cont];
            $ac->actividades = $act;
            $ac->save();
            $cont++;
        }
        Flash::success('El evento se ha registrado correctamente');
        return redirect()->route('evento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
