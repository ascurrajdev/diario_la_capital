<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Victorybiz\GeoIPLocation\GeoIPLocation;
use App\Country;
use App\Vista;
class VistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $geoip = new GeoIPLocation();
        $geoip->setIp('190.104.182.28');
        /*if (isset($_SERVER["HTTP_CLIENT_IP"])){

            return $_SERVER["HTTP_CLIENT_IP"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

            return $_SERVER["HTTP_X_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){

            return $_SERVER["HTTP_X_FORWARDED"];

        }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){

            return $_SERVER["HTTP_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_FORWARDED"])){

            return $_SERVER["HTTP_FORWARDED"];

        }else{

            return $_SERVER["REMOTE_ADDR"];

        }*/
        $vistaAux = Vista::where('ip_cliente', '190.104.182.28')->whereDate('created_at', date("Y-m-d"))->where('post_id','1')->get();
        if(sizeOf($vistaAux)<1){
            $vista = new Vista;
            $vista->id = null;
            $vista->post_id = 1;
            $vista->ip_cliente = '190.104.182.28';
            $vista->pais_id = (Country::where('nombre_pais',$geoip->getCountry())->get())[0]->id;
            $vista->save();
            return $vista;
        }else{
            return "La visita ya fue realizada";
        }
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
