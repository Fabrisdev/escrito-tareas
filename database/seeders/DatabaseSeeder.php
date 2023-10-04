<?php

namespace Database\Seeders;

use App\Models\Tarea;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tarea = new Tarea();
        $tarea -> id = 1;
        $tarea -> titulo = "Ordenar cuarto";
        $tarea -> contenido = "Lavar el suelo, tirar basura, ordenar cama, limpiar ventanas";
        $tarea -> autor = "Pedro";
        $tarea -> save();
    }
}
