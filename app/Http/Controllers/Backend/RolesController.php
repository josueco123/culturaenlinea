<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Http\Requests\Roles\CreateRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;

use App\Role;
use App\Permission;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:administrador');
    }


    public function index()
    {
        $roles = Role::with('permissions')->get();

        return view('backend.roles.index', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::all();
        return view('backend.roles.create', compact('permissions'));
    }


    public function storage(CreateRoleRequest $request)
    {
        $role = new Role;
        $role->name = $request->name;
        $role->slug = Str::slug($request->name, '-');
        $role->save();

        for ($i=0; $i < count($request->permissions) ; $i++) {
            $role->permissions()->attach($request->permissions[$i]);
        }

        return redirect()->route('backend.roles.index')->with('success', 'Se ha creado el rol satisfactoriamente');
    }


    public function edit($id)
    {
        $role = Role::query()
            ->with('permissions')
            ->where('id', $id)
            ->firstOrFail();

        $permissions = Permission::all();

        return view('backend.roles.edit', compact('role', 'permissions'));
    }


    public function update(UpdateRoleRequest $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->slug = Str::slug($request->name, '-');
        $role->save();

        $role->permissions()->sync($request->permissions);

        return redirect()->route('backend.roles.index')->with('success', 'Se ha actualizado el rol satisfactoriamente');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('backend.roles.index')->with('success', 'Se ha eliminado el rol satisfactoriamente');
    }
}
