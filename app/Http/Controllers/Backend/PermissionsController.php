<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Permission;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:administrador');
    }

    public function index()
    {
        $permissions = Permission::all();

        return view('backend.permissions.index', compact('permissions'));
    }
}
