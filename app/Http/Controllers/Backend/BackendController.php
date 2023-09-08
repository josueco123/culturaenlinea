<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:permiso1|permiso2|...');
        // $this->middleware('role:rol1|rol2|...');
    }


    public function index()
    {
        if (auth()->user()->hasRole(... ['aspirante-a-estimulo'])) {
            return redirect()->route('backend.myAplications.index');
        }

        return view('backend.index');
    }
}
