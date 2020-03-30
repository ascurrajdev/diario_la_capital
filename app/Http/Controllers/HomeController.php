<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Relevancia;
use App\Post;
use App\User;
use App\Encuesta;
use App\Vista;
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
        return view('home',['noticias' => Post::count(), "usuarios" => User::count(),"encuestas"=> Encuesta::count(), "vistas" => Vista::whereDate('created_at', date("Y-m-d"))->count()]);
    }
}
