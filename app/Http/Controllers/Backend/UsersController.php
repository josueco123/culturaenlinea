<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;

use App\User;
use App\Role;
use App\Permission;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:administrador');
    }


    public function index()
    {
        $users = User::query()
            ->with(['permissions', 'roles'])
            ->whereHas('roles', function ($query) {
                $query->where('slug', '<>', '');
            })
            ->get();

        return view('backend.users.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('backend.users.create', compact('roles', 'permissions'));
    }


    public function storage(CreateUserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('password');
        $user->save();

        for ($i=0; $i < count($request->roles) ; $i++) {
            $user->roles()->attach($request->roles[$i]);
        }

       if (!is_null($request->permissions)) {
            for ($i=0; $i < count($request->permissions) ; $i++) {
                $user->permissions()->attach($request->permissions[$i]);
            }
        }

        return redirect()->route('backend.users.index')->with('success', 'Se ha creado el usuario satisfactoriamente');
    }


    public function edit($id)
    {
        $user = User::query()
          ->with(['roles', 'permissions'])
          ->where('id', $id)
          ->firstOrFail();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('backend.users.edit', compact('user', 'roles', 'permissions'));
    }


    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $user->roles()->sync($request->roles);
        $user->permissions()->sync($request->permissions);

        return redirect()->route('backend.users.index')->with('success', 'Se ha actualizado el usuario satisfactoriamente');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('backend.users.index')->with('success', 'Se ha eliminado el usuario satisfactoriamente');
    }
}
