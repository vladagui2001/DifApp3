<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Difregister;

class ApiSearchController extends Controller
{
    public function search(Request $request){
        $error = ['error' => 'Sin resultados, ingrese otros campos para la busqueda.'];
        if($request->has('text')){
            $difRegister = Difregister::search($request->get('text'))->get();
            return view("RegisterUsers.busqueda", compact("difRegister"));
    }
    return $error;
}
public function index()
    {
        return view("RegisterUsers.search");
    }
}

