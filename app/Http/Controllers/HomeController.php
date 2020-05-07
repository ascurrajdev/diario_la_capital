<?php

namespace App\Http\Controllers;

use App\Country;
use App\Encuesta;
use App\Lector;
use App\Post;
use App\User;
use App\Vista;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		$paises = Country::cursor()->filter(function ($pais) {
			return ($pais->vistas()->count()) > 0;
		});
		$paisesNombres = collect();
		$paisesCantidad = collect();
		foreach ($paises as $pais) {
			$paisesNombres->push($pais->nombre_pais);
			$paisesCantidad->push($pais->vistas()->get()->unique('ip_cliente')->count());
		}
		$paisesGrafico = collect(["nombres" => $paisesNombres, "cantidad" => $paisesCantidad]);
		return view('home', ['lectores' => Lector::count(), 'noticias' => Post::count(), "usuarios" => User::count(), "encuestas" => Encuesta::count(), "vistas" => Vista::whereDate('created_at', date("Y-m-d"))->get()->unique('ip_cliente')->count(), "paisesData" => $paisesGrafico]);
	}
}
