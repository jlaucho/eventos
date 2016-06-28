<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\evento_inventario;
use App\Eventos;
use App\Inventario;
use Laracasts\Flash\Flash;
class AsignarImplementoController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $idE=$request->idEvento;
        $idC=$request->idCliente;
        foreach ($request->implemento as $imp) {
            $ei = new evento_inventario;
            $ei->evento_id=$idE;
            $ei->inventario_id=$imp;
            $ei->save();
        }
        //Flash::success('El evento se ha registrado correctamente');
        return redirect()->route('actividades.asignarDia',['id'=>$idC,'id2'=>$idE]);
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
        $eve = Eventos::find($id);
        $inven = Inventario::all();
        return view('evento.agregarImplemento')
            ->with('eve',$eve)
            ->with('inven',$inven);
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
        $eve = Eventos::find($id);
        foreach ($request->implemento as $imp) {
            $ei = new evento_inventario;
            $ei->evento_id=$id;
            $ei->inventario_id=$imp;
            $ei->save();
        }
        flash::info('Se han asignado nuevos implementos al evento: <b>' .$eve->nombre. '</b>');
        return redirect()->route('evento.index');
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
