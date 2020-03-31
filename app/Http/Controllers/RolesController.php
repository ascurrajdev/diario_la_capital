<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Role;
use App\User;
class RolesController extends Controller
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
        if((collect(Auth::user()->role->json_role["permisos"]["roles"]))->search("ver")<0){
            return redirect(route('home'));
        }
        return view('users.roles.index', ["url"=>"Roles de Usuario", "roles"=>Role::paginate(25)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if((collect(Auth::user()->role->json_role["permisos"]["roles"]))->search("crear")<0){
            return redirect(route('home'));
        }
        return view("users.roles.create", ["url"=>"Crear"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;
        $role->id=null;
        $role->nombre_role=$request->input("nombre_role");
        $role->json_role=collect(["permisos"=>["usuarios"=>$request->input("usuarios"),"noticias"=>$request->input("noticias"),"roles"=>$request->input("roles"),"encuestas"=>$request->input("encuestas"),"lectores"=>$request->input("lectores")]]);
        $role->save();
        return redirect(route("roles.index"));
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
        if((collect(Auth::user()->role->json_role["permisos"]["roles"]))->search("modificar")<0){
            return redirect(route('home'));
        }
        return view('users.roles.edit',["url"=>"Editar Role", "role"=>Role::find($id)]);
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
        $role = Role::find($id);
        $role->nombre_role=$request->input("nombre_role");
        $role->json_role=collect(["permisos"=>["usuarios"=>$request->input("usuarios"),"noticias"=>$request->input("noticias"),"roles"=>$request->input("roles"),"encuestas"=>$request->input("encuestas"),"lectores"=>$request->input("lectores")]]);
        $role->save();
        return redirect(route("roles.index"));
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
