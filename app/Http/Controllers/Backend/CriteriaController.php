<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Http\Requests\Criteria\CreateCriteriaRequest;
use App\Http\Requests\Criteria\UpdateCriteriaRequest;

use App\Call;
use App\Incentive;
use App\Criteria;


class CriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:crear-estimulos');
    }


    public function index()
    {
        $calls = Call::select('id', 'name')->get();
        $incentives = Incentive::select('id', 'code' ,'name')->get();

        return view('backend.criteria.index', compact('incentives', 'calls'));
    }


    public function show(Request $request)
    {
        $calls = Call::select('id', 'name')->get();
        $incentives = Incentive::select('id', 'code' ,'name')->get();

        if ($request->has('incentive')){
          $criteria = Criteria::where('incentive_id',$request->incentive)->get();
        }else{
          $criteria = Criteria::where('incentive_id',0)->get();
        }

        return view('backend.criteria.index', compact('incentives', 'calls', 'criteria'));
    }


    public function create(CreateCriteriaRequest $request)
    {
        $criteria = new Criteria;
        $criteria->incentive_id = $request->incentive;
        $criteria->name = $request->name;
        $criteria->description = $request->description;
        $criteria->value = $request->value;
        $criteria->save();

        $calls = Call::select('id', 'name')->get();
        $incentives = Incentive::select('id', 'code' ,'name')->get();

        if ($request->has('incentive')){
          $criteria = Criteria::where('incentive_id',$request->incentive)->get();
        }else{
          $criteria = Criteria::where('incentive_id',0)->get();
        }

        return view('backend.criteria.index', compact('incentives', 'calls', 'criteria'));
    }

    public function edit($id)
    {
        // $calls = Call::select('id', 'name')->get();
        // $areas = Area::select('id', 'name')->get();
        // $incentive_types = Incentive_type::select('id', 'name')->get();
        // $lines_action = Line_action::select('id', 'name')->get();
        // $user_types = User_type::select('id', 'name')->get();
        //
        // $incentive = Incentive::query()
        //     ->with(['call', 'area', 'type', 'line_action', 'user_types'])
        //     ->where('id', $id)
        //     ->firstOrFail();
        //
        // return view('backend.incentives.edit', compact('calls', 'areas', 'incentive_types', 'lines_action', 'user_types', 'incentive'));
    }


    public function update(UpdateIncentiveRequest $request, $id)
    {
        // $incentive = Incentive::find($id);
        // $incentive->call_id = $request->call;
        // $incentive->area_id = $request->area;
        // $incentive->type_id = $request->incentive_type;
        // $incentive->line_id = $request->line_action;
        // $incentive->code = $request->code;
        // $incentive->name = $request->name;
        // $incentive->start_at = $request->start_at;
        // $incentive->finish_at = $request->finish_at;
        // $incentive->value = $request->value;
        // $incentive->quantity = $request->quantity;
        // $incentive->execution_start = $request->execution_start;
        // $incentive->execution_finish = $request->execution_finish;
        // $incentive->slug = Str::slug($request->name, '-');
        // $incentive->description = $request->description;
        // $incentive->information = $request->information;
        // $incentive->method = '';
        // $incentive->contact = '';
        // $incentive->save();
        //
        // $incentive->user_types()->sync($request->user_types);
        //
        // return redirect()->route('backend.incentives.index')->with('success', 'Se ha actualizado el estímulo satisfactoriamente');
    }

    public function destroy(Request $request)
    {
        $criteria = Criteria::find($request->id);
        $criteria->delete();

        $calls = Call::select('id', 'name')->get();
        $incentives = Incentive::select('id', 'code' ,'name')->get();

        if ($request->has('incentive')){
          $criteria = Criteria::where('incentive_id',$request->incentive)->get();
        }else{
          $criteria = Criteria::where('incentive_id',0)->get();
        }

        return view('backend.criteria.index', compact('incentives', 'calls', 'criteria'));
    }

}
