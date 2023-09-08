<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use\App\User;
use App\Permission;
use App\Role;

class UsersTableSeeder extends Seeder
{

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {

      /*
      | Usuarios de la aplicación
      |--------------------------------------------------------------------------*/

        $user = new User;
        $user->name = 'Juan Felipe';
        $user->email = 'pipe.8806@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $role = Role::where('slug', 'administrador')->first();
        $user->roles()->attach($role);

        $user = new User;
        $user->name = 'Luis Alejandro';
        $user->email = 'bioalejandrogomez@hotmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $role = Role::where('slug', 'administrador')->first();
        $user->roles()->attach($role);

        $user = new User;
        $user->name = 'Cristian David';
        $user->email = 'cdvasquez7@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $role = Role::where('slug', 'administrador')->first();
        $user->roles()->attach($role);
    }
}
