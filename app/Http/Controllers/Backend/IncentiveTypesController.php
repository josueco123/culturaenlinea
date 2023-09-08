<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\IncentiveTypes\CreateIncentiveTypeRequest;
use App\Http\Requests\IncentiveTypes\UpdateIncentiveTypeRequest;

use App\Incentive_type;

class IncentiveTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:leer-tipos-de-estimulo')->only(['index']);
        $this->middleware('permission:crear-tipos-de-estimulo')->only(['create', 'storage']);
        $this->middleware('permission:actualizar-tipos-de-estimulo')->only(['edit', 'update']);
        $this->middleware('permission:borrar-tipos-de-estimulo')->only(['destroy']);

        // $this->middleware('permission:permiso');
        // $this->middleware('role:rol1|rol2|...');
    }


    public function index()
    {
        $incentive_types = Incentive_type::all();

        return view('backend.incentiveTypes.index', compact('incentive_types'));
    }


    public function create()
    {
        return view('backend.incentiveTypes.create');
    }


    public function storage(CreateIncentiveTypeRequest $request)
    {
        $incentiveType = new Incentive_type;
        $incentiveType->name = $request->name;
        $incentiveType->description = $request->description;
        $incentiveType->save();

        return redirect()->route('backend.incentiveTypes.index')->with('success', 'Se ha creado el tipo de estímulo satisfactoriamente');
    }


    public function edit($id)
    {
        $incentive_type = Incentive_type::query()
            ->select('id', 'name', 'description')
            ->where('id', $id)
            ->firstOrFail();

        return view('backend.incentiveTypes.edit', compact('incentive_type'));
    }


    public function update(UpdateIncentiveTypeRequest $request, $id)
    {
        $incentiveType = Incentive_type::find($id);
        $incentiveType->name = $request->name;
        $incentiveType->description = $request->description;
        $incentiveType->save();

        return redirect()->route('backend.incentiveTypes.index')->with('success', 'Se ha actualizado el tipo de estímulo satisfactoriamente');
    }

    public function destroy($id)
    {
        $incentive_type = Incentive_type::find($id);
        $incentive_type->delete();

        return redirect()->route('backend.incentiveTypes.index')->with('success', 'Se ha eliminado el tipo de estímulo satisfactoriamente');
    }
}
