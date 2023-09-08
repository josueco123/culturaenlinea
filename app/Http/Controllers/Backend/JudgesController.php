<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Application;

class JudgesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:asignar-juez');
    }


    public function index()
    {
        $users = User::query()
            ->with('roles','applicationJudges')
            ->whereHas('roles', function ($query) {
                $query->where('slug', '=', 'juez');
            })
            ->get();

        return view('backend.judges.index', compact('users'));
    }


    public function create($id)
    {
        $applications = Application::with(['user', 'status', 'call', 'incentive', 'incentive.area', 'incentive.line_action', 'user_type' , 'judges'])
            ->orderBy('id', 'desc')
            ->where('status_type_id', 6)
            ->get();

        return view('backend.judges.create', compact('applications' , 'id'));
    }


    public function storage(Request $request)
    {


        DB::table('application_judge')->where('user_id', $request->user_id)->delete();

        if ($request->aplicaciones[0] != null) {
          $aplicaciones = explode(",", $request->aplicaciones[0]);

          foreach ($aplicaciones as $key => $value) {
            DB::table('application_judge')->insert(
                ['application_id' => $value,
                 'user_id' => $request->user_id]
            );
          }
        }else {
          return redirect()->back()->with(['error' => 'Debe seleccionar por lo menos una aplicación']);
        }

        return redirect()->back()->with(['success' => 'Se asignaron los persimos selecciónados']);

    }
}
