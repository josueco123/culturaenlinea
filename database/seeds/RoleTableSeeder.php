<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Permission;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        | Roles de la aplicación
        |--------------------------------------------------------------------------*/

        $role = new Role;
        $role->name = 'Administrador';
        $role->slug = Str::slug($role->name, '-');
        $role->save();

        $role = new Role;
        $role->name = 'Gestor administrativo';
        $role->slug = Str::slug($role->name, '-');
        $role->save();

        $role = new Role;
        $role->name = 'Juez';
        $role->slug = Str::slug($role->name, '-');
        $role->save();

        $role = new Role;
        $role->name = 'Aspirante a estímulo';
        $role->slug = Str::slug($role->name, '-');
        $role->save();
    }
}
