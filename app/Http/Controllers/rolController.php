<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class rolController extends Controller
{
    public function principal(){
        $Rol = Role::withTrashed()->paginate(5);
        return view('roles.principal', ['r' => $Rol]);
    }

    public function crear()
    {
        return view('roles.crear');
    }

    public function mostrar($variable)
    {
        $roles = Role::find($variable);
        return view('roles.mostrar', ['role'=>$roles]);
    }

    public function store(Request $request)
    {
        $pro=new Role();
        $pro->nombre=$request->nombre;
        $pro->save();

        return redirect()->route('roles.mostrar', $pro->id);

    }
    public function editar($rol){
        return view("roles.editar", ['rol'=>$rol]);
    }
    public function update(Request $request,Role $rol){
        $rol->nombre=$request->nombre;
        $rol->save();

        return redirect()->route('roles.mostrar', $rol->id);
    }
    
    public function borrar($id){
        $producto=Role::find($id);
        $producto->forceDelete();
        return redirect()->route('roles.principal');
    }

    public function desactivarrol($id){

        $producto=Role::find($id);
        $producto->delete();
        return redirect()->route('roles.principal');
    }

    public function activarol($id){
        
        $producto=Role::withTrashed()->find($id);
        $producto->restore($id);

        return redirect()->route('roles.principal');
    }

}
