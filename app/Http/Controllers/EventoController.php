<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cliente;
use App\Eventos;
use App\User;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use App\usuario_evento;
use App\evento_inventario;
use App\Actividad_Evento;
use DB;
use App\Http\Requests\EventoRequest;

class EventoController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fecha_actual = date("Y-m-d");
        $cant = Eventos::count();
        if($cant == 0){
            return view('evento.index')
                ->with('cant',$cant);
        }else{
           //$even = Eventos::orderBy('ID','ASC')->paginate(10);
            $even = DB::table('eventos')
                ->select('*')
                ->paginate(10);
                
            return view('evento.index')
                ->with('evento',$even)
                ->with('cant',$cant)
                ->with('fa',$fecha_actual);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cliente = Cliente::find($id);
        return view('evento.create')
            ->with('cli',$cliente);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoRequest $request)
    {   
        //dd($request->all());
        
        $cli = Cliente::find($request->idCliente);
        $even = new Eventos;
        $even->fill($request->all());
        //$even->fecha_inicio = $request->fecha_inicio;
        //$even->fecha_fin = $request->fecha_fin;
        $even->cliente_id=$request->idCliente;
        //$even->responsable = $request->responsable;
        $even->hora_inicio = str_replace(" ", "", $even->hora_inicio);
        $even->hora_fin = str_replace(" ", "", $even->hora_fin);
       // dd($even);
        $even->save();
        return redirect()->route('evento.asignaU',['id'=>$request->idCliente,'id2'=>$even->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eve = Eventos::find($id);
        $ev_us = usuario_evento::where('evento_id','=',$id)
            ->with('usuario')
            ->get();
        $ev_in = evento_inventario::where('evento_id','=',$id)
            ->get();
        $act = Actividad_Evento::where('evento_id','=',$id)
            ->get();
        return view('evento.detalles')
            ->with('eve',$eve)
            ->with('usu',$ev_us)
            ->with('inv',$ev_in)
            ->with('act',$act);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find(2);
        $eventos = Eventos::find(1);       
        //$fecha = date('Y-m-j');
        $fecha = $eventos->fecha_inicio;
        $fecha2 = $eventos->fecha_fin;
        
        return view('evento.eventoDias')
            ->with('cliente',$cliente)
            ->with('evento',$eventos)
            ->with('fecha',$fecha)
            ->with('fecha2',$fecha2);
        $fecha = $eventos->fecha_inicio;
        echo $fecha;
        echo '<br>';
        if($eventos->fecha_inicio != $eventos->fecha_fin)
        {
            $cont = 1;
            do{
                if($cont == 1){
                    $nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
                }else{
                    $nuevafecha = strtotime ( '+1 day' , strtotime ( $nuevafecha ) ) ;
                }

                $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                echo $nuevafecha.'<hr>';
                $cont++;
            }while($nuevafecha != $fecha2);
        }

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

    // Asignar Usuario
    public function asignaU($id, $id2)
    {
        $idC = Cliente::find($id);
        $idE = Eventos::find($id2);
        $user = User::select('*')->where('nivel','!=','admin')->get();
        return view('evento.asignaUsuario')
            ->with('cliente',$idC)
            ->with('evento',$idE)
            ->with('personal',$user);
    }
}
