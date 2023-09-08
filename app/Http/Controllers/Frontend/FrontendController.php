<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use App\Call;
use App\Area;
use App\User_type;
use App\Incentive;

use Illuminate\Support\Facades\View;
use App\Application;
use App\Notification;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }


    public function calls()
    {

        $fecha_actual = Carbon::now()->format('Y-m-d');
        // $fecha_actual = Carbon::now()->format('d-m-Y');
        
        $calls = Call::query()
              ->select('id', 'name', 'slug', 'description','start_at','finish_at')
              ->whereRaw("'".$fecha_actual."' BETWEEN start_at and finish_at")
              ->with('incentives', 'incentives.user_types', 'incentives.area')
              ->orderBy('id', 'desc')
              ->get();

        
        return view('frontend.calls.index', compact('calls','fecha_actual'));
    }


    public function call(Request $request, $slug)
    {
        if ($request->isMethod('get')) {
            $call = Call::query()
                ->select('id', 'name', 'description')
                ->with('incentives', 'incentives.user_types')
                ->where('slug', $slug)
                ->firstOrFail();

            $areas = Area::select('id', 'name', 'description')
                ->whereIn('id', $call->incentives->pluck('area_id')->toArray())
                ->orderBy('name', 'asc')
                ->get();

            $user_types = User_type::select('id', 'name', 'description')
                ->where('call_id', $call->id)
                ->orderBy('name', 'asc')
                ->get();

            return view('frontend.calls.call', compact('areas', 'user_types', 'call', 'slug'));
        } elseif ($request->isMethod('post')) {
            $callFull = Call::query()
                ->select('id', 'name', 'description')
                ->with('incentives', 'incentives.user_types')
                ->where('slug', $slug)
                ->firstOrFail();

            $areas = Area::select('id', 'name', 'description')
                ->whereIn('id', $callFull->incentives->pluck('area_id')->toArray())
                ->orderBy('name', 'asc')
                ->get();

            $user_types = User_type::select('id', 'name', 'description')
                ->where('call_id', $callFull->id)
                ->orderBy('name', 'asc')
                ->get();

            $call = Call::query()
                ->select('id', 'name', 'description')
                ->with(['incentives' => function ($query) use ($request) {
                    $query->when($fAreas = $request->areas, function ($query) use ($fAreas) {
                        return $query->whereIn('area_id', $fAreas);
                    });
                    $query->when($fUserTypes = $request->user_types, function ($query) use ($fUserTypes) {
                        return $query->join('incentive_user_type', 'incentives.id', '=', 'incentive_user_type.incentive_id')
                      ->whereIn('incentive_user_type.user_type_id', $fUserTypes)
                      ->select('incentives.*', 'incentive_user_type.incentive_id')->distinct();
                    });
                }, 'incentives.user_types'])
                ->where('slug', $slug)
                ->firstOrFail();

            if ($request->ajax()) {
                return view('frontend.calls.load', compact('areas', 'user_types', 'call', 'slug'));
            }

            return view('frontend.calls.call', compact('areas', 'user_types', 'call', 'slug'));
        }
    }


    public function incentive($call_slug, $incentive_slug)
    {
        $date = new Carbon;

        $call = Call::query()
            ->select('id')
            ->where('slug', $call_slug)
            ->firstOrFail();

        $incentive = Incentive::query()
          ->with('call')
          ->with('user_types')
          ->where('call_id', $call->id)
          ->where('slug', $incentive_slug)
          ->firstOrFail();

        return view('frontend.calls.incentive', compact('incentive', 'date'));
    }
}
