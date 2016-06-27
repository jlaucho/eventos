<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cliente;
use Laracasts\Flash\Flash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cant = Cliente::count();
        if($cant == 0){
            return view('cliente.index')
                ->with('cant',$cant);
        }else{
            $cli = Cliente::orderBy('ID','ASC')->paginate(10);
            return view('cliente.index')
                ->with('client',$cli)
                ->with('cant',$cant);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cli = new Cliente;
        $cli->fill($request->all());
        $cli->save();
        Flash::success('Cliente '.$cli->nombre.' Registrado satisfactoriamente');
        return redirect()->route('cliente.index');
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
        $cli = Cliente::find($id);
        return view('cliente.edit')->with('cli',$cli);
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
        $cli = Cliente::find($id);
        $cli->fill($request->all());
        $cli->save();
        Flash::success('Se han cambiado los datos del cliente '.$cli->nombre);
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cli = Cliente::find($id);
        $cli->delete();
        Flash::success('Se han eliminado los datos del cliente '.$cli->nombre);
        return redirect()->route('cliente.index');   
    }
}
