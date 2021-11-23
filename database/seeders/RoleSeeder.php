<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Dirección de Escuela']);
        $role2 = Role::create(['name' => 'Departamento Academico']);
        $role3 = Role::create(['name' => 'Oficina General de Estudios']);
        $role4 = Role::create(['name' => 'Docente']);
        $role5 = Role::create(['name' => 'Decanatura']);
        $role6 = Role::create(['name' => 'Direccion de Unidad de Calidad']);
        $role7 = Role::create(['name' => 'Biblioteca']);
        $role8 = Role::create(['name' => 'Comite de Tutoria']);
        $role9 = Role::create(['name' => 'Estudiante']);
        $role10 = Role::create(['name' => 'Vicerrectorado Académico']);
        $role11 = Role::create(['name' => 'Vicerrectorado de Investigación']);
        $role12 = Role::create(['name' => 'Direccion de Unidad de Responsabilidad Social']);
        $role13 = Role::create(['name' => 'Direccion de Unidad de Investigación']);
        $role14 = Role::create(['name' => 'Administrador']);

        //Admin
        Permission::create(['name' => 'crear escuelas'])->assignRole($role14);
        Permission::create(['name' => 'crear usuarios'])->assignRole($role14);
        Permission::create(['name' => 'crear actividades'])->assignRole($role14);

        Permission::create(['name' => 'completar actividades'])->syncRoles([$role1, $role2, $role3, $role4, $role5, $role6, $role7, $role8, $role10, $role11, $role12, $role13]);
        Permission::create(['name' => 'proveer entradas'])->syncRoles([$role1, $role2, $role3, $role4, $role5, $role6, $role7, $role8, $role10, $role11, $role12, $role13]);
        Permission::create(['name' => 'gestionar salidas'])->syncRoles([$role1, $role2, $role3, $role4, $role5, $role6, $role7, $role8, $role10, $role11, $role12, $role13]);
        Permission::create(['name' => 'gestionar indicadores'])->syncRoles([$role1, $role2, $role3, $role5, $role6, $role8, $role10, $role11, $role12, $role13]);

        Permission::create(['name' => 'crear solicitud bachiller'])->assignRole($role9);
        Permission::create(['name' => 'crear solicitud titulacion'])->assignRole($role9);

    }
}
