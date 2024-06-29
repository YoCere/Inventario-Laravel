<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use PhpParser\Node\Stmt\Catch_;

class categoriaController extends Controller
{
    public function principal(){
        $categorias = Categoria::withTrashed()->paginate(5);
        return view('categorias.principal', ['cate' => $categorias]);
    }

    public function crear()
    {
        return view('categorias.crear');
    }

    public function mostrar($variable)
    {
        $categoria = Categoria::find($variable);
        return view('categorias.mostrar', ['role'=>$categoria]);
    }

    public function store(Request $request)
    {
        $categoria=new Categoria();
        $categoria->nombre=$request->nombre;
        $categoria->save();

        return redirect()->route('roles.mostrar', $categoria->id);

    }
    public function editar($rol){
        $rol = Categoria::findOrFail($rol); 
        return view("categorias.editar", compact('catego'));
    }
    public function update(Request $request,Categoria $categoria){
        $categoria->nombre=$request->nombre;
        $categoria->save();

        return redirect()->route('categorias.mostrar', $categoria->id);
    }
    
    public function borrar($id){
        $categoriaborrar=Categoria::find($id);
        $categoriaborrar->forceDelete();
        return redirect()->route('categorias.principal');
    }

    public function desactivarrol($id){

        $categoriasde=Categoria::find($id);
        $categoriasde->delete();
        return redirect()->route('categorias.principal');
    }

    public function activarol($id){
        
        $categoriaact=Categoria::withTrashed()->find($id);
        $categoriaact->restore($id);

        return redirect()->route('categorias.principal');
    }

}
