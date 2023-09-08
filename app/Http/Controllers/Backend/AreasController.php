<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Areas\CreateAreaRequest;
use App\Http\Requests\Areas\UpdateAreaRequest;

use App\Area;

class AreasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:leer-areas')->only(['index']);
        $this->middleware('permission:crear-areas')->only(['create', 'storage']);
        $this->middleware('permission:actualizar-areas')->only(['edit', 'update']);
        $this->middleware('permission:borrar-areas')->only(['destroy']);

        // $this->middleware('permission:permiso');
        // $this->middleware('role:rol1|rol2|...');
    }


    public function index()
    {
        $areas = Area::all();

        return view('backend.areas.index', compact('areas'));
    }


    public function create()
    {
        return view('backend.areas.create');
    }


    public function storage(CreateAreaRequest $request)
    {
        $area = new Area;
        $area->name = $request->name;
        $area->description = $request->description;
        $area->save();

        return redirect()->route('backend.areas.index')->with('success', 'Se ha creado el área satisfactoriamente');
    }


    public function edit($id)
    {
        $area = Area::query()
            ->select('id', 'name', 'description')
            ->where('id', $id)
            ->firstOrFail();

        return view('backend.areas.edit', compact('area'));
    }


    public function update(UpdateAreaRequest $request, $id)
    {
        $area = Area::find($id);
        $area->name = $request->name;
        $area->description = $request->description;
        $area->save();

        return redirect()->route('backend.areas.index')->with('success', 'Se ha actualizado el área satisfactoriamente');
    }

    public function destroy($id)
    {
        $Area = Area::find($id);
        $Area->delete();

        return redirect()->route('backend.areas.index')->with('success', 'Se ha eliminado el área satisfactoriamente');
    }
}
