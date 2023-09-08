<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\LinesAction\CreateLineActionRequest;
use App\Http\Requests\LinesAction\UpdateLineActionRequest;

use App\Line_action;

class LinesActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:leer-lineas-de-accion')->only(['index']);
        $this->middleware('permission:crear-lineas-de-accion')->only(['create', 'storage']);
        $this->middleware('permission:actualizar-lineas-de-accion')->only(['edit', 'update']);
        $this->middleware('permission:borrar-lineas-de-accion')->only(['destroy']);

        // $this->middleware('permission:permiso');
        // $this->middleware('role:rol1|rol2|...');
    }


    public function index()
    {
        $lines_action = Line_action::all();

        return view('backend.linesAction.index', compact('lines_action'));
    }


    public function create()
    {
        return view('backend.linesAction.create');
    }


    public function storage(CreateLineActionRequest $request)
    {
        $lineAction = new Line_action;
        $lineAction->name = $request->name;
        $lineAction->description = $request->description;
        $lineAction->save();

        return redirect()->route('backend.linesAction.index')->with('success', 'Se ha creado la línea de acción satisfactoriamente');
    }


    public function edit($id)
    {
        $line_action = Line_action::query()
            ->select('id', 'name', 'description')
            ->where('id', $id)
            ->firstOrFail();

        return view('backend.linesAction.edit', compact('line_action'));
    }


    public function update(UpdateLineActionRequest $request, $id)
    {
        $lineAction = Line_action::find($id);
        $lineAction->name = $request->name;
        $lineAction->description = $request->description;
        $lineAction->save();

        return redirect()->route('backend.linesAction.index')->with('success', 'Se ha actualizado la línea de acción satisfactoriamente');
    }

    public function destroy($id)
    {
        $line_action = Line_action::find($id);
        $line_action->delete();

        return redirect()->route('backend.linesAction.index')->with('success', 'Se ha eliminado la línea de acción satisfactoriamente');
    }
}
