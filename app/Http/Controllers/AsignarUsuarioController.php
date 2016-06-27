<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\usuario_evento;
use App\Cliente;
use App\Eventos;
use App\Inventario;

class AsignarUsuarioController extends Controller
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
        $idC=$request->idCliente;
        $idE=$request->idEvento;
        foreach ($request->usuario as $user) {
            $as = new usuario_evento;
            $as->usuario_id=$user;
            $as->evento_id=$idE;
            $as->save();
        }
        return redirect()->route('asignarU.asignarE',['id'=>$idC,'id2'=>$idE]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $id2)
    {
        $idC = Cliente::find($id);
        $idE = Eventos::find($id2);
        $impl = Inventario::all();
        return view('evento.asignaImplemento')
            ->with('cliente',$idC)
            ->with('evento',$idE)
            ->with('implemento',$impl);
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
