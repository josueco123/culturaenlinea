<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Mail;
use Illuminate\Support\Facades\Auth;
use DB;

use App\Call;
use App\Application;
use App\User_type;
use App\Register;
use App\Form;
use App\Field;
use App\Status_type;
use App\Notification;
use App\Grade_application;

use App\Log;

class ApplicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:leer-aplicaciones')->only(['index', 'show']);
        // $this->middleware('permission:crear-aplicaciones')->only(['create', 'storage']);
        $this->middleware('permission:actualizar-aplicaciones')->only(['edit', 'update']);
        $this->middleware('permission:borrar-aplicaciones')->only(['destroy']);

        // $this->middleware('permission:permiso');
        // $this->middleware('role:rol1|rol2|...');
    }


    public function index(Request $request)
    {
        if ($request->has('clearfilters')) {
            session()->forget('filters');
            return redirect()->back();
        }

        if ($request->has('call') || $request->has('incentive') || $request->has('user_type') || $request->has('status_type')) {
            session()->put('filters', $request->except('_token'));
        }

        if (empty($request->except('_token')) && session()->has('filters')) {
            $request->merge(\Session::get('filters'));
        }

        $applications = Application::with(['user', 'status', 'call', 'incentive', 'incentive.area', 'incentive.line_action', 'user_type', 'grade_application'])
          ->when($request->call, function ($query) use ($request) {
              if ($request->user_type != 0) {
                  return $query->where('call_id', $request->call);
              }
          })
          ->when($request->incentive, function ($query) use ($request) {
              if ($request->incentive != 0) {
                  return $query->where('incentive_id', $request->incentive);
              }else{
                $query->where('call_id',$request->call);
                $query->where('incentive_id','LIKE', '%%');
                return $query;
              }
          })
          ->when($request->user_type, function ($query) use ($request) {
              if ($request->user_type != 0) {
                  return $query->where('user_type_id', $request->user_type);
              }
          })
          ->when($request->status_type, function ($query) use ($request) {
              if ($request->status_type != 0) {
                  return $query->where('status_type_id', $request->status_type);
              }
          })
          ->orderBy('id', 'desc')
          ->get();

        $calls = Call::query()
            ->select('id', 'name')
            ->with('incentives')
            ->get();

        $user_types = User_type::select('id', 'name')->get();
                $status_types = Status_type::select('id', 'name')->get();

                if ($request->ajax()) {
                            return view('backend.applications.load', compact('applications', 'calls', 'user_types', 'status_types'));
                        }

      foreach($applications as $key => $application){
        if ($application->call == null){
        	unset($applications[$key]);
      	}
        if ($application->incentive == null){
        	unset($applications[$key]);
      	}
      }


        return view('backend.applications.index', compact('applications', 'calls', 'user_types', 'status_types'));
    }


    public function show(Request $request, $id)
    {
        $application = Application::find($id);
        $registers = Register::where('application_id', $application->id)->get();
        $user_type = User_type::with(['forms', 'forms.fields'])->where('id', $application->user_type_id)->first();
        $forms = $user_type->forms;


        $modulo_estimulos_registers= DB::table('registers as r')
                                ->select('r.application_id','r.form_id','r.field_id','r.data','r.state')
                                ->join('form_incetive as f','r.form_id','=','f.form_id')
                                ->where('r.application_id',$application->id)
                                ->groupBy('r.application_id','r.form_id','r.field_id','r.data','r.state')
                                ->get();

        $modulo_estimulos_field = DB::table('fields')
                    ->orderBy('order', 'asc')
                    ->get();


        if ($request) {             
            $ruta = $request->root();
            // $ruta = $request->root();   
        }

        return view('backend.applications.show', compact('application', 'registers', 'forms','ruta','modulo_estimulos_field','modulo_estimulos_registers'));

    }

    public function export(Request $request)
    {

        $applications = Application::with(['user', 'status', 'call', 'incentive', 'incentive.area', 'incentive.line_action', 'user_type', 'grade_application', 'register'])
          ->where('user_type_id', $request->user_type)
          ->where('call_id', $request->call)
          ->orderBy('id', 'desc')
          ->get();

        $calls = Call::query()
            ->select('id', 'name')
            ->with('incentives')
            ->get();

        $user_types = User_type::select('id', 'name')->get();

        $user_type_select = User_type::where('id', $request->user_type)
            ->with('forms.fields')
            ->get();

        $status_types = Status_type::select('id', 'name')->get();

        $headerKeys = $this->generateHeaderKeys($user_type_select);
        $dataHeader = $this->generateHeader($user_type_select);
        $dataAplications = $this->generteData($applications,$headerKeys);

        if ($request->ajax()) {
            
            
            return view('backend.applications.exportload', compact('dataAplications', 'dataHeader'));
        }

     foreach($applications as $key => $application){
        if ($application->call == null){
        	unset($applications[$key]);
      	}
        if ($application->incentive == null){
        	unset($applications[$key]);
      	}
      }

        return view('backend.applications.export', compact('applications', 'calls', 'user_types', 'user_type_select', 'status_types', 'dataAplications', 'dataHeader'));
    }

    public function grade($id)
    {
        $application = Application::find($id);
        $grade_application = Grade_application::with('grade_criteria', 'user')->where(['application_id' => $application->id])->get();
        return view('backend.applications.grade', compact('application', 'grade_application'));
    }


    public function edit(Request $request,$id)
    {
        $application = Application::find($id);
        $registers = Register::where('application_id', $application->id)->get();
        $user_type = User_type::with(['forms', 'forms.fields'])->where('id', $application->user_type_id)->first();
        $forms = $user_type->forms;

        $statuses = Status_type::select('id', 'name')->get();



        $modulo_estimulos_registers= DB::table('registers as r')
                                ->select('r.application_id','r.form_id','r.field_id','r.data','r.state','r.id')
                                ->join('form_incetive as f','r.form_id','=','f.form_id')
                                ->where('r.application_id',$application->id)
                                ->groupBy('r.application_id','r.form_id','r.field_id','r.data','r.state','r.id')
                                ->get();

        $modulo_estimulos_field = DB::table('fields')
                    ->orderBy('order', 'asc')
                    ->get();


        if ($request) {             
            $ruta = $request->root();
            // $ruta = $request->root();   
        }


        return view('backend.applications.edit', compact('application', 'registers', 'forms', 'statuses','ruta','modulo_estimulos_field','modulo_estimulos_registers'));
    }


    public function update(Request $request, $id)
    {

      $requestReg = $request->except(['_token', '_method', 'app_status', 'title', 'message', 'msg', 'files']);

      if (in_array(2, $requestReg)) {
          foreach ($requestReg as $key => $state) {
              if ($state == 2) {
                  $register = Register::find($key);

                  $log = new Log;
                  $log->log_user_id = auth()->user()->id;
                  $log->log_ip_user = request()->ip();
                  $log->log_action = 'Actualización del estado del campo: Tabla registros';
                  $log->log_id_register = $register->id;
                  $log->log_old_data = $register->state;
                  $log->log_new_data = 2;
                  $log->save();

                  $register->state = 2;
                  $register->save();
              }
          }
        }

          $application = Application::with(['user', 'status', 'call', 'incentive', 'incentive.area', 'user_type'])
                      ->where('id', $id)
                      ->firstOrFail();

          $log = new Log;
          $log->log_user_id = auth()->user()->id;
          $log->log_ip_user = request()->ip();
          $log->log_action = 'Actualización del estado de la aplicación: Tabla aplicaciones';
          $log->log_id_register = $application->id;
          $log->log_old_data = $application->status_type_id;
          $log->log_new_data = $request->app_status;
          $log->save();

          $stado_old = $application->status_type_id;
          $application->status_type_id = $request->app_status;
          $application->save();

          $stados = [
            1 => 'Iniciado',
            2 => 'Postulado',
            3 => 'Debe subsanar documentos administrativos',
            4 => 'Documentos Subsanados',
            5 => 'Rechazado',
            6 => 'En estudio',
            7 => 'Participación finalizada',
            8 => 'Candidato a ganador',
            9 => 'Candidato a suplente',
            10 => 'Ganador',
          ];

          $link    = "";
          $titulo  = "Actualización de aplicación: " . $request->title;
          $mensaje = "Se actualizo la aplicación código: <b>" . $application->code . " </b><br>"
                    ."Cambio de estado: <b>" . $stados[$stado_old] . " </b>"
                    ." al estado: <b>" . $stados[$request->app_status] . " </b><br>"
                    . $request->msg;

            if ($request->app_status == 3) {
              $fecha = "";
              foreach ($application->updated_at as $key => $updated_at) {
                if ($key == 'date') {
                  $fecha = date( "d/m/Y", ( strtotime(date( "m/d/Y", strtotime($updated_at))) + 259200));
                }
              }

              $mensaje = "Se actualizo la aplicación código: <b>" . $application->code . " </b><br>"
                        ."Cambio de estado: <b>" . $stados[$stado_old] . " </b>"
                        ." al estado: <b>" . $stados[$request->app_status] . " </b><br>"
                        ." Fecha límite para realizar cambios: <b>" . $fecha . " </b><br>"
                        . $request->msg;

            }

            if ($request->app_status == 7) {
                $link = "<br>Estimado aspirante puede revisar su calificación ingresando a la plataforma <a href='https://www.culturaenlineacali.co'> https://www.culturaenlineacali.co con su usuario y contraseña <br>";
            }



          $notification = new Notification;
          $notification->application_id = $id;
          $notification->title = $titulo;
          $notification->message = $mensaje;
          $notification->viewed = false;
          $notification->save();

          $log = new Log;
          $log->log_user_id = auth()->user()->id;
          $log->log_ip_user = request()->ip();
          $log->log_action = 'Envío de notificación a usuario';
          $log->log_id_register = $notification->id;
          $log->log_old_data = '';
          $log->log_new_data = 'Título: ' .$notification->title . '. Mensaje: ' . $notification->message;
          $log->save();

          $subject = $titulo;
          $for = $application->user->email;


          if ($request->app_status == 7) {

            $mensaje = "Se actualizo la aplicación código: <b>" . $application->code . " </b><br>"
                    ."Cambio de estado: <b>" . $stados[$stado_old] . " </b>"
                    ." al estado: <b>" . $stados[$request->app_status] . " </b><br>"
                    ."<br>Estimado aspirante puede revisar su calificación ingresando a la plataforma <a href='https://www.culturaenlineacali.co'> https://www.culturaenlineacali.co con su usuario y contraseña <br>"
                    . $request->msg;


            $data = [ 'title' => $titulo,
                    'msg'   => $mensaje
                  ]; 
                  
          }else{
            $data = [ 'title' => $titulo,
                    'msg'   => $mensaje
                  ];  
          }
          

          Mail::send('emails.notificationApp', $data, function ($msg) use ($subject, $for) {
              $msg->from("convocatoriaestimulos@cali.gov.co", "Secretaría de cultura, Alcaldía de Santiago de Cali");
              $msg->subject($subject);
              $msg->to($for);
          });
          return redirect()->back()->with('success', 'Se actualizo la aplicaión y se notifico al usuario.');


    }
  
  
    public function destroy($id)
    {
        $application = Application::find($id);

        $log = new Log;
        $log->log_user_id = auth()->user()->id;
        $log->log_ip_user = request()->ip();
        $log->log_action = 'Eliminación de aplicación de usuario: Tabla aplicaciones';
        $log->log_id_register = $application->id;
        $log->log_old_data = '';
        $log->log_new_data = '';
        $log->save();

        $application->delete();

        return redirect()->back()->with('success', 'Se ha eliminado la aplicación satisfactoriamente');
    }

    public function generateHeaderKeys($user_type_select)
    {
       
        $header = [];
        
        if (count($user_type_select) > 0){
            foreach ($user_type_select[0]->forms as $form){
                foreach ($form->fields as $field){
                    array_push($header,$field->id);
                }
            }
        }
        

        return $header;
                  
    }

    public function generateHeader($user_type_select)
    {
         $header = [
            'Código', 'Nombre de usuario', 'Correo del usuario', 'Convocatoria','Área',
            'Linea de acción', 'Estímulo', 'Tipo de usuario', 'Fecha de aplicación',
            'Fecha de actualizacion', 'Estado', 'Puntuación'
            ];
        
        
        if (count($user_type_select) > 0){
            foreach ($user_type_select[0]->forms as $form){
                foreach ($form->fields as $field){
                    array_push($header,$field->label);
                }
            }
        }

        return $header;
    }

    public function generteData($applications,$fieldKeys)
    {
        $applicationData = [];
        $applicationcurrtent = [];
        $fillData = false;

        foreach ($applications as $application)
        {
            array_push($applicationcurrtent, $application->code);
            array_push($applicationcurrtent, $application->user->name);
            array_push($applicationcurrtent, $application->user->email);
            array_push($applicationcurrtent, $application->call->name);
            array_push($applicationcurrtent, $application->incentive->area->name);
            array_push($applicationcurrtent, $application->incentive->line_action->name);
            array_push($applicationcurrtent, $application->incentive->code . ' - '. $application->incentive->nam);
            array_push($applicationcurrtent, $application->user_type->name);
            array_push($applicationcurrtent, $application->created_at);
            array_push($applicationcurrtent, $application->updated_at);
            array_push($applicationcurrtent, $application->status->name);

                $score = 0;
                $grade= 0;
                if (count($application->grade_application) > 0) {
                    foreach ($application->grade_application as $key => $grade_application) {
                      $score = $score + $grade_application->score;
                      $grade = $grade + 1;
                    }

                    $score = ($score / $grade);

                }
                $cantGrade = $grade > 0 ? $score .' -  Por: '.$grade .'Jurados' : $score;

                array_push($applicationcurrtent, $cantGrade);  
            
                for($i = 0; $i < count($fieldKeys); $i++){

                    foreach ($application->register as $register){
                        
                        if ($fieldKeys[$i] == $register->field_id){
                            if(str_contains($register->data,'applications')){
                                array_push($applicationcurrtent, 'https://www.culturaenlineacali.com/storage/'.$register->data);
                                
                            }else{
                                array_push($applicationcurrtent, $register->data);
                            }
                            
                            $fillData = true;
                        }
                    }

                    if($fillData == false){
                        array_push($applicationcurrtent, 'No registra');
                    }
                    
                    $fillData = false;
                }
                array_push($applicationData, $applicationcurrtent);   
                $applicationcurrtent = [];
        }

        

        return $applicationData;

    }

    
}
