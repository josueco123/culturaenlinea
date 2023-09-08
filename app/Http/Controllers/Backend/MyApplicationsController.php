<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use DB;

use App\Application;
use App\User_type;
use App\Register;
use App\Grade_application;
use App\User;
use App\Role;
use App\Permission;

class MyApplicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:aspirante-a-estimulo');
    }

    public function index(Request $request)
    {
        
      $applications = Application::with(['incentive', 'user_type', 'call', 'status', 'grade_application'])->where('user_id', Auth::user()->id)->get();
/*
        $users = User::query()
            ->with('roles')
            ->whereHas('roles', function ($query) {
                $query->where('slug', '<>', '');
                $query->Where('slug', '<>','aspirante-a-estimulo');
            })
            ->where('id', Auth::User()->id)
            ->first();*/
            
                              
            
        

      
      foreach($applications as $key => $application){
        if ($application->call == null){
        	unset($applications[$key]);
      	}
        if ($application->incentive == null){
        	unset($applications[$key]);
      	}
      }
     
        return view('backend.myApplications.index', compact('applications'));
    }

    public function show(Request $request, $id)
    {
        $application = Application::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        $registers = Register::where('application_id', $application->id)->get();
        $user_type = User_type::with(['forms', 'forms.fields'])->where('id', $application->user_type_id)->first();


        $modulo_estimulos_registers= DB::table('registers as r')
                                ->select('r.application_id','r.form_id','r.field_id','r.data')
                                ->join('form_incetive as f','r.form_id','=','f.form_id')
                                ->where('r.application_id',$application->id)
                                ->groupBy('r.application_id','r.form_id','r.field_id','r.data')
                                ->get();

        // dd($modulo_estimulos_registers);
        

        $modulo_estimulos_field = DB::table('fields')
                    ->orderBy('order', 'asc')
                    ->get();


        if ($request) {             
            $ruta = $request->root();
            // $ruta = $request->root();   
        }

        $forms = $user_type->forms;

        return view('backend.myApplications.show', compact('application', 'registers', 'forms','ruta','modulo_estimulos_field','modulo_estimulos_registers'));
    }

    public function grade($id)
    {
        $application = Application::find($id);
        $grade_application = Grade_application::with('grade_criteria', 'user')->where(['application_id' => $application->id])->get();
        return view('backend.myApplications.grade', compact('application', 'grade_application'));
    }
}
