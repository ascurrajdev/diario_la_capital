<?php

namespace App\Http\Controllers;

use App\Lector;

class LectoresController extends Controller {
	public function index() {
		$lectores = Lector::paginate(25);
		return view("lectores.index", ["lectores" => $lectores,
			"url" => "Lectores",
		]);
	}
}
