<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Relevancia;
use App\Categoria;
use App\ContenidoAdicional;
use App\Post;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
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
        /*$relevancia = new Relevancia;
        $relevancia->id = null;
        $relevancia->nombre_relevancia = "Baja";
        $relevancia->save();*/
        $paginador = Post::orderBy('created_at', 'desc')
                            ->paginate(25);
        return view('newspaper.index',['url'=>'Noticias','Noticias' => $paginador]);
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
        $this->validate($request,[
            "contenido"=>"required|string",
            "introduccion"=>"required|string",
            "titulo"=>"required|max:255|string",
            "relevancia"=>"required|min:1",
            "categoria"=>"required|min:1",
            "materiales"=>"required"
        ]);
        $post = new Post;
        $post->id = null;
        $post->user_id = Auth::id();
        $post->contenido_noticia = $request->input('contenido');
        $post->introduccion_noticia = $request->input('introduccion');
        $post->titulo_noticia = $request->input('titulo');
        $post->nivel_relevancia_id = $request->input('relevancia');
        $post->categoria_id = $request->input('categoria');
        $post->save();

        $files = $request->file('materiales');
        if($request->hasFile('materiales')){
            foreach($files as $file){
                $asset = new ContenidoAdicional;
                $asset->id = null;
                $asset->asset_url = str_replace($request->path(),"",$request->url()).'storage/'.Storage::disk('public')->putFile('posts', $file, 'public');
                //$asset->asset_url = 'storage/'.Storage::disk('public')->putFile('posts', $request->file('materiales'), 'public');
                $asset->post_id = $post->id;
                $asset->save();
            }
        }
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
        return view('newspaper.show',['url' => $id,'noticia' => Post::findOrFail($id) ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('newspaper.edit',['url' => $id, 'noticia' => Post::findOrFail($id), 'categorias' => Categoria::all(), 'relevancias' => Relevancia::all()]);
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
            "introduccionNoticia"=>"required|string",
            "contenidoNoticia"=>"required|string",
            "tituloNoticia"=>"required|max:255|string",
            "nivelRelevancia"=>"required|min:1|number",
            "categoriaNoticia"=>"required|min:1|number"
        ]);
        $PostAux = Post::findOrFail($id);
        $PostAux->introduccion_noticia = $request->input("introduccionNoticia");
        $PostAux->contenido_noticia = $request->input("contenidoNoticia");
        $PostAux->titulo_noticia = $request->input("tituloNoticia");
        $PostAux->nivel_relevancia_id = $request->input("nivelRelevancia");
        $PostAux->categoria_id = $request->input("categoriaNoticia");
        $PostAux->save();
        return redirect("post");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        ContenidoAdicional::where('post_id',$id)->delete();
    }
}
