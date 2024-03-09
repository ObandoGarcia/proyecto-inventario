<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        //Add initial states
        $state = new State();
        $state->name = 'Activo';
        $state->save();

        $state = new State();
        $state->name = 'Inactivo';
        $state->save();

        $state = new State();
        $state->name = 'En mantenimiento';
        $state->save();

        $state = new State();
        $state->name = 'Completado';
        $state->save();

        $state = new State();
        $state->name = 'Cancelado';
        $state->save();

        $state = new State();
        $state->name = 'En pausa';
        $state->save();

        $state = new State();
        $state->name = 'En uso de proyecto';
        $state->save();

        $state = new State();
        $state->name = 'Reporte impreso';
        $state->save();

        $state = new State();
        $state->name = 'Reporte guardado';
        $state->save();
    }
}
