<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Application;
use App\Notification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:aspirante-a-estimulo');
    }

    public function index()
    {
        $applications = Application::select('id')->where('user_id', Auth::user()->id)->get();
        $notifications = Notification::with(['application', 'application.incentive'])->whereIn('application_id', $applications)
                        ->where('title', '<>','Aplicación Calificada')
                        ->get();

        return view('backend.notifications.index', compact('notifications'));
    }

    public function show($id)
    {
        $notification = Notification::find($id);
        $notification->viewed = true;
        $notification->save();

        return view('backend.notifications.show', compact('notification'));
    }
}
