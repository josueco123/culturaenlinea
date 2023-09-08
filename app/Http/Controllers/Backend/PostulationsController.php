<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Incentive;
use App\User_type;
use App\Area;
use App\Register;
use App\Form;
use App\Field;
use App\Application;
use App\User;
use App\Call;
use App\Member;
use App\Notification;
use App\Log;
use Mail;

class PostulationsController extends Controller
{
    public function form($incentive_slug, $userType_slug)
    {
        $incentive = Incentive::query()
           ->select('id', 'area_id', 'type_id', 'line_id', 'name', 'slug')
           ->with('fields', 'fields.incentives')
           ->where('slug', $incentive_slug)
           ->firstOrFail();


        
        $user_type = User_type::query()
           ->select('id', 'name', 'slug', 'description')
           ->with([
              'forms'=> function ($query) {
                  $query->ORDERbY('ORDER');
               }, 'forms.fields.incentives', 
               'forms.fields' => function ($query) {
                   $query->ORDERbY('ORDER');
               }])
           ->where('slug', $userType_slug)
           ->firstOrFail();
        

        try {
            $application = Application::query()
            ->with('incentive', 'incentive.area', 'user_type', 'status' , 'members')
            ->where(['user_id' => Auth::user()->id, 'incentive_id' => $incentive->id])
            ->get()->first();


            $modulo_estimulos = DB::table('form_incetive')
                      ->where('incetive_id',$incentive->id)
                      ->get();


            $modulo_estimulos_field = DB::table('fields')
                    ->orderBy('order', 'asc')
                    ->get();

        } catch (\Throwable $th) {
            $application = Application::query()
            ->with('incentive', 'incentive.area', 'user_type', 'status')
            ->where(['user_id' => Auth::user()->id, 'incentive_id' => $incentive->id])
            ->get()->first();

        }

        $form_incentive = '';

        $registers = null;
        if ($application ) {
              $registers = Register::where('application_id', $application->id)->get();

              if($application->status->id != 1 && $application->status->id != 3){
                  return redirect()->route('backend.myAplications.index', compact('incentive', 'user_type', 'application','form_incentive','modulo_estimulos','modulo_estimulos_field'));
              }
        }


        // dd($user_type->forms );
        return view('backend.postulations.form', compact('incentive', 'user_type', 'application', 'registers','form_incentive','modulo_estimulos','modulo_estimulos_field'));
    }

