<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\UserTypes\CreateUserTypeRequest;
use App\Http\Requests\UserTypes\UpdateUserTypeRequest;
use App\Call;
use App\User_type;

class UserTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:leer-tipos-de-usuario')->only(['index']);
        $this->middleware('permission:crear-tipos-de-usuario')->only(['create', 'storage']);
        $this->middleware('permission:actualizar-tipos-de-usuario')->only(['edit', 'update']);
        $this->middleware('permission:borrar-tipos-de-usuario')->only(['destroy']);

        // $this->middleware('permission:permiso1|permiso2|...');
        // $this->middleware('role:rol1|rol2|...');
    }


    public function index(Request $request)
    {
        $calls = Call::get();
        $call = 0;
        if($request->call){
            $call = $request->call;
        }
        $user_types = User_type::with('call')
            ->where('call_id', $call)
            ->get();

        return view('backend.userTypes.index', compact('calls', 'user_types'));
    }


    public function create(Request $request)
    {
        $call = Call::find($request->call);
        return view('backend.userTypes.create', compact('call'));
    }


    public function storage(CreateUserTypeRequest $request)
    {
        $userType = new User_type;
        $userType->call_id = $request->call;
        $call = $userType->call_id;
        $userType->name = $request->name;
        $userType->slug = Str::slug($request->name, '-');
        $userType->description = $request->description;
        $userType->save();

        return redirect()->route('backend.userTypes.index', compact('call'))->with('success', 'Se ha creado el tipo de usuario satisfactoriamente');
    }


    public function edit($id)
    {
        $user_type = User_type::with('call')
            ->where('id', $id)
            ->firstOrFail();

        return view('backend.userTypes.edit', compact('user_type'));
    }


    public function update(UpdateUserTypeRequest $request, $id)
    {
        $userType = User_type::find($id);
        $userType->call_id = $request->call;
        $call = $userType->call_id;
        $userType->name = $request->name;
        $userType->slug = Str::slug($request->name, '-');
        $userType->description = $request->description;
        $userType->save();

        return redirect()->route('backend.userTypes.index', compact('call'))->with('success', 'Se ha actualizado el tipo de usuario satisfactoriamente');
    }

    public function destroy($id)
    {
        $userType = User_type::find($id);
        $call = $userType->call_id;
        $userType->delete();

        return redirect()->route('backend.userTypes.index', compact('call'))->with('success', 'Se ha eliminado el tipo de usuario satisfactoriamente');
    }
}
