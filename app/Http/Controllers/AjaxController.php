<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Incentive;

class AjaxController extends Controller
{
    public function getIncentives(Request $request)
    {
        if ($request->ajax()) {
            $incentives = Incentive::query()
                ->select('id', 'name')
                ->where('call_id', $request->call_id)
                ->get();
            return response()->json($incentives);
        } else {
            return abort(404);
        }
    }
}
