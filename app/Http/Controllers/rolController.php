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
        $rol=new Role();
        $rol->nombre=$request->nombre;
        $rol->save();

        return redirect()->route('roles.mostrar', $rol->id);

    }
    public function editar($rol){
        $rol = Role::findOrFail($rol); 
        return view("roles.editar", compact('rol'));
    }
    public function update(Request $request,Role $rol){
        $rol->nombre=$request->nombre;
        $rol->save();

        return redirect()->route('roles.mostrar', $rol->id);
    }
    
    public function borrar($id){
        $rolborrar=Role::find($id);
        $rolborrar->forceDelete();
        return redirect()->route('roles.principal');
    }

    public function desactivarrol($id){

        $role=Role::find($id);
        $role->delete();
        return redirect()->route('roles.principal');
    }

    public function activarol($id){
        
        $role=Role::withTrashed()->find($id);
        $role->restore($id);

        return redirect()->route('roles.principal');
    }

}
