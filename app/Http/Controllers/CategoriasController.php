<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Color;
class CategoriasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("categorias.index", ["url" => "Categorias", "categorias" => Categoria::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.nuevo', ["url"=>"Nuevo","colores"=>Color::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "nombreCategoria"=>"required|max:255|string",
            "colorCategoria"=>"required|min:1|number"
        ]);
        $categoria = new Categoria;
        $categoria->id=null;
        $categoria->nombre_categoria = $request->input('nombreCategoria');
        $categoria->color_id = $request->input('colorCategoria');
        $categoria->save();
        return redirect(route('categoria.index'));
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
        //return Categoria::find($id);
        return view('categorias.edit', ["url"=>"Editar","categoria"=>Categoria::find($id),"colores"=>Color::all()]);
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
        $this->validate($request,[
            "nombreCategoria"=>"required|max:255|string",
            "colorCategoria"=>"required|min:1|number"
        ]);
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre_categoria = $request->input('nombreCategoria');
        $categoria->color_id = $request->input('colorCategoria');
        $categoria->save();
        return redirect(route('categoria.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
