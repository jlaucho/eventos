<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Inventario;
use Laracasts\Flash\Flash;
class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cant = Inventario::count();
        if($cant == 0){
            return view('inventario.index')
                ->with('cantidad',$cant);
        }else{
            $inv = Inventario::orderBy('ID','ASC')->paginate(10); 
            return view('inventario.index')
                ->with('inv',$inv)
                ->with('cantidad',$cant);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $inv = new Inventario;
        $inv->fill($request->all());
        $inv->save();
        Flash::success('El implemento ha sido registrado');
        return redirect()->route('inventario.index');
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

        $inv = Inventario::find($id);
        return view('inventario.edit')
            ->with('inv',$inv);
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
        
        $inv = Inventario::find($id);
        $inv->fill($request->all());
        $inv->save();
        Flash::success('El Implemento "' .$inv->nombre. '" se ha actualizado');
        return redirect()->route('inventario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inv = Inventario::find($id);
        $inv->delete();
        Flash::success('El Implemento "' .$inv->nombre. '" ha sido eliminado');
        return redirect()->route('inventario.index');
    }
}
