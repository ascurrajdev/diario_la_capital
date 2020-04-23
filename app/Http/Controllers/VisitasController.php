<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vista;
class VisitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$visitasUltimosDiasDeLaSemana = Vista::where('created_at', ">=", date("Y-m-d", strtotime(date("Y-m-d")."- 7 days")));
        $visitasContenido = collect([]);
        $visitasLabelFechas = collect([]);
        for($cont=7; $cont>0; $cont--){
            $visitasContenido->push(Vista::whereDate('created_at', date("Y-m-d", strtotime(date("Y-m-d")."- {$cont} days")))->count()); 
            $visitasLabelFechas->push(date("M d", strtotime(date("Y-m-d")."- {$cont} days")));
        }
        return view("visitas.index", ["url"=>"Visitas", "vistasData"=>$visitasContenido, "visitasLabel"=>$visitasLabelFechas]);
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
        //
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
