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
        if($validacion -> fails()){
            $HTTP_BAD_REQUEST = 400;
            return response($validacion -> errors(), $HTTP_BAD_REQUEST);
        }
        $tarea = new Tarea();
        $tarea -> titulo = $request -> post("titulo");
        $tarea -> contenido = $request -> post("contenido");
        $tarea -> autor = $request -> post("autor");
        $tarea -> save();
        return $tarea;
    }

    public function Listar(){
        return Tarea::all();
    }

    public function MostrarUna(Request $request, $id){
        return Tarea::FindOrFail($id);
    }

    public function Modificar(Request $request, $id){
        $validacion = Validator::make($request -> all(), [ 
            "titulo" => "min:1|max:50",
            "contenido" => "min:1|max:255",
            "autor" => "min:1|max:50"
        ]);
        if($validacion -> fails()){
            $HTTP_BAD_REQUEST = 400;
            return response($validacion -> errors(), $HTTP_BAD_REQUEST);
        }
        $tarea = Tarea::FindOrFail($id);
        $tarea -> titulo = $request -> post("titulo", $tarea -> titulo);
        $tarea -> contenido = $request -> post("contenido", $tarea -> contenido);
        $tarea -> autor = $request -> post("autor", $tarea -> autor);
        $tarea -> save();
        return $tarea;
    }

    public function Eliminar(Request $request, $id){
        Tarea::FindOrFail($id) -> delete();
    }
}
