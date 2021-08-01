<?php

namespace Database\Seeders;

use App\Models\Actividad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Storage::deleteDirectory('/public/salidas');
        Storage::deleteDirectory('/public/entradas');

        $this->call(CicloSeeder::class);
        $this->call(FacultadSeeder::class);
        $this->call(NivelOficinaSeeder::class);
        $this->call(PersonaSeeder::class);
        $this->call(TipoActividadSeeder::class);

        $this->call(EntidadSeeder::class);
        $this->call(EscuelaSeeder::class);
        $this->call(ProcesoSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(ActividadSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(EntradaSeeder::class);
        $this->call(OficinaSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(ResponsableSeeder::class);
        $this->call(SalidaSeeder::class);

        $this->call(ActividadResponsableSeeder::class);
        $this->call(ClienteSalidaSeeder::class);
        $this->call(EntradaProveedorSeeder::class);
        $this->call(RolSeeder::class);

        /* Responsabilidad Social */
        $this->call(EmpresaSeeder::class);
        $this->call(DocenteSeeder::class);
        $this->call(EstudianteSeeder::class);
        $this->call(IndicadorSeeder::class);

    }
}
