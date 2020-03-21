<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relevancia;
use App\Categoria;
use App\Post;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('newspaper.index',['url'=>'Noticias']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relevancia = Relevancia::all();
        $categorias = Categoria::all();
        return view('newspaper.nuevo',['url' => 'Crear', 'categorias' => $categorias, 'relevancias' => $relevancia]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->id = null;
        $post->user_id = Auth::id();
        $post->contenido_noticia = $request->input('contenido');
        $post->titulo_noticia = $request->input('titulo');
        $post->nivel_relevancia_id = $request->input('relevancia');
        $post->categoria_id = $request->input('categoria');
        $post->save();
        return redirect("post");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('newspaper.show',['url' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('newspaper.edit',['url' => $id]);
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
