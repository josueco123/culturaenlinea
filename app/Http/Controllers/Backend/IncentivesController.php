<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Http\Requests\Incentives\CreateIncentiveRequest;
use App\Http\Requests\Incentives\UpdateIncentiveRequest;

use App\Call;
use App\Incentive;
use App\Area;
use App\Incentive_type;
use App\Line_action;
use App\User_type;

class IncentivesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:leer-estimulos')->only(['index']);
        $this->middleware('permission:crear-estimulos')->only(['create', 'storage']);
        $this->middleware('permission:actualizar-estimulos')->only(['edit', 'update']);
        $this->middleware('permission:borrar-estimulos')->only(['destroy']);

        // $this->middleware('permission:permiso');
        // $this->middleware('role:rol1|rol2|...');
    }


    public function index(Request $request)
    {
        $calls = Call::get();
        $call = 0;
        $valSelectId = 0;

        if($request->call){
            $call = $request->call;
            $valSelectId = $request->call;

        }
        $incentives = Incentive::with(['call', 'area', 'type', 'line_action', 'user_types'])
            ->where('call_id', $call)
            ->orderBy('id', 'desc')
            ->get();

        
        return view('backend.incentives.index', compact('calls', 'incentives','call','valSelectId'));
    }


    public function create(Request $request, $id)
    {   
        $id = $id;

        $calls = Call::select('id', 'name')->where('id',$id)->get();
        $areas = Area::select('id', 'name')->get();
        $incentive_types = Incentive_type::select('id', 'name')->get();
        $lines_action = Line_action::select('id', 'name')->get();
        $user_types = User_type::select('id', 'name')->where('call_id', $id)->get();
        

        return view('backend.incentives.create', compact( 'calls', 'areas', 'incentive_types', 'lines_action', 'user_types'));
    }

    public function selectTypeUser(Request $request)
    {
        if ($request) {
            $selectTypeUser = User_type::select('id', 'name')->get();
        }

        return ['selectTypeUser' => $selectTypeUser ];
    }

    public function storage(CreateIncentiveRequest $request)
    {
        $incentive = new Incentive;
        $incentive->call_id = $request->call;
        $incentive->area_id = $request->area;
        $incentive->type_id = $request->incentive_type;
        $incentive->line_id = $request->line_action;
        $incentive->code = $request->code;
        $incentive->name = $request->name;
        $incentive->start_at = $request->start_at;
        $incentive->finish_at = $request->finish_at;
        $incentive->value = $request->value;
        $incentive->quantity = $request->quantity;
        $incentive->execution_start = $request->execution_start;
        $incentive->execution_finish = $request->execution_finish;
        $incentive->slug = Str::slug($request->name, '-');
        $incentive->description = $request->description;
        $incentive->information = $request->information;
        $incentive->method = '';
        $incentive->contact = '';
        $incentive->save();

        

        for ($i=0; $i < count($request->user_types) ; $i++) {
            
            
            $incentive->user_types()->attach($request->user_types[$i]);
        }


        return redirect()->route('backend.incentives.index')->with('success', 'Se ha creado el estímulo satisfactoriamente');
    }


    public function edit($id)
    {

        $incentive = Incentive::query()
            ->with(['call', 'area', 'type', 'line_action', 'user_types'])
            ->where('id', $id)
            ->firstOrFail();


        $calls = Call::select('id', 'name')->where('id',$incentive->call->id)->get();
        $areas = Area::select('id', 'name')->get();
        $incentive_types = Incentive_type::select('id', 'name')->get();
        $lines_action = Line_action::select('id', 'name')->get();
        $user_types = User_type::select('id', 'name')->where('call_id', $incentive->call->id)->get();

        

        return view('backend.incentives.edit', compact('calls', 'areas', 'incentive_types', 'lines_action', 'user_types', 'incentive'));
    }


    public function update(UpdateIncentiveRequest $request, $id)
    {
        $incentive = Incentive::find($id);
        $incentive->call_id = $request->call;
        $incentive->area_id = $request->area;
        $incentive->type_id = $request->incentive_type;
        $incentive->line_id = $request->line_action;
        $incentive->code = $request->code;
        $incentive->name = $request->name;
        $incentive->start_at = $request->start_at;
        $incentive->finish_at = $request->finish_at;
        $incentive->value = $request->value;
        $incentive->quantity = $request->quantity;
        $incentive->execution_start = $request->execution_start;
        $incentive->execution_finish = $request->execution_finish;
        $incentive->slug = Str::slug($request->name, '-');
        $incentive->description = $request->description;
        $incentive->information = $request->information;
        $incentive->method = '';
        $incentive->contact = '';
        $incentive->save();

        $incentive->user_types()->sync($request->user_types);

        return redirect()->route('backend.incentives.index')->with('success', 'Se ha actualizado el estímulo satisfactoriamente');
    }

    public function destroy($id)
    {
        $incentive = Incentive::find($id);

        $incentive->delete();

        return redirect()->route('backend.incentives.index')->with('success', 'Se ha eliminado el estímulo satisfactoriamente');
    }
}
