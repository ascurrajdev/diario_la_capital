<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encuesta;
use App\Color;
use App\Respuesta;
class EncuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('encuestas.index', ["url" => "Encuestas", "encuestas"=>Encuesta::paginate(25)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('encuestas.nuevo',["url"=>"Nuevo","colores"=>Color::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $encuesta = new Encuesta;
        $encuesta->id=null;
        $encuesta->contenido = $request->input("contenido");
        $encuesta->opciones=collect(["botones" => [$request->input("boton1"),$request->input("boton2"),$request->input("boton3")]]);
        $encuesta->save();
        return redirect(route("encuestas.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cantidadJson = collect([Respuesta::where('opcion_id', 1)->count(),Respuesta::where('opcion_id', 2)->count(),Respuesta::where('opcion_id', 3)->count()]);
        return view("encuestas.show",["url"=>"Ver", "encuesta"=>Encuesta::find($id),"cantidad"=>$cantidadJson]);
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