    public function storage(Request $request)
    {
        $incentive = Incentive::query()
           ->select('id', 'area_id', 'type_id', 'line_id', 'name', 'call_id', 'slug')
           ->with('fields')
           ->where('id', $request->incentive_id)
           ->firstOrFail();

        // dd($incentive);

        $user_type = User_type::query()
           ->select('id', 'name', 'slug', 'description')
           ->with(['forms','forms.fields' => function ($query) {
               $query->orderBy('order');
           }])
           ->where('id', $request->user_type_id)
           ->firstOrFail();

        if ($request->application_id == 0) {
            $application = new Application;
            $application->code = "";
            $application->step = 2;
            $application->incentive_id = $request->incentive_id;
            $application->user_type_id = $request->user_type_id;
            $application->user_id = Auth::user()->id;
            $application->call_id = $incentive->call_id;
            $application->status_type_id = 1;
            $application->save();
        } else {
            $application = Application::where('id', $request->application_id)->firstOrFail();
        }

        $fields = $request->except([
            'application_id',
            'incentive_id',
            'user_type_id',
            '_token',
            'form_id',
            'step'
        ]);

        $alert = false;
        $success = false;
        $msg = "";

        foreach ($fields as  $field_id => $value) {
          if ($value != '') {

            $field = Field::where('id', $field_id)->firstOrFail();

            if (!is_null($request->files->get($field_id))) {

                if ($field->size > 0){
                   if ($field->size < $request->files->get($field_id)->getSize()){
                      return redirect()->back()->with(['danger' => "El archivo suministrado para <b>"
                                                        . $field->label
                                                        . "</b> es demaciado pesado, solo se permiten <b>"
                                                        . number_format($field->size / 1048576, 0)
                                                        . ' MB </b>']);
                   }
                }

            	  $conTildes = array("á", "é", "í", "ó", "ú", "ñ", "Á", "É", "Í", "Ó", "Ú", "Ñ");
                $sinTildes = array("a", "e", "i", "o", "u", "n", "A", "E", "I", "O", "U", "N");
                $nombreArchivo = str_replace($conTildes, $sinTildes, $value->getClientOriginalName());
                $file_name = time() . '-' . preg_replace('([^A-Za-z0-9.])', '', $nombreArchivo);
                $data = 'applications/' . $application->id . '/' . $file_name;
                Storage::disk('public')->put('applications/' . $application->id . '/' . $file_name, \File::get($request->file($field_id)));
            } else {
                $data = $value;
            }

            if (count($register = Register::where([['field_id', '=', $field_id], ['form_id', '=', $request->form_id], ['application_id', '=', $application->id]])->get()) > 0) {
                Register::where([
                      ['field_id', '=', $field_id],
                      ['form_id', '=', $request->form_id],
                      ['application_id', '=', $application->id]
                  ])
                  ->update(['data' => $data, 'state' => 1]);
            } else {
                $register = new Register;
                $register->application_id = $application->id;
                $register->form_id = $request->form_id;
                $register->field_id = $field_id;
                $register->data = $data;
                $register->state = 1;
                $register->save();
            }

            if ($field->identification == 1){
                Application::where('id', $request->application_id)->update(['identification' => $data]);
            }

            if($field_id == 42 && $application->members->count() == 0){
                $success = true;
                $msg = "Asigne los miembros adicionales al representante del grupo";
            }else if($field_id == 42 && $application->members->count() != $value){
                $alert = true;
                $msg = "Verifique el número de miembros establecidos";
            }

          }
        }

        if ($success){
            return redirect()->back()->with(['success' => $msg, 'activemembers' => true]);
        }

        if (!$alert){
            if (($request->step == $application->step ) || $application->step == $user_type->forms->count() ){
                Application::where('id', $request->application_id)->update(['step' => ($application->step  + 1)]);
            }
        }else {
            return redirect()->back()->with(['danger' => $msg]);
        }

        return redirect()->route('backend.postulations.form', ['incentive_slug' => $incentive->slug, 'userType_slug' => $user_type->slug]);
    }


