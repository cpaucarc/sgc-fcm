<?php

namespace Database\Seeders;

use App\Models\Actividad;
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
        // \App\Models\User::factory(10)->create();
        $this->call(FacultadSeeder::class);
        $this->call(NivelOficinaSeeder::class);
        $this->call(TipoActividadSeeder::class);
        $this->call(ProcesoSeeder::class);
        $this->call(EntradaSeeder::class);
        $this->call(SalidaSeeder::class);
        $this->call(EntidadSeeder::class);

        $this->call(EscuelaSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(ResponsableSeeder::class);
        $this->call(ClienteSeeder::class);

        $this->call(ActividadSeeder::class);
        $this->call(OficinaSeeder::class);

        $this->call(ActividadResponsableSeeder::class);
        $this->call(EntradaProveedorSeeder::class);
        $this->call(ClienteSalidaSeeder::class);
    }
}
