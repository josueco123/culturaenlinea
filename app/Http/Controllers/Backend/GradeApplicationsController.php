<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Application;
use App\User_type;
use App\Register;
use App\Grade_application;
use App\Grade_criteria;
use App\Notification;
use App\Log;
use Mail;

use App\Http\Requests\GradeAplicationFormRequest;


class GradeApplicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:juez');
    }

    public function index(Request $request)
    {
        $application_judge = DB::select('select application_id
                                  from application_judge as aj
                                  where aj.user_id = :id', ['id' => Auth::user()->id]);

        $id_applications = array();
        foreach ($application_judge as $key => $value) {
          $id_applications[] = $value->application_id;
        }

        $applications = Application::with(['incentive', 'user_type', 'call', 'judges', 'grade_application'])->whereIn('id', $id_applications)->get();

        $flag = 0;
        $mensaje = "";

        return view('backend.gradeApplications.index', compact('applications','flag','mensaje'));
    }

    public function show($id)
    {

        $application = Application::with(['incentive', 'incentive.criteria'])->where('id', $id)->firstOrFail();
        $registers = Register::where('application_id', $application->id)->get();
        $user_type = User_type::with(['forms', 'forms.fields'])->where('id', $application->user_type_id)->first();
        $forms = $user_type->forms;

        $grade_application = Grade_application::with(['grade_criteria'])->where(['application_id' => $application->id, 'user_id' => Auth::user()->id])->get();

         $modulo_estimulos_registers= DB::table('registers as r')
                                ->select('r.application_id','r.form_id','r.field_id','r.data')
                                ->join('form_incetive as f','r.form_id','=','f.form_id')
                                ->where('r.application_id',$application->id)
                                ->groupBy('r.application_id','r.form_id','r.field_id','r.data')
                                ->get();

        $modulo_estimulos_field = DB::table('fields')
                    ->orderBy('order', 'asc')
                    ->get();


        $flag = 0;
        $mensaje = "";

        return view('backend.gradeApplications.show', compact('application', 'registers', 'forms', 'grade_application' ,'flag','mensaje','modulo_estimulos_field','modulo_estimulos_registers'));
    }



    public function edit($id)
    {
        $application = Application::with(['incentive', 'incentive.criteria'])->where('id', $id)->firstOrFail();
        $registers = Register::where('application_id', $application->id)->get();
        $user_type = User_type::with(['forms', 'forms.fields'])->where('id', $application->user_type_id)->first();
        $forms = $user_type->forms;

        $grade_application = Grade_application::with(['grade_criteria'])->where(['application_id' => $application->id, 'user_id' => Auth::user()->id])->get();

        $flag = 0;
        $mensaje = "";

        $modulo_estimulos_registers= DB::table('registers as r')
                                ->select('r.application_id','r.form_id','r.field_id','r.data')
                                ->join('form_incetive as f','r.form_id','=','f.form_id')
                                ->where('r.application_id',$application->id)
                                ->groupBy('r.application_id','r.form_id','r.field_id','r.data')
                                ->get();

        $modulo_estimulos_field = DB::table('fields')
                    ->orderBy('order', 'asc')
                    ->get();




        return view('backend.gradeApplications.edit', compact('application', 'registers', 'forms', 'grade_application' ,'flag','mensaje','modulo_estimulos_field','modulo_estimulos_registers'));
    }

    public function update($id_aplication, Request $request)
    {
        // dd($id_aplication);
        try {
            DB::beginTransaction();

            // Actualizacion de datos
            
            $idGrade = DB::table('grade_applications')
                        ->where('application_id',$id_aplication)
                        ->where('user_id',Auth::User()->id)
                        ->Select('id')
                        ->first();
            
            // dd($request->information);
            $grade_application = Grade_application::findOrFail($idGrade->id);
            $grade_application->application_id = $id_aplication;
            $grade_application->user_id = Auth::user()->id;
            $grade_application->score = 0;
            $grade_application->comment = $request->information != null ? $request->information : "";
            $grade_application->recommend = $request->recommend != null ? $request->recommend : 0;
            $grade_application->update();

            // dd($idGrade->id);

             $fields = $request->except([
                'application_id',
                'recommend',
                'information',
                'files',
                '_token',
                'idcriteria'
            ]);

            $criteria = array();
            foreach ($fields as $key => $value) {
                $criteria[substr($key, strpos($key, '-') + 1, strlen ($key))][substr($key, 0, strpos($key, '-'))] = $value;
            }
            

            $score = 0;
            foreach ($criteria as $key => $value) {

              /*  $validaciones = Grade_criteria::where('criteria_id',$value['idcriteria'])->where('grade_application_id',$idGrade->id)->first();
                 dd($validaciones);*/

                $grade_criteria = Grade_criteria::where('criteria_id',$value['idcriteria'])->where('grade_application_id',$idGrade->id)->first();
                $grade_criteria->score = $value['value'];
                $grade_criteria->comment = $value['comment'] != null ? $value['comment'] : "";
                $grade_criteria->update();

               /* if ($grade_criteria->update()) {
                    $bandera = 1;
                }else{
                    $bandera = 0;
                }
                dd($bandera);*/

                $score = $score + $value['value'];
            }


            Grade_application::where('id', $grade_application->id)->update(['score' => $score ]);

                      

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        

        return redirect()->route('backend.gradeApplications.show',$id_aplication);
       
    }


    public function grade(Request $request)
    {
    
        try {
            DB::beginTransaction();
           // dd($request->information);
            $grade_application = new Grade_application;
            $grade_application->application_id = $request->application_id;
            $grade_application->user_id = Auth::user()->id;
            $grade_application->score = 0;
            $grade_application->comment = $request->information != null ? $request->information : "";
            $grade_application->recommend = $request->recommend != null ? $request->recommend : 0;
            $grade_application->save();

            $fields = $request->except([
                'application_id',
                'recommend',
                'information',
                'files',
                '_token'
            ]);

            $criteria = array();
            foreach ($fields as $key => $value) {
                $criteria[substr($key, strpos($key, '-') + 1, strlen ($key))][substr($key, 0, strpos($key, '-'))] = $value;
            }

            $score = 0;
            foreach ($criteria as $key => $value) {
                $grade_criteria = new Grade_criteria;
                $grade_criteria->grade_application_id = $grade_application->id;
                $grade_criteria->criteria_id = $key;
                $grade_criteria->score = $value['value'];
                $grade_criteria->comment = $value['comment'] != null ? $value['comment'] : "";
                $grade_criteria->save();
                $score = $score + $value['value'];
            }

            Grade_application::where('id', $grade_application->id)->update(['score' => $score ]);

            $application = Application::where('id', $request->application_id)
                ->with('incentive')
                ->firstOrFail();

            $data = ['title' => "Aplicación Calificada",
                    'msg' => "La Aplicación realizada al estimulo: <strong>"
                    . $application->incentive->name
                    . "</strong> Recibió una calificacion por parte de uno de los Jurados. <br><br> El código de participación es el siguiente: <strong>"
                    . $application->code
                    ."</strong><br><br>"
                    ."Calificación asignada: <strong>" . $score ."/100</strong> <br><br>"
                    ."Comentario: " . $grade_application->comment ."<br><br>"];

            $notification = new Notification;
            $notification->application_id = $request->application_id;
            $notification->title = $data['title'];
            $notification->message = $data['msg'];
            $notification->viewed = false;
            $notification->save();

            $log = new Log;
            $log->log_user_id = auth()->user()->id;
            $log->log_ip_user = request()->ip();
            $log->log_action = 'Calificación a postulación';
            $log->log_id_register = $request->application_id;
            $log->log_old_data = '';
            $log->log_new_data = 'Título: ' . $data['title'] . '. Mensaje: ' . $data['msg'];
            $log->save();

           /* $subject = 'Calificación a postulación' ;
            $for = Auth::user()->email;*/
           /* Mail::send('emails.notificationApp', $data, function ($msg) use ($subject, $for) {
                $msg->from("convocatoriaestimulos@cali.gov.co", "Secretaría de cultura, Alcaldía de Santiago de Cali");
                $msg->subject($subject);
                $msg->to($for);
            });*/
            $mensaje = null;
            $flag = 0;

               DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        

        return redirect()->route('backend.gradeApplications.show',$request->application_id);
       


        
    }
}
