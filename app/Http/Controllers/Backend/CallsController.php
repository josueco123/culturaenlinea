<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Http\Requests\Calls\CreateCallRequest;
use App\Http\Requests\Calls\UpdateCallRequest;

use App\Call;

class CallsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:leer-convocatorias')->only(['index']);
        $this->middleware('permission:crear-convocatorias')->only(['create', 'storage']);
        $this->middleware('permission:actualizar-convocatorias')->only(['edit', 'update']);
        $this->middleware('permission:borrar-convocatorias')->only(['destroy']);

        // $this->middleware('permission:permiso');
        // $this->middleware('role:rol1|rol2|...');
    }


    public function index()
    {
        $calls = Call::all();

        return view('backend.calls.index', compact('calls'));
    }


    public function create()
    {
        return view('backend.calls.create');
    }


    public function storage(CreateCallRequest $request)
    {
        $call = new Call;
        $call->name = $request->name;
        $call->slug = Str::slug($request->name, '-');
        $call->description = $request->description;
        $call->start_at = $request->start_at;
        $call->finish_at = $request->finish_at;
        $call->save();

        return redirect()->route('backend.calls.index')->with('success', 'Se ha creado la convocatoria satisfactoriamente');
    }


    public function edit($id)
    {
        $call = Call::query()
            ->select('id', 'name', 'description', 'start_at', 'finish_at')
            ->where('id', $id)
            ->firstOrFail();

        return view('backend.calls.edit', compact('call'));
    }


    public function update(UpdateCallRequest $request, $id)
    {
        $call = Call::find($id);
        $call->name = $request->name;
        $call->description = $request->description;
        $call->start_at = $request->start_at;
        $call->finish_at = $request->finish_at;
        $call->save();

        return redirect()->route('backend.calls.index')->with('success', 'Se ha actualizado la convocatoria satisfactoriamente');
    }

    public function destroy($id)
    {
        $call = Call::find($id);
        $call->delete();

        return redirect()->route('backend.calls.index')->with('success', 'Se ha eliminado la convocatoria satisfactoriamente');
    }
}
