<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Relevancia;
use App\Post;
use App\User;
use App\Encuesta;
use App\Vista;
use App\Color;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*$relevancia = new Relevancia;
        $relevancia->id=null;
        $relevancia->nombre_relevancia="Bajo";
        $relevancia->save();*/
        /*$color = new Color;
        $color->id=null;
        $color->nombre_color="Primary";
        $color->style_color="bg-primary";
        $color->save();*/
        return view('home',['noticias' => Post::count(), "usuarios" => User::count(),"encuestas"=> Encuesta::count(), "vistas" => Vista::whereDate('created_at', date("Y-m-d"))->count()]);
    }
}
