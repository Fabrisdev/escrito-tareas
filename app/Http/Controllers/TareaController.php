<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TareaController extends Controller
{
    public function Crear(Request $request){
        $validacion = Validator::make($request -> all(), [ 
            "titulo" => "required|min:1|max:50",
            "contenido" => "required|min:1|max:255",
            "autor" => "required|min:1|max:50"
        ]);
        if($validacion -> fails())
            return $validacion -> errors();
        $tarea = new Tarea();
        $tarea -> titulo = $request -> post("titulo");
        $tarea -> contenido = $request -> post("contenido");
        $tarea -> autor = $request -> post("autor");
        $tarea -> save();
    }
}
