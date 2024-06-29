<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class perfilesController extends Controller
{
    public function principal()
    {
        $perfiles = Profile::withTrashed()->paginate(5);
        return view('perfiles.principal', ['perfi' => $perfiles]);
    }

    public function crear()
    {
        $perfil=Profile::all();
        return view('perfiles.crear',compact('categorias'));
    }

    public function mostrar($variable)
    {
        $perfiles = Profile::find($variable);

        $cat_id= $perfiles->categoria_id;

        $categoria=Pro::find($cat_id);
        // return view('productos.mostrar', ['prod'=>$variable]);
        return view("productos.mostrar", compact('producto','categoria'));
    }

    public function store(Request $request)
    {
        $pro=new Producto();
        $pro->nombre=$request->nombre;
        $pro->precio=$request->precio;
        $pro->descripcion=$request->descripcion;
        $pro->categoria=$request->categoria;

        $pro->categoria_id=$request->categoria_id;
        // return $request->all();
        $pro->save();

        // return redirect()->route('producto.principal');
        return redirect()->route('producto.mostrar', $pro->id);

    }
    public function editar(Producto $producto){
        //$producto = Producto::find($id);
        //return $producto;
        $cat_id=$producto->categoria_id;
        $categoria_actual=Categoria::find($cat_id);
        $categorias=Categoria::all();
        return view("productos.editar", compact('producto','categorias','categoria_actual'));
    }
    public function update(Request $request, Producto $producto){
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->descripcion=$request->descripcion;
        $producto->categoria=$request->categoria;
        $producto->categoria_id=$request->categoria_id;

        $producto->save();

        return redirect()->route('producto.mostrar', $producto->id);
    }
    
    public function borrar($id){
        $producto=Producto::find($id);
        $producto->forceDelete();
        return redirect()->route('producto.principal');
    }

    public function desactivarproducto($id){

        $producto=Producto::find($id);
        $producto->delete();
        return redirect()->route('producto.principal');
    }

    public function activaproducto($id){
        
        $producto=Producto::withTrashed()->find($id);
        $producto->restore($id);

        return redirect()->route('producto.principal');
    }
}
