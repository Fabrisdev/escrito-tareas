<?php

namespace Tests\Feature;

use App\Models\Tarea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TareaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_crear_Tarea()
    {
        $response = $this -> post('/api/v1/tarea',[ 
            "titulo" => "Una prueba",
            "contenido" => "Lavar los platos y",
            "autor" => "Gabriel"
        ]);
        $response -> assertStatus(201);
        $this -> assertDatabaseHas("tareas", [ 
            "titulo" => "Una prueba",
            "contenido" => "Lavar los platos y",
            "autor" => "Gabriel"
        ]);
    }

    public function test_listar_tareas()
    {
        $response = $this -> get('/api/v1/tarea');
        $response -> assertStatus(200);
        $response -> assertJson([
            [ 
                "id" => 1,
                "titulo" => "Ordenar cuarto",
                "contenido" => "Lavar el suelo, tirar basura, ordenar cama, limpiar ventanas",
                "autor" => "Pedro"
            ],
            [ 
                "id" => 2,
                "titulo" => "Ordenar cuarto",
                "contenido" => "Lavar el suelo, tirar basura, ordenar cama, limpiar ventanas",
                "autor" => "Pedro"
            ]
        ]);
    }

    public function test_borrar_tarea()
    {
        $response = $this -> delete('/api/v1/tarea/1');
        $response -> assertStatus(200);
        $this -> assertDatabaseMissing("tareas", [ 
            "id" => 1
        ]);
    }

    public function test_mostrar_una_tarea()
    {
        $response = $this -> get('/api/v1/tarea/2');
        $response -> assertStatus(200);
        $response -> assertJson([ 
            "id" => 2,
            "titulo" => "Ordenar cuarto",
            "contenido" => "Lavar el suelo, tirar basura, ordenar cama, limpiar ventanas",
            "autor" => "Pedro"
        ]);
    }
}
