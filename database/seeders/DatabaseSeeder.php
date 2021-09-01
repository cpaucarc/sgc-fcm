<?php

namespace Database\Seeders;

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
        Storage::deleteDirectory('/public/investigadores');

        Storage::makeDirectory('/public/investigadores');

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
        \App\Models\ResponsabilidadSocial::factory(150)->create();

        $this->call(PreguntaSeeder::class);

        /* Investigacion */
        $this->call(AreaInvestigacionSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(EstadoInvestigacionSeeder::class);
        $this->call(FinanciadorSeeder::class);
        $this->call(GradoAcademicoSeeder::class);

        $this->call(LineaInvestigacionSeeder::class);

        $this->call(SublineaInvestigacionSeeder::class);

        \App\Models\Investigacion::factory(200)->create();
        \App\Models\Investigador::factory(100)->create();
        \App\Models\FinanciadorInvestigacion::factory(100)->create();
        \App\Models\InvestigadorInvestigacion::factory(50)->create();
    }
}
