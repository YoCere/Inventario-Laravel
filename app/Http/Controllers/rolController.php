<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class rolController extends Controller
{
    public function principal(){
        $Rol = Role::withTrashed()->paginate(2);
        return view('roles.principal', ['r' => $Rol]);
    }

    public function crear(){
        
    }

    public function mostrar(){
        
    }
}
