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
        $this->call(UnidadMedidaSeeder::class);
        $this->call(FrecuenciaSeeder::class);

        $this->call(DocenteSeeder::class);
        $this->call(EstudianteSeeder::class);
        $this->call(IndicadorSeeder::class);
        \App\Models\ResponsabilidadSocial::factory(50)->create();

        //Títulos profesionales
        $this->call(CargoJuradoSeeder::class);
        $this->call(TipoTesisSeeder::class);
        $this->call(DeclaracionSeeder::class);
        $this->call(AsesorSeeder::class);
        $this->call(JuradoSeeder::class);
        $this->call(BachillerSeeder::class);
        \App\Models\Tesis::factory(20)->create();
        \App\Models\Sustentacion::factory(20)->create();
        \App\Models\BachillerTesis::factory(50)->create();
        \App\Models\JuradoSustentacion::factory(50)->create();
    }
}
