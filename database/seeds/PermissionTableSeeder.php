<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Role;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador = Role::where('slug', 'administrador')->first();
        $gestorAdministrativo = Role::where('slug', 'gestor-administrativo')->first();
        $juez = Role::where('slug', 'juez')->first();
        $aspiranteEstimulo = Role::where('slug', 'aspirante-a-estimulo')->first();

        // Permisos para las áreas

        $permission = new Permission();
        $permission->name = 'Crear áreas';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Leer áreas';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Actualizar áreas';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Borrar áreas';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);


        // Permisos para las líneas de acción

        $permission = new Permission();
        $permission->name = 'Crear líneas de acción';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Leer líneas de acción';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Actualizar líneas de acción';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Borrar líneas de acción';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);


        // Permisos para los tipos de estímulos

        $permission = new Permission();
        $permission->name = 'Crear tipos de estímulo';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Leer tipos de estímulo';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Actualizar tipos de estímulo';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Borrar tipos de estímulo';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);


        // Permisos para las convocatorias

        $permission = new Permission();
        $permission->name = 'Crear convocatorias';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Leer convocatorias';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Actualizar convocatorias';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Borrar convocatorias';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);


        // Permisos para los estímulos

        $permission = new Permission();
        $permission->name = 'Crear estímulos';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Leer estímulos';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Actualizar estímulos';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Borrar estímulos';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);


        // Permisos para las aplicaciones

        $permission = new Permission();
        $permission->name = 'Crear aplicaciones';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        // $aspiranteEstimulo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Leer aplicaciones';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);
        $juez->permissions()->attach($permission);
        // $aspiranteEstimulo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Actualizar aplicaciones';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);
        $juez->permissions()->attach($permission);
        // $aspiranteEstimulo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Borrar aplicaciones';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);
        // $aspiranteEstimulo->permissions()->attach($permission);


        // Permisos para los tipos de estados

        $permission = new Permission();
        $permission->name = 'Crear tipos de estado';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Leer tipos de estado';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Actualizar tipos de estado';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Borrar tipos de estado';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);


        // Permisos para los registros

        $permission = new Permission();
        $permission->name = 'Crear registros';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $aspiranteEstimulo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Leer registros';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);
        $juez->permissions()->attach($permission);
        $aspiranteEstimulo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Actualizar registros';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $gestorAdministrativo->permissions()->attach($permission);
        $juez->permissions()->attach($permission);
        $aspiranteEstimulo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Borrar registros';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $gestorAdministrativo->permissions()->attach($permission);
        $aspiranteEstimulo->permissions()->attach($permission);


        // Permisos para los usuarios

        $permission = new Permission();
        $permission->name = 'Crear usuarios';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Leer usuarios';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Actualizar usuarios';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Borrar usuarios';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);


        // Permisos para los tipos de usuarios

        $permission = new Permission();
        $permission->name = 'Crear tipos de usuario';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Leer tipos de usuario';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Actualizar tipos de usuario';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);

        $permission = new Permission();
        $permission->name = 'Borrar tipos de usuario';
        $permission->slug = Str::slug($permission->name, '-');
        $permission->save();
        $administrador->permissions()->attach($permission);
        $gestorAdministrativo->permissions()->attach($permission);


        // Permisos para los campos de formulario

        // $permission = new Permission();
        // $permission->name = 'Crear campos de formulario';
        // $permission->slug = Str::slug($permission->name, '-');
        // $permission->save();
        // $gestorPlataforma->permissions()->attach($permission);
        //
        // $permission = new Permission();
        // $permission->name = 'Leer campos de formulario';
        // $permission->slug = Str::slug($permission->name, '-');
        // $permission->save();
        // $gestorPlataforma->permissions()->attach($permission);
        //
        // $permission = new Permission();
        // $permission->name = 'Actualizar campos de formulario';
        // $permission->slug = Str::slug($permission->name, '-');
        // $permission->save();
        // $gestorPlataforma->permissions()->attach($permission);
        //
        // $permission = new Permission();
        // $permission->name = 'Borrar campos de formulario';
        // $permission->slug = Str::slug($permission->name, '-');
        // $permission->save();
        // $gestorPlataforma->permissions()->attach($permission);


        // Permisos para los formularios

        // $permission = new Permission();
        // $permission->name = 'Crear formularios';
        // $permission->slug = Str::slug($permission->name, '-');
        // $permission->save();
        // $gestorPlataforma->permissions()->attach($permission);
        //
        // $permission = new Permission();
        // $permission->name = 'Leer formularios';
        // $permission->slug = Str::slug($permission->name, '-');
        // $permission->save();
        // $gestorPlataforma->permissions()->attach($permission);
        //
        // $permission = new Permission();
        // $permission->name = 'Actualizar formularios';
        // $permission->slug = Str::slug($permission->name, '-');
        // $permission->save();
        // $gestorPlataforma->permissions()->attach($permission);
        //
        // $permission = new Permission();
        // $permission->name = 'Borrar formularios';
        // $permission->slug = Str::slug($permission->name, '-');
        // $permission->save();
        // $gestorPlataforma->permissions()->attach($permission);
    }
}