    public function postulate(Request $request)
    {

        $incentive = Incentive::query()
             ->select('id', 'area_id', 'type_id', 'line_id', 'name', 'call_id', 'code', 'slug')
             ->with('fields')
             ->where('id', $request->incentive_id)
             ->firstOrFail();

        $applications = Application::where('call_id', $incentive->call_id)
         ->where('incentive_id',  $request->incentive_id)
         ->where('status_type_id', '>', 1)
         ->withTrashed()
         ->count();

        $user_type = User_type::query()
            ->select('id', 'name', 'slug', 'description')
            ->with(['forms','forms.fields' => function ($query) {
                $query->orderBy('order');
            }])
            ->where('id', $request->user_type_id)
            ->firstOrFail();

        $registers = Register::where('application_id', $request->application_id)->with('field')->get();

        $field_required = array();

      /*  echo($incentive);
        die;*/

        foreach ($user_type->forms as $form){
            foreach ($form->fields as $field) {
                if ($field->required == 1 && $field->incentives->count() == 0) {
                    $field_required[$field->id] = $field->label;
                }else if($field->required == 1 && $field->incentives->count() > 0){
                    foreach ($field->incentives as $field_incentive) {
                      if ($field_incentive->id == $incentive->id) {
                          $field_required[$field->id] = $field->label;
                      }
                    }
                }
            }
        }

        $register_required = array();

        foreach ($registers as $register) {
                if ($register->field->required == 1){
                    $register_required[$register->field->id] = $register->field->label;
                }
        }

        $dif = array_diff($field_required, $register_required);

        if (count($dif) > 0){
            $msg = "Debe completar los siguientes campos para continuar: <br><br>";
            foreach ($dif as $value) {
                $msg .= " - " . $value . "<br>";
            }
            return redirect()->back()->with('danger', $msg);
        }

        if ($request->status_id == 1){

          $codeInvalid = true;
          $codeCount = $applications + 1;
          while ($codeInvalid) {
              $code =   str_pad($incentive->area_id, 2, "0", STR_PAD_LEFT)
                      . $incentive->code
                      . str_pad(($codeCount), 4, "0", STR_PAD_LEFT)
                      . date("y");

              $applicationsValid = Application::where('code', $code)
                       ->withTrashed()
                       ->count();

              if ($applicationsValid == 0){
                  $codeInvalid = false;
              }else{
                  $codeCount = $codeCount + 1;
              }

          }

          Application::where('id', $request->application_id)->update(['code' => $code , 'status_type_id' => 2]);

          $data = ['title' => "Aplicación Realizada con éxito",
                  'msg' => "La Aplicación realizada al estimulo: <strong>"
                  . $incentive->name
                  . "</strong> se realizó de manera exitosa. <br><br> El código de participación es el siguiente: <strong>"
                  . $code
                  ."</strong><br><br><br>"];

          $notification = new Notification;
          $notification->application_id = $request->application_id;
          $notification->title = $data['title'];
          $notification->message = $data['msg'];
          $notification->viewed = false;
          $notification->save();

          $log = new Log;
          $log->log_user_id = auth()->user()->id;
          $log->log_ip_user = request()->ip();
          $log->log_action = 'Envío de notificación a usuario';
          $log->log_id_register = $request->application_id;
          $log->log_old_data = '';
          $log->log_new_data = 'Título: ' . $data['title'] . '. Mensaje: ' . $data['msg'];
          $log->save();

          $subject = 'Aplicación Realizada con éxito' ;
          $for = Auth::user()->email;
          Mail::send('emails.notificationApp', $data, function ($msg) use ($subject, $for) {
              $msg->from("info@culturaenlineacali.com", "Secretaría de cultura, Alcaldía de Santiago de Cali");
              $msg->subject($subject);
              $msg->to($for);
          });

        }else{
          Application::where('id', $request->application_id)->update(['status_type_id' => 4]);
        }

        return redirect()->route('backend.postulations.form', ['incentive_slug' => $incentive->slug, 'userType_slug' => $user_type->slug]);
    }

    public function registerMember(Request $request)
    {

          $incentive = Incentive::query()
             ->select('id', 'area_id', 'type_id', 'line_id', 'name', 'call_id', 'slug')
             ->with('fields')
             ->where('id', $request->incentive_id)
             ->firstOrFail();
          


          $user_type = User_type::query()
             ->select('id', 'name', 'slug', 'description')
             ->with(['forms','forms.fields' => function ($query) {
                 $query->orderBy('order');
             }])
             ->where('id', $request->user_type_id)
             ->firstOrFail();

            

          $fields = $request->except([
            'application_id',
            'incentive_id',
            'user_type_id',
            '_token'
          ]);

          $member = new Member;
          $member->application_id = $request->application_id;
          foreach($fields as $name => $data){
              $member->$name = $data != null ? $data : "";
          }
          $member->save();

          return redirect()->route('backend.postulations.form', ['incentive_slug' => $incentive->slug, 'userType_slug' => $user_type->slug]);

    }

    public function deleteMember($id)
    {
          $member = Member::find($id);
          $member->delete();
          return redirect()->back()->with('success', 'Se ha eliminado la aplicación satisfactoriamente');
    }
}
